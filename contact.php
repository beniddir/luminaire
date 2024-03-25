<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */

$title = 'Luminaire - Contact';
/*  3 inclure le header  */
require 'inc/header.inc.php';


?>



<main class="container">
<?php echo $contenu; ?>
    <div class="container-fluid  bg-info d-flex flex-column  align-items-center justify-content-center">

        <h2 class=" my-5  text-light shadow d-inline-block "> Formulaire de contact! </h2>
        <p class="text-center text-light">Bienvenue sur notre page de contact ! Nous sommes ravis de pouvoir répondre à toutes vos questions, préoccupations ou commentaires. Que ce soit pour des informations sur nos produits, des demandes de service après-vente ou des suggestions d'amélioration, n'hésitez pas à nous contacter via le formulaire ci-dessous. Notre équipe dévouée s'engage à vous fournir une assistance rapide et efficace</p>
       
        <div class="col-12 col-md-6  alert alert-dark mx-auto mb-5">

        <form action="#" method="POST" class="mx-auto ">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
        <input type=" email" name="email" id="email" class="form-control border rounded" required>
            </div>

            <div class="mb-3">
                <label for="message ">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" required class="form-control border rounded"></textarea>

            </div>

            <input type="submit" value="envoyer" class="btn btn-info form-control" name="envoyer">

        </form>
        </div>

    </div>


</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>