<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - Accueil';
/*  3 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">

    <h2>Luminaire-Salle De Bain </h2>

    <?php echo $contenu ?>

    <?php
    /* 1- Faire la requete */
    $requete = $pdoLuminaire->query("SELECT * FROM produits  WHERE categorie ='salle de bain' ");
    // Grâce aux valeur précisées après le LIMIT, je donne d'abord l'information de l'index par lequel je veux commencer (0 est le premier index du tableau) et combien de résultat je veux (16) 
    ?>

    <div class="row my-5">
        <?php
        while ($card = $requete->fetch(PDO::FETCH_ASSOC)) {
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
</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>