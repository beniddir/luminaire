<?php 

/* 1 - Création de la fonction de debug: debug() */

function debug($mavar){
    echo "<pre class=\"alert alert-warning\">";
    var_dump($mavar);
    echo "</pre>";
}

/* 2- Création de la fonction pour vérifier qu'un utilisateur est connecté */

function estConnecte(){
    if(isset($_SESSION['utilisateurs'])){/* $_SESSION permet de récupérer des informations sur la session de la personne se trouvant sur notre site actuellement. Ici je précise que $_SESSION doit aller chercher les infos concernant la tables utilisateurs */
        return true; // la personne est connectée
    }else{
        return false; // la personne n'est pas connectée
    }
}

/* 3- Fonction estAdmin() pour vérifier qu'un utilisateur est admin */

function estAdmin(){
    if(estConnecte() && $_SESSION['utilisateurs']['statut'] == 1){ // on vérifie que l'utilisateur rempli les conditions de notre fonction estConnecte() ET que son statut en BDD correspond à 1 (admin)
        return true; // connecté et admin
    }else{
        return false; // pas admin
    }
}

?>