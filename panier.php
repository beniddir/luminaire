<?php

/*1 Connexion à la base de données */
require 'inc/init.inc.php';

/* 2 Affectation des variables */
$title = "Votre panier";
$h1 = "panier";
$contenu="";


// 3 traitement formulaire valider le panier: le fromulaire  ligne 172 en bas de la page 
if (isset($_POST['valider'])) {
    if (!empty($_SESSION['panier'])) {

        // 3 -1 insérer la commande dans la table des commandes
        $ajout = $pdoLuminaire->prepare("INSERT INTO commandes (total, quantite_total, id_utilisateur, date_commande) VALUES (:total, :quantite_total, :id_utilisateur, NOW())");
        $ajout->execute([
            ':total' => $_POST['total'],// c'est le total calculer a la ligne 162 
            ':quantite_total' => array_sum($_SESSION['panier']),//quantitié total calculé a la ligne160
            ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur']
        ]);

        // 3-2 Récupérer l'identifiant de la dernière commande insérée
        $id_commande = $pdoLuminaire->lastInsertId();

        // 3-3 Pour chaque produit dans le panier, insérer les détails de la commande dans la table commande_details
        foreach ($_SESSION['panier'] as $id_produit => $quantite) {//recup l'identifiant du produit et sa quantité 
            $produit = $pdoLuminaire->prepare("SELECT * FROM produits WHERE id_produit = :id_produit");
            $produit->execute(['id_produit' => $id_produit]);
            $produit_details = $produit->fetch(PDO::FETCH_ASSOC);

            // 3 -4 Insérer les détails de la commande dans la table commande_details
            $insertion = $pdoLuminaire->prepare("INSERT INTO commande_details (id_commande, id_produit, quantite, montant) VALUES (:id_commande, :id_produit, :quantite, :montant)");
            $insertion->execute([
                'id_commande' => $id_commande,
                'id_produit' => $id_produit,
                'quantite' => $quantite,
                'montant' => $produit_details['prix'] * $quantite
            ]);
        }

        // 3-5 VIDER PANIER 
        unset($_SESSION['panier']);

        // Afficher un message de succès
        $contenu .= "<div class=\"alert alert-success\">Votre commande a été envoyée avec succès!</div>";
    } else {
        // Afficher un message d'avertissement si le panier est vide
        $contenu .= "<div class=\"alert alert-warning\">Votre panier est vide, vous ne pouvez pas passer de commande.</div>";
    }

# The colon prevents curl from asking for a password.
}


/* 4 - supprimer un produit du panier */

if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])) {
    // Vérifie si toutes les informations nécessaires sont présentes dans l'URL

    $delete = $_GET['id_produit']; //permet de récupérer id_ produit à partir de l'URL et de le stocker dans la variable $delete
    unset($_SESSION['panier'][$delete]); // Supprime l'élément correspondant de la session panier

    /* $contenu .= "<div class=\"alert alert-success\">Le produit a bien été supprimé</div>"; */
    header('location:panier.php');
    exit();
}
/*  5 inclure le contenu d'un fichie"header.inc.php"*/
require 'inc/header.inc.php';
?>

<main class="container">

    <?php echo $contenu ?> <br>
    <h2> luminaire - Votre Panier </h2>

    <!--  un bouton qui permet d suivre les achats -->
    <a href="index.php" class="btn btn-info  my-2 d-bloc border rounded-pill">Poursuivre les achats </a>


    <!--  un bouton qui permet de se connecter  -->
    <?php if (!estConnecte()) {
    ?>
        <a href="connexion.php" class="btn btn-primary  my-2 d-bloc border rounded-pill">Se connecter </a>
    <?php } ?>

<!--  tableau  du panier  -->
    <table class="table table-dark table-striped table-bordered border-light">
        <thead class="bg-info">
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
           // panier - a - Initialisation d'une variable $total pour stocker le prix total du panier 
            $total = 0;
            // b - Vérification si la variable de session 'panier' est définie
            if (isset($_SESSION['panier'])) {
                // Récupération des clés (identifiants de produits) de la variable de session 'panier' dans un tableau $ids
                $ids = array_keys($_SESSION['panier']);

                // c- Vérification si le tableau $ids est vide
                if (empty($ids)) {
                    // d- Affichage d'un message indiquant que le panier est vide
                    echo "Votre panier est vide";
                } else {
                    // e -  Requête SQL pour récupérer les informations des produits correspondant aux identifiants présents dans $ids
                    $produits = $pdoLuminaire->query("SELECT * FROM produits WHERE id_produit IN (" . implode(',', $ids) . ")");
                    /* implode(',', $ids): Cette fonction implode() est utilisée pour fusionner les éléments d'un tableau $ids en une chaîne de caractères les éléments sont séparé par une virgule (,). Ainsi, si $ids est un tableau  [1, 2, 3], implode(',', $ids) produira la chaîne "1,2,3". 
                    construire une chaîne de valeurs séparées par des virgules à partir d'un tableau.*/

                    // f- Boucle foreach pour parcourir les produits récupérés
                    foreach ($produits as $produit) {

                        //  g-Calcul du prix total en ajoutant le prix du produit multiplié par sa quantité dans le panier à la variable $total
                        $total += $produit['prix'] * $_SESSION['panier'][$produit['id_produit']];
                        $id_produit = $produit['id_produit']; // Identifiant du produit
                    
                        // h  mettre a jour  le stock du produit  et la mise a jour de la table commentaire N°6 en bas de la page ligne 144
                        $nouveau_stock = $produit['stock'] - $_SESSION['panier'][$id_produit];
            ?>

                        <!-- Affichage des détails du produit dans une ligne de tableau HTML -->
                        <tr>
                            <td> <img src="assets/img/<?php echo $produit['image'] ?>" class="img-fluid" alt="image produit"></td>
                            <td><?php echo $produit['titre'] ?></td>
                            <td><?php echo $produit['prix'] ?></td>

                            <!--  quantité -->
                            <td><?php echo $_SESSION['panier'][$produit['id_produit']] ?></td>
                        
                            <!--  action -->
                            <!--  supprimer un produit du panier  le code de supression voir commentaire N °4 en haut de la page ligne  55 -->
                            <td><a href="panier.php?action=suppression&id_produit=<?php echo $produit['id_produit'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-warning">Supprimer</a></td>
                        </tr>


                        <?php

                        // Mettre à jour les stocks des produits dans la table produit   $nouveau_stock recupérer voir commentaire h ala ligne 123
                        $maj = $pdoLuminaire->prepare("UPDATE produits SET stock = :nouveau_stock WHERE id_produit = :id_produit");
                        $maj->execute(array(
                            ':id_produit' => $id_produit,
                            ':nouveau_stock' => $nouveau_stock
                        ));

                        ?>

                <?php
                    }
                }
                ?>
                <!-- Affichage des totaux de quantité et de prix total -->
                <tr>
                    <th colspan="2">Quantité Total: <?php echo array_sum($_SESSION['panier']) ?></th>
                    <!-- est une fonction PHP qui calcule la somme des valeurs d'un tableau. Dans ce cas, elle est utilisée pour calculer la somme des valeurs des produits dans le panier, qui sont stockées dans la variable de session 'panier' -->
                    <th colspan="3">Prix Total: <?php echo $total ?> euro</th>
                </tr>
            <?php
            }
            ?>
        </tbody>

    </table>


    <!--  formulaire valider le panier le traitement voir le commentaire n°3 en haut de la page ligne 12 -->
    <form method="post" action="panier.php" class="bg-dark d-flex align-items-center justify-content-center">
        <label for="total" class="text-light">Prix Total</label>
        <!-- Champ de formulaire caché pour stocker la valeur de $total -->
        <input type="hidden" name="total" value="<?php echo $total ?>">
        <!-- Affichage du prix total -->
        <?php echo $total ?>
        <button type="submit" name="valider" class="btn btn-warning border rounded-pill ms-5">Valider</button>
    </form>



</main>

<?php require 'inc/footer.inc.php'; ?>