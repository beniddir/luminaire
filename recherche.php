<?php
require 'inc/init.inc.php';

$title = 'Luminaire - recherche';
$h1='recherche';
require 'inc/header.inc.php';

// Vérifier si une recherche a été effectuée

$recherche = $_GET['search1'];

// l'utilisateur saisit une valeur dans le champ de texte et soumet le formulaire, la valeur saisie sera disponible dans la variable $recherche

if (isset($_GET['search1'])) {

    // Récupérer le mot-clé de la recherche

    $requete = $pdoLuminaire->prepare("SELECT * FROM produits WHERE categorie LIKE :recherche OR titre LIKE :recherche");
    $requete->execute([
        ':recherche' => '%' . $recherche . '%'

    ]);

    if ($requete->rowCount() == 0) {
        $contenu .= "<div class=\"alert alert-danger\"> Désolé, aucun produit ne correspond à votre recherche. !</div>";
        
        
    }


    // Récupérer les résultats de la requête

    $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>
<main>


    <div class="row my-5">
        <h2>Résultats de votre recherche : <?php echo $recherche?></h2>
        <?php echo $contenu ?>
        <!-- affichage des résultats dans des card bootstraap -->
        <?php
        foreach ($produits as $card) {
        ?>
             <div class="col-12 col-md-6 col-lg-3 ">
                <div class="card rounded border my-2">
                    <p>
                        <img src="assets/img/<?php echo $card['image'] ?>" class="img-fluid rounded " alt="image produit">
                    </p>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fs-6"><?php echo $card['titre']; ?></h5>
                        <p class="card-text"><?php echo substr($card['description'], 0, 50);
                                                // on utilise la fonction prédéfinie substr() afin de délimiter le nombre de caractères à afficher (1 - la chaîne de caractères, 2- notre point de commencement, 3- le nombre de caractères à afficher)
                                                ?> ...</p>


                    </div>
                    <a href="produit.php?id_produit=<?php echo $card['id_produit']; ?>" class="btn btn-info">Voir La suite</a>

                    <a href="ajouter_panier.php?id_produit=<?php echo "$card[id_produit]"; ?>" class="btn btn-primary">ajouter au panier</a>
                    <?php if (estAdmin()) { ?>

                        <a href="produits.php?action=suppression&id_produit=<?php echo $card['id_produit'] ?>" onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-warning">Supprimer</a>
                    <?php } ?>

                    <div class="card-footer">
                        <p class="text-success" > En stock <?php echo $card['stock'] ?></p>
                        <p class="pprix"><?php

                            echo $card['prix'] . " " . "EUR";  ?></p>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>

</main> <!-- Afficher les résultats -->



<!-- Formulaire de recherche -->
<div class="col-sm-6 col-md-6 col-lg-4 mt-3 d-none">
    <form class="d-flex h2" role="search" action="recherche.php" method="GET">
        <input class="form-control text-center" type="search" placeholder="Tapez votre recherche ici" aria-label="Search" name="search1">
        <button class="btn" type="submit" name="search1"><i class="bi bi-search"></i></button>
    </form>
</div>


<?php require 'inc/footer.inc.php'; ?>