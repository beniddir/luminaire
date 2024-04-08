<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - Les Produit';
$h1 = 'luminaire- Les Produits';

require 'inc/header.inc.php';

/* 3- Suppression d'un produit */
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])) { // jé vérifie que toutes les infos ci-dessus (action, action qui correspond à suppression et id_produit) sont bien présentes dans l'url
    $delete = $pdoLuminaire->prepare("DELETE FROM produits WHERE id_produit = :id_produit");

    $delete->execute(array(
        ':id_produit' => $_GET['id_produit'],
    ));

    if ($delete->rowCount() == 0) { // Si ça nous renvoit 0 c'est que le résultat est vide : il n'y a pas d'article avec cet id à supprimer
        $contenu .= "<div class=\"alert alert-danger\">Erreur de suppression de l'article n° $_GET[id_produit] </div>";
    } else { // la suppression s'exécute
        $contenu .= "<div class=\"alert alert-success\">produit n° $_GET[id_produit] a bien été supprimé</div>";
    }
}

?>

<main class="container">

    <h2>Boutique</h2>
    <?php  if(estAdmin()){?>

        <a href="ajouterunproduit.php" class="btn btn-warning">ajouter un article</a>

        <?php } ?>
        
        <?php 
    $requete = $pdoLuminaire->query("SELECT * FROM produits");

    echo $contenu;
    ?>
    <div class="row my-5">
        <?php
        while ($card = $requete->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <p>
                        <img src="assets/img/<?php echo $card['image'] ?>" class="img-fluid" alt="image produit">
                    </p>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fs-6"><?php echo $card['titre']; ?></h5>
                        <p class="card-text"><?php echo substr($card['description'], 0, 50);
                                                // on utilise la fonction prédéfinie substr() afin de délimiter le nombre de caractères à afficher (1 - la chaîne de caractères, 2- notre point de commencement, 3- le nombre de caractères à afficher)
                                                ?> ... </a></p>


                    </div>
                    <a href="produit.php?id_produit=<?php echo $card['id_produit']; ?>" class="btn btn-info">Voir La Suite</a>


                    <a href="ajouter_panier.php?id_produit=<?php echo "$card[id_produit]"; ?>" class="btn btn-primary">ajouter au panier</a>
                    <?php if (estAdmin()) { ?>
                        <a href="produits.php?action=suppression&id_produit=<?php echo $card['id_produit'] ?>" onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-warning">Supprimer</a>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>

    </div>


</main>

<?php require 'inc/footer.inc.php'; ?>