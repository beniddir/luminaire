<?php
/* 1- Appel du fichier init */
require 'inc/init.inc.php';
// traitement formulaire ajouter un produit 

if (!empty($_POST)) {
    // a. protection failles SQL
    $_POST['image'] = htmlspecialchars($_POST['image']);
    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['description'] = htmlspecialchars($_POST['description']);
    $_POST['prix'] = htmlspecialchars($_POST['prix']);
    $_POST['stock'] = htmlspecialchars($_POST['stock']);
    // b. la requête
    $ajout = $pdoLuminaire->prepare("INSERT INTO produits (image, titre, description, prix, stock, categorie) VALUES (:image, :titre, :description, :prix, :stock, :categorie)");

    $ajout->execute([
        ':image' => $_POST['image'],
        ':titre' => $_POST['titre'],
        ':description' => $_POST['description'],
        ':prix' => $_POST['prix'],
        ':stock' => $_POST['stock'],
        ':categorie' => $_POST['categorie'],

    ]);

    // c. la condition de redirection
    if ($ajout) {
        header('location:index.php');
        exit();
    } else {
        $contenu .= "<div class=\"alert alert-danger\">Le produit  n'a pas pu être ajouté !</div>";
    }
}
/* 2- Affectation des variables et appel du header */
$title = "luminaire- Ajout d'un produit";
$paragraphe = "";
$paragraphe = "Ajouter un Produit";
require 'inc/header.inc.php';

?>

<main class="container">
    <?php echo $contenu; ?>


    <?php echo "<p class=\" alert alert-success\">" . $paragraphe . "</p>"; ?>

    <div class=" container-fluid bg-primary d-flex flex-column  align-items-center justify-content-center"">
    <h2 class=" text-light my-4"> Ajout d'un Produit</h2>

        <form action="#" method="POST" class=" alert alert-dark p-3 col-12 col-md-5">

            <div class="mb-3">
                <label for="image">image du produit </label>
                <input type="text" name="image" id="image" class="form-control  border rounded " required>
            </div><!-- image -->

            <div class="mb-3">
                <label for="titre">Titre du produit </label>
                <input type="text" name="titre" id="titre" class="form-control border rounded " required>
            </div><!-- image -->


            <div class="mb-3">
                <label for="description"> description du produit </label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control border rounded "></textarea>
            </div><!-- description -->

            <div class="mb-3">
                <label for="prix">Prix du produit </label>
                <input type="text" name="prix" id="prix" class="form-control  border rounded ">
            </div><!--Prix -->

            <div class="mb-3">
                <label for="stock">Nombre de pièces en stock </label>
                <input type="text" name="stock" id="stock" class="form-control border rounded ">
            </div><!-- stock -->

            <div class="mb-3">
                <label for="categorie"> Categorie </label>
                <select name="categorie" id="categorie" class="form-select">
                    <?php
                    $requeteCategorie = $pdoLuminaire->query("SELECT DISTINCT categorie FROM produits");
                    while ($categorie = $requeteCategorie->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"$categorie[categorie]\" $selected>$categorie[categorie]</option>";
                    }

                    ?>
                </select>

            </div><!-- categorie -->


            <input type="submit" value="Ajouter un Produit" class="btn btn-primary form-control ">

        </form>
    </div>


</main><!-- fin du container -->

<?php
/* 4- Appel du footer */
require 'inc/footer.inc.php';
?>