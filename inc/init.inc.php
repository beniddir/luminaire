<?php 

/* 1- Connexion à la BDD     pdo php  data objet  extension php qui permet la conexion a la BDD  */
$pdoLuminaire = new PDO(
    'mysql:host=localhost;    
    dbname=luminaire', 
    'root', /* NOM D'UTILISATEUR */
    '', /* POUR LES MOTS DE PASSE // vide sur PC */
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // demande l'affichage des erreurs sql dans la page sous forme de warning
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // précise le jeu de caractères à utiliser lors de l'affichage de ces erreurs
    )
);

/* 2 - Ouverture de session */
session_start();

/* 3 - initialisation de la variable contenu qui va nous servir pour afficher des erreurs sur plusieurs pages */
$contenu = "";// pas d'espace 
 

/* 4 - on inclue le fichier functions */
require('functions.inc.php');
?>