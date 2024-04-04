<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */

$title = 'Luminaire - message';
/*  3 inclure le header  */
require 'inc/header.inc.php';



// Connexion au serveur IMAP local (Laragon)
$mailbox = imap_open("{localhost:993/imap/ssl/novalidate-cert}", "root", "");

if (!$mailbox) {
    die("Impossible de se connecter à la boîte aux lettres : " . imap_last_error());
}

// Récupérer les en-têtes des e-mails
$headers = imap_headers($mailbox);

// Afficher les en-têtes des e-mails
foreach ($headers as $header) {
    echo $header . "<br>";
}

// Fermer la boîte aux lettres
imap_close($mailbox);
?>


<main class="container">


    

  


</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>