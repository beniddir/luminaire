<?php
/* 1- récupération des fichiers init et functions */
require 'inc/init.inc.php';

/* 2- récupération des infos de la personne connectée */
if (isset($_GET['id_utilisateur']) && $_SESSION['utilisateurs']['id_utilisateur'] == $_GET['id_utilisateur']) {
    /*verifier si Id_utilisateur dans $GET et le meme que l'utilisateur connecter) 
    */
    $resultat = $pdoLuminaire->prepare(" SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur ");

    $resultat->execute(array(
        ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur']
    ));

    if ($resultat->rowCount() == 0) {
        header('location:index.php');
        exit();
    }
    $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
} else {
    header('location:index.php');
    exit();
}

/* 4-Traitement du form  de mise a jour du profil*/
if (!empty($_POST)) {
    // Validation des données reçues
    // a - protéger contre les attaques de type injection de code.
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);

    //  b- Vérification de l'existence de l'adresse e-mail dans la base de données pour d'autres utilisateurs
    $verifemail = $pdoLuminaire->prepare("SELECT * FROM utilisateurs WHERE email = :email AND id_utilisateur != :id_utilisateur");
    $verifemail->execute([
        ':email' => $_POST['email'],
        ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur']
    ]);

    if ($verifemail->rowCount() > 0) {
        $contenu .= "<div class=\"alert alert-danger\">Cette adresse e-mail est déjà utilisée par un autre utilisateur. Veuillez en choisir une autre.</div>";
    } else {
        
 
         // Modification du profil dans la base de données 

        $modif = $pdoLuminaire->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp, telephone = :telephone, adresse = :adresse,  ville = :ville  WHERE id_utilisateur = :id_utilisateur ');

        $modif->execute([
            ':nom' => $_POST['nom'],
            ':prenom' => $_POST['prenom'],
            ':email' => $_POST['email'],
            ':mdp' => $_POST['mdp'],
            ':telephone' => $_POST['telephone'],
            ':adresse' => $_POST['adresse'],
            ':ville' => $_POST['ville'],
            ':id_utilisateur' => $_SESSION['utilisateurs']['id_utilisateur'],
        ]);

        if ($modif) {
            header('location:profil.php');
            exit();
        } else {
            $contenu .= "<div class=\"alert alert-danger\">Erreur lors de la modification</div>";
        }
    }
}


/* 3- Affichage du header */

$title = 'luminaire - Modifiez votre profil';
$paragraphe = "";
$paragraphe = "Modifiez votre profil $fiche[prenom]";
require 'inc/header.inc.php';

?>

<main class="container">

    <?php echo "<p class=\" alert alert-success\">" . $paragraphe . "</p>"; ?>


    <?php echo $contenu; ?>

    <div class=" container-fluid bg-primary d-flex flex-column  align-items-center justify-content-center">

        <h2 class="my-3 text-light"> Modification Profil </h2>



        <form action="#" method="POST" class="col-12 col-md-6 mx-auto alert alert-dark p-5">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control  border rounded" value="<?php echo $fiche['nom'] ?>">
            </div>


            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="form-control border rounded " value="<?php echo $fiche['prenom'] ?>">
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control  border rounded" value="<?php echo $fiche['email'] ?>">
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="text" id="mdp" name="mdp" class="form-control  border rounded" value="<?php echo $fiche['mdp'] ?>">
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" id="telephone" name="telephone" class="form-control  border rounded" value="<?php echo $fiche['telephone'] ?>">
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="form-control border rounded " value="<?php echo $fiche['adresse'] ?>">
            </div>

            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" id="ville" name="ville" class="form-control  border rounded" value="<?php echo $fiche['ville'] ?>">
            </div>



            <div class="text-center">
                <input type="submit" value="Modifier" class="btn btn-primary mt-3  form-control">
            </div>

        </form>
    </div>

</main>

<?php
require 'inc/footer.inc.php';
?>