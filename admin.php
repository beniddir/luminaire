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
        $requete = $pdoLuminaire->query("SELECT * FROM utilisateurs, commandes WHERE commandes.id_utilisateur = utilisateurs.id_utilisateur ");

        while ($commande = $requete->fetch(PDO::FETCH_ASSOC)) {

            echo "<p class=\" bg-warning  \">Commande N° $commande[id_commande]</p>";

            // Affichage du nom et prénom de la personne
            echo "<p class=\" \">La commande de :$commande[prenom] $commande[nom]</p>";

            // Formatage de la date de la commande
            $date = new DateTime($commande['date_commande'], new DateTimeZone('Europe/Paris'));
            $dateFormatee = IntlDateFormatter::formatObject(
                $date,
                'dd MMMM Y',
                'fr'
            );
            echo "<p>Date de la commande: $dateFormatee</p>";

            // Requête pour récupérer les détails de la commande
            $commande_id = $commande['id_commande'];
            $requete1 = $pdoLuminaire->prepare("SELECT * FROM produits,commande_details WHERE
                                                produits.id_produit = commande_details.id_produit 
                                                AND commande_details.id_commande = :commande_id");

        
            $requete1->execute(array(':commande_id' => $commande_id));
            
            // Début du tableau pour afficher les détails de la commande
            echo "<table class='table table-primary table-striped table-bordered border-light'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Titre</th>";
            echo "<th>Prix</th>";
            echo "<th>Quantité</th>";
            echo "<th>Montant</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($commande_details = $requete1->fetch(PDO::FETCH_ASSOC)) {
                // Affichage des détails de la commande
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

            // Affichage du total de la commande
            echo "<p>Quantité Totale: $commande[quantite_total]</p>";
            echo "<p>Prix Total: $commande[total]</p>";
        }
    ?>
</main>

<?php require 'inc/footer.inc.php'; ?>
