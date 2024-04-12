<?php
// Require du fichier init : connexion à la BDD
require 'inc/init.inc.php';

// Déclaration des variables du header et appel du fichier
$title = 'Luminaire-admin-commande';
$h1 = 'luminaire - les commande admin';
$paragraphe = 'liste des commandes';
require 'inc/header.inc.php';
?>

<main class="container">
    <h2> <span>L</span>es Commandes</h2>

    <?php
    // 1 Requête pour récupérer les commandes
    $requete = $pdoLuminaire->query("SELECT * FROM utilisateurs, commandes WHERE commandes.id_utilisateur = utilisateurs.id_utilisateur ORDER BY id_commande DESC");
    
    // 2 - récupération des résultats 

    while ($commande = $requete->fetch(PDO::FETCH_ASSOC)) {
        // 2- a  Affichage du nom et prénom de la personne
        echo "<p class=\" bg-warning  \">Commande N° $commande[id_commande]</p>";

        //2- b Affichage du nom et prénom de la personne
        echo "<p class=\" \">La commande de :$commande[prenom] $commande[nom]</p>";

        //2-c Formatage de la date de la commande
        $date = new DateTime($commande['date_commande'], new DateTimeZone('Europe/Paris'));
        $dateFormatee = IntlDateFormatter::formatObject(
            $date,
            'dd MMMM Y',
            'fr'
        );
        echo "<p>Date de la commande: $dateFormatee</p>";

        // 3 Requête pour récupérer les détails de la commande
        $commande_id = $commande['id_commande'];
        $requete1 = $pdoLuminaire->prepare("SELECT * FROM produits,commande_details WHERE
                                                produits.id_produit = commande_details.id_produit 
                                                AND commande_details.id_commande = :commande_id");


        $requete1->execute(array(':commande_id' => $commande_id));

        // 3- a Début du tableau pour afficher les détails de la commande
        echo "<table class='table table-primary table-striped table-bordered border-light fs-6 table-sm'>";
        echo "<thead class='fs-6'>";
        echo "<tr>";
        echo "<th>Titre</th>";
        echo "<th>Prix</th>";
        echo "<th>Quantité</th>";
        echo "<th>Montant</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($commande_details = $requete1->fetch(PDO::FETCH_ASSOC)) {
            // 3 - bAffichage des détails de la commande
            echo "<tr>";
            echo "<td>$commande_details[titre]</td>";
            echo "<td>$commande_details[prix]</td>";
            echo "<td>$commande_details[quantite]</td>";
            echo "<td>$commande_details[montant]</td>";
            echo "</tr>";
        }

        // Fin du tableau
        echo "</tbody>";
        echo "</table>";

        // 2- d Affichage du total de la commande
        echo "<p>Quantité Totale: $commande[quantite_total]</p>";
        echo "<p>Prix Total: $commande[total]</p>";
    }
    ?>
</main>

<?php require 'inc/footer.inc.php'; ?>