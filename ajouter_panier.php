<?php
require 'inc/init.inc.php';
$title = "ajout_ panier";
$h1 = " Ajout_ panier";
$contenu="";

require 'inc/header.inc.php';



if (!isset($_SESSION['panier'])) { 
    /* la variable de session $_SESSION['panier'] n'est pas définie. on initialise un tableau vide  */
    $_SESSION['panier'] = array();
}

if (isset($_SESSION['utilisateurs']['id_utilisateur'])) { // Vérifie si l'utilisateur est connecté
    if (isset($_GET['id_produit']) && !empty($_GET['id_produit'])) {
        // verifier si id_produit est présent dans l'URL et s'il contient une valeur non vide

        $id_produit = $_GET['id_produit'];
        $produit = $pdoLuminaire->prepare("SELECT * FROM produits WHERE id_produit = :id_produit");
        $produit->execute([':id_produit' => $id_produit]);

        if ($produit->rowCount() == 0) {// il n'existe pas dans table produits 
            $contenu .= "<div class=\"alert alert-danger\">Ce produit n'existe pas !</div>";
        }

        if (isset($_SESSION['panier'][$id_produit])) {//vérifie  $id_produit existe dans  $_SESSION['panier'
            $_SESSION['panier'][$id_produit]++;//  produit est déjà présent dans le panier. incrémente simplement sa quantité.
            $contenu .= "<div class=\"alert alert-danger\">Ce produit a été bien ajouté au panier voir votre panier  !</div>";
        } else {
            $_SESSION['panier'][$id_produit] = 1;// si sa quantité reste = 1
            $contenu .= "<div class=\"alert alert-danger\">Ce produit a été bien ajouté au panier voir votre panier  !</div>";
        }
    }
} else {
    // Si l'utilisateur n'est pas connecté,  afficher un message d'erreur
    $contenu .= "<div class=\"alert alert-danger\">Vous devez être connecté pour ajouter des produits au panier.</div>";
}
?>


<main>
    <?php echo $contenu ?>
   
</main>

