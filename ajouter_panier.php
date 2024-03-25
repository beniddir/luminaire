<?php
require 'inc/init.inc.php';

$title = "votre panier";
$h1 = " Ajout_ panier";
$paragraphe = "livraison gratuite .Les colis sont expédiés sous 48h maximum, après réception de votre paiement.";
require 'inc/header.inc.php';



if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (isset($_SESSION['utilisateurs']['id_utilisateur'])) { // Vérifie si l'utilisateur est connecté
    if (isset($_GET['id_produit']) && !empty($_GET['id_produit'])) {
        $id_produit = $_GET['id_produit'];
        $produit = $pdoLuminaire->prepare("SELECT * FROM produits WHERE id_produit = :id_produit");
        $produit->execute([':id_produit' => $id_produit]);

        if ($produit->rowCount() == 0) {
            $contenu .= "<div class=\"alert alert-danger\">Ce produit n'existe pas !</div>";
        }

        if (isset($_SESSION['panier'][$id_produit])) {
            $_SESSION['panier'][$id_produit]++;//  produit est déjà présent dans le panier. incrémente simplement sa quantité.
        } else {
            $_SESSION['panier'][$id_produit] = 1;
            $contenu .= "<div class=\"alert alert-danger\">Ce produit a été bien ajouté au panier  !</div>";
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

