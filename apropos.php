<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - apropos';
/*  3 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">

    <h2 class="text-warning my-3">Luminaire-Apropos </h2>

    <!--  section 1 -->
    <div class="pageapropos">
        <div>
            <img src="assets/img/imgslider.jpg " alt="image slider" class="img-fluid">

        </div>
        <div class="col-6 textpageapropos text-center d-none d-lg-block ">
            <h4 class="pt-3 ">À propos de nous</h4>
            <p class="border p-2 ">Que de chemin parcouru en 13 ans... et ce n’est qu’un début ! Notre petite start-up parisienne, Pure Player du design a bien grandi !
                Luminaire c’est du digital bien sûr (nous sommes classés parmi les meilleurs sites e-commerce de France) mais c’est aussi et surtout une formidable aventure humaine.</p>
        </div>

    </div>
    <!--  fin section 1 -->


    <h3 class="text-center my-3">MANIFESTO</h3>

    <!--  section 2 -->

    <div class="row">
        <!--  div 1 de la section 2  -->

        <div class="col-md-12 col-lg-4 mb-4">

            <img src="assets/img/oui1.jpg" alt="" class="mb-4 me-2 img-fluid">
            <h3> <span>oui</span>au choix</h3>
            <h4 class="my-3">LA CRÈME DU DESIGN</h4>


            <p>Suivre les tendances, c’est bien, mais avoir le choix, c’est mieux !

                Notre catalogue compte plus de 250 marques & 12.000 luminaires sélectionnés rien que pour vous, histoire d’être sûrs que vous puissiez trouver LA perle rare. Ce luminaire qui vous fera dire Waouh !

                Des sélections pointues, des grands noms du design et des designers en devenir que nous dénichons aux quatre coins du globe. Nous sommes revendeurs (et fans) officiels de chacune des marques avec lesquelles nous travaillons.

                Exclusivités, dénichés, icônes du design… Nous avons forcément la pépite que vous recherchez pour votre intérieur.</p>
        </div>


        <!--  fin de la div 1 de la section 2 -->

        <!--  div 2 de la section 2 -->
        
        <div class="col-md-12 col-lg-4 mb-4">
            <img src="assets/img/oui2.jpg" alt="img" class="mb-4 me-2 img-fluid">
            <h3> <span>OUI </span>à la simplicité</h3>
            <h4 class="my-3"> UN SERVICE CLIENT À VOTRE ÉCOUTE</h4>


            <p>Un site web ? OUI ! Mais il y a aussi toute une équipe engagée et prête à se plier en quatre pour vous servir.

                Une question ? Un doute ? Une déclaration d’amour à nous faire ? Nos équipes dédiées seront toujours là pour répondre à vos appels ou à vos emails.

                Et parce que nous souhaitons que votre expérience à nos côtés soit la meilleure possible, LightOnline propose une navigation et un processus d’achat simple et rapide. Votre satisfaction est notre plus belle lumière !

                C’est une évidence pour vous, une ligne de conduite chez nous.</p>

        </div>
        <!-- fin  div 2 de la section 2-->


        <!--  div 3 de la section 2  -->

        <div class="col-md-12 col-lg-4 "> 

            <img src="assets/img/oui3.jpg" class="mb-4 img-fluid">
            <h3> <span>OUI</span> aux conseils</h3>
            <h4 class="my-3">UN LIGHTMAG POUR VOUS</h4>
            <p>Aidés de nos experts PRO & DÉCO, de nos sélections thématiques, de nos cahiers des tendances ou encore de nos conseils techniques, faire le choix de votre nouveau luminaire devient facile ! L’objectif ? Rendre le design accessible à tous ! A travers nos articles, nous vous accompagnons pour créer une déco unique et à votre image.

                Nos inspirations viennent de partout, pour satisfaire tous les goûts, du rococo italien à l’épuré style scandinave…Vous mettre en lumière tous les jours, telle est notre mission !</p>
        </div>
    </div>

    <!--  fin  div 3 section 2 -->
    <!--  fin section 2  -->

    <!-- section 3 -->

    <div class="row">
        <div class="col-md-12  col-lg-6 my-auto mx-auto">
            <h3>La sélection de l’équipe</h3>
            <p class="" >Être leader de l’éclairage design et premium n’est pas que notre unique « luminaire », nous avons également à cœur de promouvoir le digital humain ! Chez Luminaire, la lumière est une seconde nature, c’est une passion qui anime tous nos collaborateurs, des acheteurs aux commerciaux, en passant par le team marketing. Nous avons voulu donner la parole à ceux qui font vibrer luminaire au quotidien : voici la sélection de notre équipe d’illuminés !</p>

        </div>
        <div class="col-md-12  col-lg-6">
            <img src="assets/img/equipe.jpg" alt="image equipe" class="img-fluid">

        </div>

    </div>
    <!--  fin section 3 -->


</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>