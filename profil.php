<?php

/* 1- Appel de la page init qui contient la page functions */
require 'inc/init.inc.php';
$h1='profil';

/* 2- Vérification de connexion et redirection si ce n'est pas le cas */
if (!estConnecte()) {
    header('location:connexion.php');
    exit();
}

/* 2- Requête pour récupérer les infos de mon utilisateur connecté */

$requete = $pdoLuminaire->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur");
$requete->execute([
    ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur'],
]);

$userInfo = $requete->fetch(PDO::FETCH_ASSOC);

$title = "Luminaire - Profil de $userInfo[prenom]";

$paragraphe = "";
estAdmin() ? $paragraphe = "Vous êtes admin" : $paragraphe = "Vous êtes connecté";
// condition ternaire pour afficher le statut de l'utilisateur



/* 3- la deconnexion */
if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
    session_destroy();
    header('location:index.php');
    exit();
}
require 'inc/header.inc.php';

?>

<main class="container">
    <?php echo $contenu ?>
    <?php echo $paragraphe ?>


    <div class="col-12 col-md-5 mx-auto  ">
        <div class="card1  alert alert-dark">
            <div class="card-body ">
                <h2 class=" text-center bg-info text-light my-3 shadow"><?php echo "$userInfo[prenom] $userInfo[nom]" ?></h2>
                <p class="profil">Mail : <?php echo "$userInfo[email]" ?></p>
                <p class="profil">Téléphone : <?php echo "$userInfo[telephone]" ?></p>
                <p class="profil">Adresse: <?php echo "$userInfo[adresse]" ?></p>
                <p class="profil">Ville: <?php echo "$userInfo[ville]" ?></p>

                <a href="modifprofil.php?id_utilisateur=<?php echo $userInfo['id_utilisateur'] ?>" class="btn btn-info d-block">Modifier Mon Profil</a>
                <a href="profil.php?action=deconnexion" class="btn btn-primary d-block">Se Déconnecter</a>

            </div>

        </div>
    </div>

</main>

<?php
require 'inc/footer.inc.php';
?>