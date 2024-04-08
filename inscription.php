<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire  - Inscrivez-vous';
$h1='inscription';
require 'inc/header.inc.php';


/* 3- Inscription sur le site & la BDD */
if (!empty($_POST)) {
    // Validation des données reçues
    // a - protéger contre les attaques de type injection de code.
    $_POST['nom'] = htmlspecialchars($_POST['nom']);
    $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
    $_POST['email'] = htmlspecialchars($_POST['email']);
    $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
    $_POST['adresse'] = htmlspecialchars($_POST['adresse']);
    $_POST['ville'] = htmlspecialchars($_POST['ville']);

    /* vérification des champs du formulaire */

    if (!isset($_POST['prenom']) || strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
        $contenu .= "<div class=\"alert alert-danger\">Votre prénom doit faire entre 2 et 20 caractères</div>";
    }

    if (!isset($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
        $contenu .= "<div class=\"alert alert-danger\">Votre nom doit faire entre 2 et 20 caractères</div>";
    }

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contenu .= "<div class=\"alert alert-danger\">Votre email n'est pas conforme !</div>";
    }

    if (empty($contenu)) { // si la variable $contenu est vide ça signifie qu'il n'y a pas d'erreur et on peut lancer la requete


        // verifier si email existe pas déja 
        $verifemail = $pdoLuminaire->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $verifemail->execute([
            ':email' => $_POST['email']
        ]);
        /* Etant donné que la connexion se fera à partir email, nous vérifions ici que le email entré par l'utilisateur voulant s'inscrire n'existe pas déjà dans la BDD. S'il existe déjà alors on lui mettra un message d'erreur, lui demandant de changer son email */

        if ($verifemail->rowCount() > 0) {/* Si on récupère des résultats en BDD, c'est que ce email existe déjà  */
            $contenu .= "<div class=\"alert alert-danger\"> cette adresse mail existe , veuillez en choisir une autre. </div>";
        } else { // email est indisponible, la personne peut donc s'inscrire, on entre les infos en BDD

            // haché le  mot de passe 
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            /* Grâce à la fonction prédéfinie password_hash(), on définit que l'on veut hasher un mdp. Cette fonction prend deux arguments : 1- la string, 2- la façon de hasher (iciavec PASSWORD_DEFAULT) */

            $insert = $pdoLuminaire->prepare('INSERT INTO utilisateurs ( nom, prenom, email, mdp, telephone, adresse, ville, statut) VALUES (:nom, :prenom, :email, :mdp, :telephone, :adresse, :ville, 0)'); // ici le 0 représente le statut de la personne qui s'inscrit, par défaut c'est un utilisateur lambda.

            $insert->execute(array(

                ':nom' => $_POST['nom'],
                ':prenom' => $_POST['prenom'],
                ':email' => $_POST['email'],
                ':mdp' => $mdp, // je récupère le mdp déjà hashé grâce à ma variable (l.)
                ':telephone' => $_POST['telephone'],
                ':adresse' => $_POST['adresse'],
                ':ville' => $_POST['ville'],


            ));

            if ($insert) {
                $contenu .= "<div class=\"alert alert-success\">Vous êtes bien inscrit.e sur le site, bienvenue ! <br><a href=\" connexion.php\">Cliquez ici pour vous connecter !</a></div>";
            } else {
                $contenu .= "<div class=\"alert alert-danger\">Erreur lors de l'inscription</div>";
            }
        }
    }
}




?>
<main class="container">
<?php echo $contenu; ?>

    <div class="container-fluid  bg-info d-flex flex-column  align-items-center justify-content-center">

        <h2 class="text-center mx-auto my-5   text-light">
            Bienvenue sur notre site !</h2>

        
        <!--  / nom / prenom / email  / mdp /telephone/adresse/ville -->


        <div class="col-12 col-md-6  alert alert-dark mx-auto mb-5 ">

            <h2 class="my-3 text-center text-info shadow">Inscription </h2>

            <form action="#" method="POST" class=" mx-auto ">

                <div class="row my-3">

                    <div class="col-12  ">
                        <label for="nom">Votre Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control  border rounded ">
                    </div><!-- NOM -->
                </div>

                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="prenom">Votre Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control border rounded">
                    </div><!-- PRENOM -->
                </div>

                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="email">Votre Email</label>
                        <input type="text" name="email" id="email" class="form-control border rounded ">
                    </div><!-- EMAIL -->

                </div>

                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="mdp">Votre Mot De Passe</label>
                        <input type="password" name="mdp" id="mdp" class="form-control border rounded">
                    </div><!-- MDP -->

                </div>

                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="telephone">Votre Numéro De Téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control border rounded ">
                    </div><!-- telephone -->

                </div>
                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="adresse">Votre Adresse</label>
                        <input type="text" name="adresse" id="adresse" class="form-control border rounded ">
                    </div><!-- adresse -->

                </div>



                <div class="row my-3">

                    <div class="col-12 ">
                        <label for="ville">Votre Ville</label>
                        <input type="text" name="ville" id="ville" class="form-control border rounded ">
                    </div><!-- ville -->

                </div>


                <input type="submit" value="S'inscrire" class="btn btn-info  form-control">

            </form>
        </div>

    </div>
</main>
<?php
/* 4 inclure le header */
require "inc/footer.inc.php";
?>