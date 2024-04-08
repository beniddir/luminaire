<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - Gestions Stock';
$h1='stock';
/*  3 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">


    <h2 class=" bg-warning p-3 my-5 text-center">Tableau des Produit en stock </h2>
    
    <?php

    $requete = $pdoLuminaire->query("SELECT * FROM produits");

    echo $contenu;
    ?>
    <div class="col-12">
    <table class="table table-primary table-striped table-bordered border-dark table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>stock</th>
                <th>Remarque </th>
               
            </tr>
        </thead><!-- fin en-tête tableau -->
        <tbody>
            <?php
            while ($produit = $requete->fetch(PDO::FETCH_ASSOC)) {
                //ouverture de la boucle while (ce n'est pas parce que je ne suis plus dans un passage PHP que ma boucle ne continue pas : tant qu'il n'y a pas d'accolade fermante, la boucle continue)
            ?>
                <tr>
                    <td><?php echo $produit['id_produit']; ?></td>
                    <td><?php echo $produit['titre']; ?></td>
                    <td><?php echo $produit['prix']; ?></td>
                    <td><?php echo $produit['stock']; ?></td>
                    <td><?php 
                    if($produit['stock'] < 10){
                        echo " <pan class=\"bg-danger \">il reste que $produit[stock] en stock </pan> ";
                    }else{
                        echo" <pan class=\"text-success \"> en stock </pan> " ;
                    }
                     ?></td>

                        
                </tr>
            <?php } // fermeture de la boucle 
            ?>
        </tbody><!-- Fermeture du body du tableau -->
    </table><!-- Fermeture du tableau -->

    </div>
</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>