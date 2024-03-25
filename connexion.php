<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';
$h1='luminaire - contact';


/* 3- Traitement du formulaire de connexion */
if (!empty($_POST)) {

    if (empty($_POST['email']) || empty($_POST['mdp'])) {
        $contenu .= "<div class=\"alert alert-danger\"> email et le mot de passe sont requis</div>";
    }

    if (empty($contenu)) { // si la variable $contenu est vide alors je n'ai pas d'erreurs, je peux donc commencer à connecter mon utilisateur
        $verifemail = $pdoLuminaire->prepare("SELECT * FROM utilisateurs WHERE email = :email"); // je vérifie si l'email entrer par l'utilisateur correspond à un email dans ma bdd
        $verifemail->execute([
            ':email' => $_POST['email'],
        ]); // j'associe le marqueur à l'information récupérée dans le formulaire

        if ($verifemail->rowCount() == 1) {
            $utilisateur = $verifemail->fetch(PDO::FETCH_ASSOC); // je récupère les infos de la personne dont  l'adresse email  a été donné

            if (password_verify($_POST['mdp'], $utilisateur['mdp'])) {
                /* password_verify est une fonction prédéfinie de PHP. Elle permet de vérifier que deux chaînes de caractères se correspondent. Elle prend donc deux arguments : 1- la chaîne entrée par l'utilisateur dans le formulaire, 2- la chaîne de caractère entrée lors de l'inscription. Elle comparare les deux et renvoie le booléen TRUE ou FALSE */

                $_SESSION['utilisateurs'] = $utilisateur; // J'assigne les informations de l'utilisateur qui se connecte (que j'ai récupéré ici grâce à ma requête $membre) à $_SESSION qui comme toutes les super globales va créer un tableau multidimentionnel qui contient les informations
                header('location:profil.php');
                exit();/* si on a récupéré les bonnes infos on redirige l'utilisateur vers la page profil.php */
            } else {
                $contenu .= "<div class=\"alert alert-danger\">Attention, mot de passe incorrect !</div>";
            }
        } else { // si on ne trouve pas l'adresse email en BDD
            $contenu .= "<div class=\"alert alert-danger\">Attention, email incorrect !</div>";
        }
    }
}

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'luminaire - Connexion';
require 'inc/header.inc.php';

?>

<main class="container">

    <?php echo $contenu; ?>

    <div class="container-fluid bg-info d-flex flex-column  align-items-center justify-content-center ">
        <h2 class="text-center mx-auto my-5  text-light "> Connectez-vous à votre compte!</h2>
        <div class="col-12 col-md-6  alert alert-dark mx-auto mb-5 ">

            <form action="#" method="POST" class=" mx-auto mb-5">
                <h2 class=" text-center text-info shadow my-4"> Connexion</h2>

                <div class="mb-3">
                    <label for="email">Votre Email</label>
                    <input type="email" name="email" id="email" class="form-control border rounded">
                </div>

                <div class="mb-3">
                    <label for="mdp">Mot De Passe</label>
                    <input type="password" name="mdp" id="mdp" class="form-control border rounded">
                </div>

                <input type="submit" value="Se connecter" class="btn btn-info form-control">

            </form>
            
        </div>
        <a href="inscription.php" class="my-3">Si vous  n'êtes pas inscrit cliquez ici</a>
    </div>
   


</main>

<?php
require 'inc/footer.inc.php';
?>