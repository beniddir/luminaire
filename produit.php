<?php

/* 1- Co BDD */
require 'inc/init.inc.php';


/* 2- Réception des infos de l'article sélectionné par son id */
if (isset($_GET['id_produit'])) {
    $info = $pdoLuminaire->prepare("SELECT * FROM produits WHERE  id_produit = :id_produit");
    $info->execute([
        ':id_produit' => $_GET['id_produit'],
    ]);
    if ($info->rowCount() == 0) {
        header('location:produits.php');
        exit();
    }
    $produit = $info->fetch(PDO::FETCH_ASSOC);
} else { // si pas d'id_produit dans l'url
    header('location:produits.php');
    exit();
}

/* 3- Mise à jour de l'article */
if (!empty($_POST['majA'])) {
    //a. protection injection SQL
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['prix'] = htmlspecialchars($_POST['prix']);
    $_POST['stock'] = htmlspecialchars($_POST['stock']);


    //b. préparation de la requête
    $maj = $pdoLuminaire->prepare("UPDATE produits SET image = :image, titre = :titre, description = :description, prix = :prix, stock = :stock, categorie =:categorie  WHERE id_produit = :id_produit ");

    //c.execution de le requête
    $maj->execute([
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':description' => $_POST['description'],
        ':prix' => $_POST['prix'],
        ':stock' => $_POST['stock'],
        ':categorie' => $_POST['categorie'],
        ':id_produit' => $_GET['id_produit'],
    ]);

    if ($maj) {
        header('location:produit.php');
        exit();
    } else {
        $contenu .= "<div class=\"alert alert-danger\">La mise à jour n'a pas fonctionnée !</div>";
    }
}

/* 4- Affectation des variables et appel du header */
$title = $produit['titre'];

require 'inc/header.inc.php';
/* 5- Publier un commentaire */

if (!empty($_POST['com'])) {
    // a. Protection contre les injections SQL
    $_POST['commentaire'] = htmlspecialchars($_POST['commentaire']);

    // b. La requête
    $ajoutCom = $pdoLuminaire->prepare("INSERT INTO commentaires (id_produit, id_utilisateur, commentaire, date) VALUES (:id_produit, :id_utilisateur, :commentaire, NOW())");

    // c. J'associe les marqueurs à leurs valeurs
    $ajoutCom->execute([
        ':id_produit' => $_GET['id_produit'],
        ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur'],
        ':commentaire' => $_POST['commentaire']
    ]);
}

/* 6- Afficher les commentaires de produit sélectionné */
$affichageCom = $pdoLuminaire->prepare("SELECT * FROM commentaires, utilisateurs  WHERE commentaires.id_produit = :id_produit AND commentaires.id_utilisateur = utilisateurs.id_utilisateur");

$affichageCom->execute([
    ':id_produit' => $_GET['id_produit'],
]);






?>
<main class="container">



    <section class="row my-5">

        <h2> <span>F</span>iche produit:</h2>
        <!-- 1 affiche du produit dans une carte -->
        <div class="card ">
            <div class="card-header">
                <h3 class="text-center"><?php echo "$produit[titre] " ?></h3>
            </div>
            <div class="card-body ">

                <p class="text-center">
                    <img src="assets/img/<?php echo $produit['image'] ?>" class="img-fluid " alt="image produit">
                </p>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['categorie']; ?></h5>
                    <p class=""> <?php echo $produit['image'] ?></p>
                    <p class=""><?php echo $produit['description'] ?></p>
                    <p class=""> <?php echo $produit['prix'] ?> €</p>
                    <p class="text-success"> Stock:<?php echo $produit['stock'] ?> </p>
                    <!--  alert pour admin il a moins de 10 piece en stock  -->
                    <?php
                    if (estAdmin() && $produit['stock'] < 10) {
                        echo "<script>alert('Vous avez moins de 10 pièces en stock');</script>";
                    }
                    ?>


                </div>

                <!-- bouton ajouter au panier  -->
                <a href="ajouter_panier.php?id_produit=<?php echo "$produit[id_produit]"; ?>" class="btn btn-primary">ajouter au panier</a>



                <!--  supprimer un produit if admin -->

                <?php if (estAdmin()) { ?>
                    <a href="produit.php?action=suppression&id_produit=<?php echo $produit['id_produit'] ?>" onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-warning btn-rounded">Supprimer</a> <?php } ?>
            </div>
        </div><!-- fin card-body -->
        </div><!-- fin card -->
        </div><!-- fin de la colonne -->



        <!-- fin de l'affichage  -->

        <!-- 2 formulaire de mise a jour  afficher  que pour admin  -->


        <?php if (estAdmin()) { ?>
            <div class="col-12 col-md-8  container-fluid  bg-info d-flex flex-column  align-items-center justify-content-center p-5">

                <h2 class="text-light shadow "> Mise à jour d'un produit </h2>



                <form action="#" method="POST" class="col-12 col-md-8 alert- alertdark">
                    <!-- /!\ Il est essentiel lorsque l'on fait un formulaire de mise à jour de passer en value les données existantes : cela permet de voir ce qui existe et ce que l'on veut modifier -->

                    <div class="mb-3">
                        <label for="image">image</label>
                        <input type="text" name="image" id="image" value="<?php echo "$produit[image]"; ?>" class="form-control border rounded">
                    </div>

                    <div class="mb-3">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id="titre" value="<?php echo "$produit[titre]"; ?>" class="form-control border rounded  ">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="15" class="form-control"><?php echo $produit['description']; ?></textarea>

                    </div>

                    <div class="mb-3">
                        <label for="prix">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control border rounded  " value="<?php echo "$produit[prix]" ?>">

                    </div>
                    <div class="mb-3">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control border rounded  " value="<?php echo "$produit[stock]" ?>">

                    </div>

                    <div class="mb-3">
                        <select name="categorie" id="categorie" class="form-select border rounded  ">
                            <?php
                            $requeteCategorie = $pdoLuminaire->query("SELECT DISTINCT categorie FROM produits");
                            while ($categorie = $requeteCategorie->fetch(PDO::FETCH_ASSOC)) {
                                // Vérifie si la catégorie correspond à celle du produit
                                $selected = ($categorie['categorie'] == $produit['categorie']) ? 'selected' : '';
                                echo "<option value=\"$categorie[categorie]\" $selected>$categorie[categorie]</option>";
                            }
                            /*  utilise une expression ternaire pour déterminer si une option de la liste déroulante doit être sélectionnée par défaut ou non.cette ligne de code vérifie si la catégorie actuellement parcourue dans la boucle correspond à la catégorie du produit en cours de mise à jour.  */
                            ?>
                        </select>

                    </div>



                    <input type="submit" value="Mettre à jour" class="btn btn-warning form-control " type="button" name="majA">


                </form><!-- fin du formulaire  de mise  a jour -->

            <?php } ?>
            </div><!-- fin colonne -->
    </section> <!-- fin rangée  -->




    <!-- le formulaire pour ajouter un commentaire -->

    <section class="row my-5">


        <?php if (estConnecte()) { ?>

            <h2> <span>E</span>crire un commentaire</h2>



            <form action="#" method="POST" class="border border-primary col-12 col-md-5 mx-auto p-3">
                <p class="my-5">Vous écrivez ce commentaire en tant que <?php echo $_SESSION['utilisateurs']['prenom'] ?></p>


                <div class="mb-3">
                    <label for="commentaire" class="form-label">Votre message</label>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="4" class="form-control"></textarea>
                </div>

                <input type="submit" value="Publier le commentaire" class="btn btn-primary" name="com">
            </form>

        <?php } else { ?>
            <p class="alert alert-danger">Vous devez être connecté pour laisser un commentaire</p>
        <?php } ?>


        <!-- affichage de commentaire  -->
        <?php
        if ($affichageCom->rowCount() == 0) {
            echo "<div class=\"alert alert-secondary\">Il n'y a pas encore de commentaire sur ce produit</div>";
        } else {
            while ($affichage = $affichageCom->fetch(PDO::FETCH_ASSOC)) {
                echo "
                <div class=\"alert alert-secondary\">
                    <h3>Publié par $affichage[prenom]</h3>
                    <p>$affichage[commentaire]</p>
                </div>";
            }
        }



        ?>


    </section>
</main><!-- fin page  -->
<?php require 'inc/footer.inc.php'; ?>