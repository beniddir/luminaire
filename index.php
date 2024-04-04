<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - Accueil';
/*  3 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">


    <!--  div vidéo -->
    <div class="container-fluid divideo">
        <h2 class="titrevideo"> Des éclairages <br> exceptionnels <br>pour votre<br> quotidien</h2>
        <video class="object-fit-fill  controls" autoplay="autoplay" muted=" " loop="infinite" id="video">
            <source src="assets/img/v.mp4">
            <!--  oject-fit-cover prend la largeur de son container  :
         controls :
         -->

        </video>
    </div>

    <a href="produits.php" class=" decouvrir">Découvrir </a>
    </div>
    <!-- fin div video -->
    <!--   <div class=" container d-flex align-items-center my-3">
        
     
    </div>-->

    <h2 class="mx-5 my-3"> <span>A</span> la Une</h2>

    <p class="p1  border  mx-auto  p-2 shadow h-2">

        Illuminez Votre Maison et Votre Extérieur avec Style
        Dans l'univers de l'éclairage domestique et extérieur</p>
    <?php
    /* 1- Faire la requete */
    $requete = $pdoLuminaire->query("SELECT * FROM produits ORDER BY id_produit DESC LIMIT 0,12");
    // Grâce aux valeur précisées après le LIMIT, je donne d'abord l'information de l'index par lequel je veux commencer (0 est le premier index du tableau) et combien de résultat je veux (16) 
    ?>
    <div class="row my-5">
        <?php
        while ($card = $requete->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="col-12 col-md-6 col-lg-3 ">
                <div class="card rounded border my-2">
                    <p>
                        <img src="assets/img/<?php echo $card['image'] ?>" class="img-fluid rounded " alt="image produit">
                    </p>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fs-6"><?php echo $card['titre']; ?></h5>
                        <p class="card-text"><?php echo substr($card['description'], 0, 50);
                                                // on utilise la fonction prédéfinie substr() afin de délimiter le nombre de caractères à afficher (1 - la chaîne de caractères, 2- notre point de commencement, 3- le nombre de caractères à afficher)
                                                ?> ...</p>


                    </div>
                    <a href="produit.php?id_produit=<?php echo $card['id_produit']; ?>" class="btn btn-info">Voir La suite</a>

                    <a href="ajouter_panier.php?id_produit=<?php echo "$card[id_produit]"; ?>" class="btn btn-primary">ajouter au panier</a>
                    <?php if (estAdmin()) { ?>

                        <a href="produits.php?action=suppression&id_produit=<?php echo $card['id_produit'] ?>" onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce produit ?'))" class="btn btn-warning">Supprimer</a>
                    <?php } ?>

                    <div class="card-footer">
                        <p class="text-success"> En stock : <?php echo $card['stock'] ?></p>
                        <p class="pprix"><?php

                                            echo $card['prix'] . " " . "EUR";  ?></p>
                    </div>
                </div>

            </div>
        <?php } ?>

    </div>

    <!--  div Boutique -->

    <h2 class="mx-5 my-3"> <span>B</span>outique </h2>
    <p class="paragraphe border  mx-auto  p-3 shadow">Chaque luminaire est une invitation à créer une ambiance unique et chaleureuse dans votre maison. Chez LUMINAIRE nous vous offrons une sélection soigneusement choisie de luminaires qui allient fonctionnalité et esthétique, pour sublimer chaque espace de vie, aussi bien à l'intérieur qu'à l'extérieur..</p>
    <div class=" container-fluid boutique ">
        <div class="row">

            <div class="salon col-sm-12 col-md-12  col-lg-6 ">

                <img src="assets/img/eclairage salon.jpg" alt="image salon" class="img-fluid" id="imgsalon">
                <div class="liensalon"> <a href="salon.php">éclairage salon</a></div>

            </div>
            <!--  fin div salon-->

            <div class="col-sm-12 col-md-6 col-lg-3">

                <div class="chambre">

                    <img src="assets/img/eclairagechambre.jpg" alt="image chambre" class="img-fluid" id="imgchambre">
                    <div class="lienchambre"> <a href="chambreadulte.php">éclairage chambre </a></div>

                </div>

                <!--  fin div chambre   -->
                <div class="sallebain mt-2">
                    <img src="assets/img/eclairage salle de bain.jpg" alt="image salle de bain" class="img-fluid" id="imgsallebain">
                    <div class="liensallebain"> <a href="salledebain.php">éclairage salle de bain</a></div>

                    <!-- fin div salle de bain    -->

                </div>
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-3">
                <div class="cuisine ">
                    <img src="assets/img/eclairage cuisine.jpg" alt="image cuisine" class="img-fluid" id="imgcuisine">
                    <div class="liencuisine"><a href="cuisine.php">éclairage cuisine</a></div>

                    <!-- fin div cuisine   -->

                </div>
                <div class="exterieur mt-2 ">

                    <img src="assets/img/Eclairage extérieur.jpg" alt="eclairage extérieur" class="img-fluid" id="imgext">

                    <div class="lienexterieur"><a href="exterieur.php"> éclairage extérieur</a></div>

                    <!--   fin div exterieur -->

                </div>

            </div>


        </div>

    </div>

    <!--  fin div boutique  -->

    <!--  div pub -->

    <div class="container">

        <div class="box container d_flex my-3">
            <div class="circle"></div>
            <p>New</p>


        </div>

        <h2 class="titres my-4 h-3"><span>B</span>ientôt le livre lumineux ! </h2>


        <div class="row my-3" id="divpub">


            <div class="col-sm-12 col-md-3 col-lg-3 text-center my-auto imglivre">
                <img src="assets/img/livre.jpg" class=" imagelivre" img-fluid alt="image livre" width="200" height="200">
            </div>


            <div class="col-sm-12 col-md-6 col-lg-6 " id="pub">
                <p class=" border  mx-auto  p-5 shadow bg-warning">
                    Plongez dans une expérience de lecture sans pareille où chaque mot brille d'une lueur douce et apaisante.Luminaire vous offre le confort de lire à tout moment même sous les étoiles.
                </p>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 text-center my-auto" id="imgfille">
                <img src="assets/img/livre2.jpg" alt="livrefille" class="img-fluid" width="200" height="150">
            </div>

        </div><!-- fin div pub -->


    </div>


</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>