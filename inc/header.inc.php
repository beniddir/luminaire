<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- lien icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Lien LUX Bootswatch -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.2/lux/bootstrap.min.css" integrity="sha512-zTvuig0lp44Ol8dgsXd7DGM3vSuLu8lIaGIEZ9pvh62u5lXNKMqZzqcBxBqju8pacqCCS2J5hWKrVS4IzJXEyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- lien feuille de style css  -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--  lien image favicon -->
    <link rel="shortcut icon" href="assets/img/soleil.jpg" type="image/x-icon">


</head>

<header>
    <!-- logo+ titre + formulaire de recherche et les icone panier et contact et connexion -->
    <div class="container-fluid">

        <!--   log + tire  -->
        <div class="row mt-3 ">
            <div class=" d-flex align-items-center  col-sm-12  col-md-12  col-lg-4">
                <img src="assets/img/logo.png" alt="logo">
                <a href="index.php" id="nomsite">Luminaire</a>
            </div>
            <!--  fin  log + tire  -->

            <!--  barre de recherche -->
            <!-- Formulaire de recherche -->
            <div class="col-sm-6 col-md-6 col-lg-4 mt-3">
                <form class="d-flex h1 form1" role="search" action="recherche.php" method="GET">
                    <input class="form-control text-center border rounded-pill" type="search" placeholder="Tapez votre recherche ici" aria-label="Search" name="search1">
                    <button class="btn" type="submit" name="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>


            <!-- fin de la barre de recherche  -->
            <!--  div des icon contact panier connexion -->

            <div class="col-sm-6 col-md-6  col-lg-4  text-center mt-3">
                <div class="d-inline-block">
                    <a href="contact.php"><i class="bi bi-envelope-fill "></i></a>
                    <p class="pheader">Contact</p>
                </div>
                <!--d-inline-block est utilisée pour afficher un élément comme un bloc en ligne, ce qui signifie qu'il occupe seulement la largeur nécessaire à son contenu et qu'il ne commence pas une nouvelle ligne après lui-même.  -->

                <div class="d-inline-block"> <a href="panier.php"><i class="bi bi-bag-heart "></i></a>
                    <p class="pheader"> Panier <small><?php echo isset($_SESSION['panier']) ? array_sum($_SESSION['panier']) : 0; ?></small> </p>

                </div>

                <div class="d-inline-block">
                    <a href="connexion.php"><i class="bi bi-person-plus-fill "></i></a>
                    <?php
                    if (!estConnecte()) {
                        echo '<p class="pheader">Connexion</p>';
                    } else {
                        echo '<p class="pheader">Connecté(e)</p>';
                    } ?>


                </div>

            </div>
            <!-- fin div des icon contact panier connexion -->
        </div>

    </div>
    <!--  navbar desktop -->
    <div class="container-fluid text-center">

        <nav class="navbar  bg-body-tertiary  d-none d-lg-block mb-3">
            <ul class="nav  h5">
                <li class="nav-item dropdown">
                    <!-- "nav-item" : Cette classe est utilisée pour définir un élément de navigation dans une barre de navigation Bootstrap -->
                    <!--"dropdown" : Cette classe est utilisée pour indiquer que l'élément de navigation est un menu déroulant  -->
                    <a href="chambre.php" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"> éclairage Chambre</a>
                    <!-- nav-link :Elle applique un style de lien spécifique bootstrap -->
                    <!-- dropdown-toggleelle ajoute une petite flèche à droite du lien pour indiquer aux utilisateurs qu'un menu déroulant est associé à ce lien   -->
                    <!-- data-bs-toggle permettre à l'utilisateur d'activer ou désactiver les menu déroulant  par un clic. -->

                    <ul class="dropdown-menu">

                        <li><a href="chambreadulte.php" class="dropdown-item">Chambre Adulte</a></li>
                        <li><a href="chambreenfant.php" class="dropdown-item">Chambre Enfant</a> </li>
                    </ul>
                </li>


                </li>
                <li> <a href="salon.php" class="nav-link"> éclairage salon</a>
                </li>
                <li> <a href="cuisine.php" class="nav-link"> éclairage Cuisine</a>
                </li>
                <li> <a href="salledebain.php" class="nav-link">éclairage Salle de bain </a>
                </li>
                <li> <a href="exterieur.php" class="nav-link">éclairage Extérieur </a>
                </li>
                <?php
                if (estConnecte()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>">Profil</a>
                    </li>
                <?php }
                if (estConnecte() && estAdmin()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouterunproduit.php">Ajouter un produit</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="commandes.php"> Les Commandes </a>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestionstock.php"> Le Stock </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="commentaire.php">Les Commentaires</a>

                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- fin  navbar desktop -->

        <!--  navbar mobile sm /md -->
        <div class="navbar-mobile d-block d-md-non d-lg-none">
            <i class="bi bi-list" id="bouton">
            </i>
            <p id="pmenu">Menu</p>
            <div class="modale">
                <div class="navbar-mobile-listes">
                    <ul class="nav ms-3">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link  dropdown-toggle" data-bs-toggle="dropdown"> éclairage
                                Chambre</a>
                            <ul class="dropdown-menu">
                                <li><a href="chambreadulte.php" class="dropdown-item">Chambre Adulte</a></li>
                                <li><a href="chambreenfant.php" class="dropdown-item">Chambre Enfant</a> </li>
                            </ul>
                        </li>
                        <li> <a href="salon.php" class="nav-link"> éclairage Salon</a>
                        </li>
                        <li> <a href="cuisine.php" class="nav-link"> éclairage Cuisine </a>
                        </li>
                        <li> <a href="salledebain.php" class="nav-link">éclairage Salle de bain </a>
                        </li>
                        <li> <a href="exterieur.php" class="nav-link">éclairage Extérieur </a>
                        </li>

                        <?php
                        if (estConnecte()) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="profil.php?id_utilisateur=<?php echo $_SESSION['utilisateurs']['id_utilisateur'] ?>">Profil</a>
                            </li>
                        <?php }
                        if (estConnecte() && estAdmin()) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="ajouterun.php">Ajouter un produit</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="commandes.php">Les commandes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gestionstock.php">Le Stock </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="commentaire.php">Les Commentaires </a>
                            </li>

                        <?php } ?>
                    </ul>

                </div>

            </div>
        </div>
        <!--  navbar mobile sm /md -->

    </div>

</header> <!-- fin header  -->

<body>