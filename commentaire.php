<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - commentaire';

// 3* traitement du formulaire de validation des commentaire ligne 54

if (isset($_POST['com'])) { // cela signifie que le formulaire a été soumis

    $valide = $pdoLuminaire->prepare("UPDATE commentaires SET valide = :valide WHERE id_commentaire = :id_commentaire");
    $valide->execute([
        ':valide' => $_POST['valide'],
        ':id_commentaire' => $_POST['id_commentaire']
    ]);
    header('location:commentaire.php');
    exit();
}

/*  4 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">

    <h2> Luminaire - Liste des commentaires </h2>


    <?php
    /* 1- Faire la requete  pour recupérer tous les commentaires */
    $affichageCom = $pdoLuminaire->query("SELECT * FROM commentaires, utilisateurs, produits WHERE commentaires.id_produit = produits.id_produit AND commentaires.id_utilisateur = utilisateurs.id_utilisateur  ORDER by id_commentaire DESC");

    // 2 - affichage des commentaires 

    if ($affichageCom->rowCount() == 0) {
        echo "<div class=\"alert alert-secondary\">Il n'y a pas encore de commentaire </div>";
    } else {
        while ($affichage = $affichageCom->fetch(PDO::FETCH_ASSOC)) {
            echo "
        <div class=\"alert alert-secondary\">
    
            <h3 class=\" alert alert-warning\">produit : $affichage[id_produit]</h3>
            <p> Titre : $affichage[titre]</p>
            <p> le commentaire: $affichage[commentaire]</p>
            <p> Publié par : $affichage[prenom]</p>
            <p> valide : $affichage[valide]</p>
            
            
        </div>"; ?>


            <!--  formulaire  de validation de commentaire 09 -->
            <form action="#" method="POST" class="border border-primary col-12 col-md-5 mx-auto p-3">
                <div class="mb-3">
                    <label for="valide">Valide</label>

                    <select name="valide" id="valide" class="form-select">
                        <option value="1">valider</option>
                        <option value="0" <?php if (isset($affichage['valide']) && $affichage['valide'] == '0') {
                                                echo "selected";
                                            } ?>>Non valider</option>
                    </select>

                    
                    <input type="hidden" name="id_commentaire" id="id_commentaire" value="<?php echo $affichage['id_commentaire']; ?>">

                </div>
                <input type="submit" value="Valider le commentaire" class="btn btn-primary" name="com">

            </form>

    <?php
        }
    }
    ?>

    <div class="row my-5">

    </div>
</main>
<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>