<?php

/* 1- Require du fichier init : connexion à la BDD */
require 'inc/init.inc.php';

/* 2- Déclaration des variables du header et appel du fichier */
$title = 'Luminaire - conseils';
$h1='conseils';
/*  3 inclure le header  */
require 'inc/header.inc.php';

?>
<main class="container">

    <h2 class="text-warning my-3">Luminaire-Conseils éclairage pièce par pièce </h2>
    <!--  section 1 -->
    <div class="container">
        <img src="assets/img/imgconseils1.jpg" class="img-fluid my-4" alt="imagesalon">
        <p class=" border  mx-auto  p-3 shadow">L’éclairage est un élément indispensable à notre bien-être. Que cela soit par la lumière du soleil ou bien celle transmise par nos luminaires, il ne faut pas négliger l’apport en clarté dans votre intérieur si vous voulez vous sentir bien chez vous et bien dans votre peau ! Cela étant, malgré toutes les bonnes intentions du monde, cette résolution n’est pas toujours facile à mettre en œuvre surtout si l’on habite dans une ancienne bâtisse avec peu d’ouvertures ou au sein d’un appartement qui n’est pas orienté sud… Si tel est votre cas, ne baissez pas les bras, il existe de multiples solutions pour faire rayonner une pièce un peu sombre ! Quelles sont les bonnes astuces à adopter pour éclairer votre intérieur ? Comment user de son éclairage pour créer une ambiance intimiste chez soi ? Nos experts vous livrent leurs conseils éclairés. </p>

    </div>
    <!--  section salon  -->
    <div class="container">
        <h3 class="my-3">L’éclairage du salon</h3>
        <p class="border  mx-auto  p-3 shadow">
            Pièce de vie à part entière, le salon doit être un endroit à la fois fonctionnel pour les activités du quotidien, et convivial, un espace cosy dans lequel on aime recevoir et se relaxer confortablement après sa journée de travail. Ici, le mieux est de multiplier les sources lumineuses en fonction de l’atmosphère voulue et des besoins, en mettant en place deux types d’éclairage : un éclairage direct et un plus diffus.

            Pour l’éclairage direct, on va privilégier une source de lumière plutôt intense comme une suspension, disposée si possible au centre de la pièce. Si le salon fait également salle à manger, la suspension viendra idéalement éclairer cette table et lui apporter sa touche déco.

            Ensuite, si l’espace est grand, il s’agira de compléter cet éclairage avec d’autres types de luminaires. Les lampadaires et les lampes potences sont parfaits pour cela, car ils s’installent facilement dans un angle, au-dessus d’un buffet ou d’un coin cosy composé d’un fauteuil et d’un petit bout de canapé. Des appliques peuvent également être installées à certains endroits afin de mettre en valeur des volumes, des accessoires ou bien un meuble en particulier.

            Ensuite, on viendra peaufiner l’ambiance avec d’autres petits points de lumière : guirlandes, lampes de table et objets lumineux disposés à des endroits stratégiques, afin d’apporter une touche très déco à l’ensemble. Près du coin lecture, une lampe avec abat-jour saura vous apporter la lumière qu’il vous faut tout en ajoutant un effet chaleureux.


        </p>
    </div>
    <div class="row">
        <div class="image1salon col-md-12 col-lg-6">
            <img src="assets/img/conseilsalon1.jpg" alt="imagesalon" class="img-fluid">

        </div>
        <div class="image2salon col-md-12 col-lg-6">
            <img src="assets/img/conseilsalon2.jpg" alt="imagesalon" class="img-fluid">

        </div>

    </div>

    <!--  fin section salon  -->

    <!--  section cuisine  -->
    <div class="container">
        <h3 class="my-3">L’éclairage de la cuisine </h3>
        <p class="border  mx-auto  p-3 shadow">
            Si une seule pièce de la maison doit retenir votre attention en matière d’éclairage, c’est bien la cuisine. Dans ce lieu, 3 types d’éclairages sont nécessaires : l’éclairage fonctionnel, l’éclairage décoratif et l’éclairage du coin repas.

            Pour un bon éclairage de travail, il est important de veiller à ce que la source lumineuse soit bien placée pour ne pas créer d’ombres.

            Pour le travail (au-dessus de la plaque de cuisson, de l’évier et des plans de travail), il est conseillé d’opter pour une lumière claire car vous avez besoin d’une puissance d’éclairage assez importante. Pour cela, les projecteurs à LED, les spots ou encore les tubes à leds sont de bonnes solutions.

            Pour le côté décoratif, vous pouvez ajouter des rubans LED blanc froid, blanc chaud, blanc variable (CCT) ou en multi couleurs (RGB) selon le résultat souhaité. Quelques appliques décoratives peuvent également être posées.
            Au-dessus du coin repas, les luminaires en suspension sont une bonne idée et apporteront du style à votre cuisine : attention cependant à bien respecter une distance d’au moins 70 centimètres entre la table et la source lumineuse. La lampe potence est également une option intéressante, si la table est suffisamment proche d’un mur pour la fixer. Le choix d’un lampadaire se fera en fonction de la place disponible : il est à éviter dans les petits espaces, le coin repas devant rester dégagé. Luminaire ou lampe potence, il peut être judicieux de choisir des produits à variation d’intensité en fonction de la puissance voulue.
        </p>
    </div>
    <div class="row">
        <div class="image1salon col-md-12 col-lg-6">
            <img src="assets/img/conseilcuisine1.jpg" alt="image cuisine" class="img-fluid">

        </div>
        <div class="image2salon col-md-12 col-lg-6">
            <img src="assets/img/conseilcuisine2.jpg" alt="image cuisine" class="img-fluid">

        </div>

    </div>

    <!--  fin section cuisine   -->

    <!--  section  chambre -->
    <div class="container">
        <h3 class="my-3">L’éclairage de la chambre </h3>
        <p class="border  mx-auto  p-3 shadow">
            Espaces dédiées au repos, les chambres sont bien trop souvent sous-éclairées. Ici, deux types d’éclairages doivent être envisagés : l’éclairage fonctionnel et l’éclairage d’ambiance.Pour l’éclairage fonctionnel, vous pouvez choisir une suspension dont l’ampoule est dissimulée par un abat-jour afin de ne pas vous éblouir lorsque vous êtes allongé. La puissance de ce luminaire doit être assez importante afin de vous permettre d’y voir clair lorsque vous évoluez dans la pièce. Toutefois, évitez dans la mesure du possible les éclairages blancs qui sont trop agressifs. Toujours pour le côté fonctionnel, un spot peut être posé dans chacun de vos placards pour vous aider à choisir vos vêtements de manière éclairée. Enfin, des appliques murales peuvent venir compléter cet éclairage utile.Côté ambiance à présent, les lampes de chevet, les liseuses ou encore des luminaires sur pied font très bien l’affaire ! Une guirlande lumineuse est également une jolie façon de signifier la tête de lit tout en apportant un éclairage cocooning.

            La grande tendance du moment : les suspensions coordonnées ou dépareillées, en guise de lampe de chevet.
        </p>
    </div>
    <div class="row">
        <div class="image1salon col-md-12 col-lg-6">
            <img src="assets/img/conseilchambre1.jpg" alt="imagechambre" class="img-fluid">

        </div>
        <div class="image2salon col-md-12 col-lg-6">
            <img src="assets/img/conseilchambre2.jpg" alt="imagechambre" class="img-fluid">

        </div>

    </div>

    <!--  fin section chambre  -->
    <!--  section sallede bain  -->

    <div class="container">
        <h3 class="my-3">L’éclairage de la salle de bain </h3>

        <p class="border  mx-auto  p-3 shadow">

            L’électricité et l’eau ne font pas bon ménage c’est pourquoi le choix des luminaires demande une réflexion toute particulière pour cette pièce de la maison. On évite ainsi tous les accessoires avec fil au profit des éclairages de types spots, appliques, leds encastrés ou plafonniers.

            L’éclairage spécifique (autour du miroir, du lavabo ou de la douche) doit avoir une puissance suffisante si vous voulez éviter de vous mettre le crayon dans l’œil en vous maquillant ou de vous couper en vous rasant. Oubliez les éclairages intimistes et feutrés, pas vraiment adaptés.

            L’idéal dans cette pièce : combiner plusieurs sortes de lumières, par exemple un éclairage général, d’ambiance (plafonnier), et un éclairage plus ciblé (spots), pour voir de près.

            Les réglettes de salle de bain composées d’un tube fluo ou de LED délivrent notamment un éclairage optimal, de même que les miroirs avec système lumineux intégré, pour un rendu design.

        </p>
        <img src="assets/img/conseilsallebain.jpg" alt="image salle de bain" class="img-fluid">

        <p class="border  mx-auto  p-3 shadow">Afin de réaliser des économies d’énergie, privilégiez les ampoules de type LED qui sont moins énergivores avec la même puissance, qui durent plus longtemps et qui sont respectueuses de l’environnement. Pensez à vérifier l’étiquette énergétique de vos ampoules. </p>
    </div>



</main>



<!-- 4 inclure le footer  -->
<?php require 'inc/footer.inc.php'; ?>