<?php
require 'inc/init.inc.php';

$title = 'Luminaire - recherche';
require 'inc/header.inc.php';

// Vérifier si une recherche a été effectuée

$recherche = $_GET['search1'];


if(isset($_GET['search1'])) {
    // Récupérer le mot-clé de la recherche
  

    $requete = $pdoLuminaire->prepare("SELECT * FROM produits WHERE categorie LIKE :recherche OR titre LIKE :recherche");
    $requete->execute([
        ':recherche' => '%' . $recherche . '%'
    ]);

    // Récupérer les résultats de la requête
    $produits = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Afficher les résultats -->
    <div class="row my-5">
        <?php
        foreach ($produits as $card) {
        ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <p>
                        <img src="assets/img/<?php echo $card['image'] ?>" class="img-fluid" alt="image produit">
                    </p>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $card['titre']; ?></h5>
                        <p class="card-text"><?php echo substr($card['description'], 0, 50); ?> ...<a href="produit.php?id_produit=<?php echo $card['id_produit']; ?>">[LIRE LA SUITE]</a></p>
                    </div>
                    <a href="produit.php?id_produit=<?php echo $card['id_produit']; ?>" class="btn btn-info">Voir</a>
                    <a href="produits.php?action=suppression&id_produit=<?php echo $card['id_produit'] ?>" onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
}
?>

<!-- Formulaire de recherche -->
<div class="col-sm-6 col-md-6 col-lg-4 mt-3">
    <form class="d-flex h2" role="search" action="recherche.php" method="GET">
    <?php echo $_SERVER['PHP_SELF']; ?>

        <input class="form-control text-center" type="search" placeholder="Tapez votre recherche ici" aria-label="Search" name="search1">
        <button class="btn" type="submit" name="search1"><i class="bi bi-search"></i></button>
    </form>
</div>
<!-- $_SERVER['PHP_SELF'] est une superglobale en PHP qui contient le nom du fichier du script en cours d'exécution. Plus précisément, cela renvoie le nom du fichier du script qui est actuellement en cours d'exécution, vous avez  fichier nommé "recherche.php" et que vous l'exécutez, $_SERVER['PHP_SELF'] renverra "recherche.php"-->
<?php require 'inc/footer.inc.php'; ?>





