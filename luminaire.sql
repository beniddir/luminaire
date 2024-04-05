-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 05 avr. 2024 à 12:34
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `luminaire`
--
CREATE DATABASE IF NOT EXISTS `luminaire` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `luminaire`;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `total` float NOT NULL,
  `quantite_total` int NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_utilisateur`, `total`, `quantite_total`, `date_commande`) VALUES
(70, 3, 232, 2, '2024-03-20'),
(71, 3, 223, 2, '2024-03-25'),
(72, 1, 84, 1, '2024-04-02'),
(73, 5, 84, 1, '2024-04-02'),
(74, 2, 168, 2, '2024-04-02'),
(75, 3, 143, 2, '2024-04-02'),
(76, 3, 148, 2, '2024-04-02'),
(77, 3, 233, 2, '2024-04-02'),
(80, 3, 168, 2, '2024-04-02'),
(81, 4, 168, 2, '2024-04-02'),
(82, 6, 158, 2, '2024-04-02'),
(83, 3, 158, 2, '2024-04-02'),
(84, 2, 168, 2, '2024-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `commande_details`
--

CREATE TABLE `commande_details` (
  `id_commande_details` int NOT NULL,
  `id_commande` int NOT NULL,
  `id_produit` int NOT NULL,
  `quantite` int NOT NULL,
  `montant` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commande_details`
--

INSERT INTO `commande_details` (`id_commande_details`, `id_commande`, `id_produit`, `quantite`, `montant`) VALUES
(94, 70, 7, 1, 94),
(95, 70, 14, 1, 138),
(96, 71, 3, 1, 139),
(97, 71, 15, 1, 84),
(99, 72, 15, 1, 84),
(103, 73, 15, 1, 84),
(104, 74, 7, 1, 94),
(105, 74, 24, 1, 74),
(106, 75, 24, 1, 74),
(107, 75, 34, 1, 69),
(108, 76, 24, 2, 148),
(109, 77, 3, 1, 139),
(110, 77, 7, 1, 94),
(117, 80, 7, 1, 94),
(118, 80, 24, 1, 74),
(119, 81, 7, 1, 94),
(120, 81, 24, 1, 74),
(121, 82, 24, 1, 74),
(122, 82, 15, 1, 84),
(123, 83, 15, 1, 84),
(124, 83, 24, 1, 74),
(125, 84, 7, 1, 94),
(126, 84, 24, 1, 74);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_produit` int NOT NULL,
  `commentaire` longtext NOT NULL,
  `date` date NOT NULL,
  `valide` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `id_utilisateur`, `id_produit`, `commentaire`, `date`, `valide`) VALUES
(1, 3, 7, 'Un choix idéal pour illuminer votre espace de repas avec style et fonctionnalité.', '2024-03-18', 1),
(2, 6, 6, 'Je suis très satisfait de cette lampe LED pour ma cuisine ! Elle éclaire parfaitement mon plan de travail sans éblouir, et sa couleur de lumière blanche naturelle crée une ambiance agréable', '2024-04-03', 1),
(3, 5, 2, 'J&#039;ai récemment installé l&#039;éclairage Cubus dans mon salon et je suis vraiment impressionné par sa qualité et son design moderne.', '2024-04-03', 0),
(4, 5, 5, 'Je suis absolument ravi de mon nouvel éclairage Berend en verre ! Son design élégant apporte une touche de sophistication à ma pièce, tandis que la qualité du verre utilisé lui confère une allure luxueuse', '2024-04-03', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `prix` float NOT NULL,
  `stock` int NOT NULL,
  `categorie` enum('salon','cuisine','salle de bain','chambre enfant','chambre adulte','exterieur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `image`, `titre`, `description`, `prix`, `stock`, `categorie`) VALUES
(2, 'imgsalon1.webp', 'Suspension Cubus', 'La suspension Cubus est une pièce élégante et moderne qui ajoute une touche de sophistication à votre salon Inspirée par la simplicité géométrique, cette suspension se caractérise par ses lignes épurées et son design minimaliste.\r\nCe luminaire se distingue par son abat-jour ou sa structure principale qui adopte une forme cubique, lui conférant une esthétique géométrique et épurée. Les lignes nettes et les angles précis captent le regard, ajoutant une dimension artistique à votre intérieur.\r\n', 269, 60, 'salon'),
(3, 'imgsalon2.webp', 'Lindby Trebale suspension', 'Son design minimaliste et épuré est accentué par des lignes nettes et des matériaux de haute qualité. Fabriquée avec soin, cette suspension arbore une structure en métal finement travaillée qui assure à la fois solidité et légèreté visuelle.\r\nFabriquée avec des matériaux de haute qualité, la suspension Lindby Trébale garantit une durabilité et une fiabilité exceptionnelles. Son installation facile et sa compatibilité avec les ampoules LED en font un choix pratique et écoénergétique pour votre éclairage domestique.\r\n', 139, 35, 'salon'),
(4, 'sallebain1.webp', 'Applique pour salle de bain Kara', 'L\'applique pour salle de bain Kara est une pièce lumineuse et élégante conçue spécifiquement pour apporter un éclairage fonctionnel et esthétique à votre espace de toilette. Avec son design moderne et ses fonctionnalités adaptées à l\'humidité de la salle de bain, cette applique combine style et praticité pour créer une ambiance accueillante et fonctionnelle dans votre salle de bain.\r\nCe luminaire est spécialement conçu pour résister aux conditions humides et à l\'humidité présente dans la salle de bain. Fabriqué avec des matériaux de qualité, il offre une durabilité et une longévité remarquables, tout en assurant un éclairage optimal pour vos activités quotidiennes dans la salle de bain.', 39, 29, 'salle de bain'),
(5, 'sallebain2.webp', 'Applique Berend en verre', 'L\'applique Berend en verre est une pièce lumineuse et élégante qui apporte une touche de sophistication à tout espace. Avec son design contemporain et ses matériaux de haute qualité, cette applique combine style et fonctionnalité pour créer une ambiance accueillante dans votre maison.\r\nCette applique se caractérise par son abat-jour en verre de haute qualité, qui diffuse la lumière de manière uniforme et agréable. La transparence du verre ajoute une dimension de légèreté et de luminosité à votre pièce, créant une ambiance  apaisante.\r\n', 46, 2, 'salle de bain'),
(6, 'imgcuisine1.webp', 'Arcchio Nortra lampes sous meuble LED', 'Les lampes sous meuble LED Arcchio Nortra, vendues en lot de 3, sont des luminaires pratiques et efficaces conçus pour éclairer les espaces sous les armoires ou les étagères. \r\nes lampes Nortra sont équipées de LED intégrées, offrant un éclairage lumineux et économe en énergie. Les LED fournissent une lumière blanche et uniforme qui illumine efficacement les zones sous les meubles sans créer d\'ombres gênantes.\r\nLe lot comprend trois lampes sous meuble, ce qui permet de couvrir une plus grande surface et d\'assurer un éclairage uniforme dans la cuisine, le salon ou d\'autres espaces où elles sont installées.\r\nLes lampes sont discrètes et s\'intègrent facilement à tout type de décoration intérieure. Leur profil mince et leur couleur neutre les rendent peu intrusives, tout en offrant un éclairage fonctionnel là où il est nécessaire.\r\n', 74, 23, 'cuisine'),
(7, 'imgcuisine2.webp', 'Suspension Flynn 3 lampes pour table à manger', 'La suspension Flynn à 3 lampes est un luminaire élégant conçu spécialement pour éclairer une table à manger.\r\nLa suspension Flynn arbore un design moderne et épuré qui s&#039;intègre parfaitement à différents styles de décoration intérieure, qu&#039;ils soient traditionnels ou contemporains. Son esthétique élégante ajoute une touche de sophistication à la pièce.\r\nCette suspension est équipée de trois lampes, chacune étant généralement réglable en hauteur. Cela permet de personnaliser l&#039;éclairage en fonction des besoins spécifiques de la table à manger et de créer une ambiance agréable et accueillante.\r\nFabriquée avec des matériaux durables et de haute qualité, la suspension Flynn assure une longue durée de vie et une utilisation fiable à long terme. Les finitions soignées ajoutent une touche de sophistication à son design global.\r\n', 94, 4, 'cuisine'),
(8, 'imgext1.webp', 'Lindby Nivar applique extérieur LED ronde blanc', 'L\'applique extérieure LED Lindby Nivar, de forme ronde et de couleur blanche, est un luminaire élégant et fonctionnel spécialement conçu pour éclairer les espaces extérieurs.\r\nSa forme ronde et sa couleur blanche lui confèrent un aspect élégant et discret\r\nFabriquée avec des matériaux de haute qualité et résistants aux intempéries, cette applique est conçue pour une utilisation en extérieur. Elle est généralement fabriquée en métal ou en plastique durable, assurant une longue durée de vie même dans des conditions météorologiques difficiles.: Grâce à sa conception spécialement conçue pour une utilisation en extérieur, cette applique est généralement dotée d\'une protection contre l\'eau, la poussière et d\'autres éléments environnementaux. Cela garantit une performance fiable et durable même dans des conditions \r\n', 29, 63, 'exterieur'),
(9, 'imgext2.webp', 'Applique d\'extérieur LED anguleuse Hedda', 'L\'applique d\'extérieur LED anguleuse Hedda est un luminaire conçu pour éclairer les espaces extérieurs tout en offrant un design moderne et élégantL\'applique Hedda présente un design contemporain avec des lignes anguleuses qui lui confèrent une apparence moderne et sophistiquée. Cette esthétique s\'intègre harmonieusement à une variété de styles architecturaux extérieurs.\r\n\r\nFabriquée avec des matériaux de haute qualité et résistants aux intempéries, tels que l\'aluminium ou le métal, cette applique est conçue pour résister aux conditions extérieures difficiles telles que la pluie, le vent et la poussière.\r\nDotée de LED intégrées, l\'applique Hedda offre un éclairage puissant et économe en énergie pour éclairer efficacement les entrées, les allées, les terrasses ou tout autre espace extérieur. Les LED fournissent également une lumière blanche et brillante qui améliore la visibilité et la sécurité.\r\n', 44, 89, 'exterieur'),
(10, 'chambread1.webp', 'Applique LED Anays, rectangulaire', 'L\'applique LED Anays est un luminaire rectangulaire équipé de la technologie LED. Cette applique est conçue pour être fixée au mur, offrant un éclairage efficace et esthétique dans la pièce elle peut s\'intégrer harmonieusement dans différents styles d\'aménagement et apporter une touche moderne à l\'espace. Les LED fournissent un éclairage lumineux et écoénergétique, offrant souvent une longue durée de vie et une faible consommation d\'énergie. ', 84, 23, 'chambre adulte'),
(11, 'chambread2.webp', 'Lindby Lorentina lampe de table tissu lièvre', 'La lampe de table Lindby Lorentina est un luminaire au design élégant et contemporain, caractérisé par son abat-jour en tissu lièvre. Cette lampe combine style et fonctionnalité pour créer une ambiance chaleureuse et accueillante dans n\'importe quelle pièce. L\'abat-jour en tissu lièvre diffuse une lumière douce et tamisée, créant ainsi une atmosphère relaxante et confortable.\r\nLa base de la lampe est généralement fabriquée en métal ou en bois, offrant stabilité et durabilité. \r\n\r\n', 89, 26, 'chambre adulte'),
(12, 'chambrenf1.webp', 'Lindby Roxas plafonnier chambre enfant, fée', 'Le plafonnier Lindby Roxas est un luminaire conçu spécialement pour les chambres d\'enfants, avec une charmante illustration de fée\r\nC\'est  un design ludique et coloré qui ravira les enfants. L\'illustration de la fée ajoute une touche de magie et d\'imagination à la chambre, créant un environnement accueillant et stimulant.\r\nFabriqué avec des matériaux de haute qualité, ce plafonnier assure la sécurité des enfants tout en offrant une durabilité à long terme. Les matériaux sont choisis pour leur résistance et leur facilité d\'entretien.\r\nLe plafonnier Roxas offre un éclairage doux et apaisant, parfait pour créer une ambiance relaxante dans la chambre des enfants. La lumière diffuse contribue à instaurer un environnement propice au repos et à la détente.\r\n', 54, 63, 'chambre enfant'),
(13, 'chambrenf2.webp', 'Lindby Jan plafonnier enfant,voiture', 'Le plafonnier Lindby Jan est spécialement conçu pour les chambres d\'enfants, avec une illustration amusante de voitures\r\n\r\nLe plafonnier Jan arbore un design joyeux et dynamique, avec une illustration de voitures qui captivera l\'imagination des enfants. Les couleurs vives et attrayantes ajoutent une touche de vivacité à la chambre.\r\nLe thème des voitures est un choix populaire pour les chambres d\'enfants, inspirant le jeu et l\'aventure. L\'illustration des voitures sur le plafonnier Jan offre un point focal visuel qui stimule l\'imagination des enfants.\r\nCe plafonnier est généralement facile à installer et peut être fixé au plafond de la chambre en quelques étapes simples. Les instructions de montage sont incluses pour faciliter le processus.\r\n', 74, 41, 'chambre enfant'),
(14, 'imgsalon3.webp', 'Lampadaire arqué Jonera', 'Fabriqué avec des matériaux de haute qualité, le lampadaire Jonera est à la fois robuste et élégant. Son pied solide assure une stabilité optimale tout en ajoutant une touche de raffinement à son esthétique globale. Le bras arqué du lampadaire permet une orientation flexible de la lumière, offrant une solution d\'éclairage polyvalente pour différentes activités telles que la lecture, la détente ou l\'éclairage d\'appoint.\r\n', 138, 13, 'salon'),
(15, 'imgcuisine3.webp', 'Lucande Ably suspension, verre fumé', 'La suspension Lucande Ably est un luminaire élégant et moderne, conçu avec un verre fumé et équipé de trois lampes.\r\n\r\nLa suspension Lucande Ably présente un design sophistiqué et contemporain qui s&#039;intègre parfaitement à différents styles de décoration intérieure. Son esthétique élégante ajoute une touche de modernité à la pièce.\r\nLes abat-jours en verre fumé offrent un aspect subtil et élégant, tout en diffusant la lumière de manière douce et agréable. Le verre fumé crée une ambiance chaleureuse et apaisante dans la pièce.\r\nCette suspension est équipée de trois lampes, chacune étant généralement réglable en hauteur. Cela permet de personnaliser l&#039;éclairage en fonction des besoins spécifiques de la pièce et de créer une ambiance confortable et accueillante.\r\n', 84, 11, 'cuisine'),
(16, 'chambrenf3.webp', 'Applique  chambre Mailin en rose ', 'L&#039;applique Mailin en rose est spécialement conçue pour les chambres d&#039;enfants, offrant une touche de charme et de douceur dans l&#039;espace.\r\n\r\nL&#039;applique Mailin présente un design délicat et ludique, avec des éléments pensés pour plaire aux enfants. Sa couleur rose douce et ses formes arrondies créent une ambiance chaleureuse et accueillante dans la chambre.\r\nFabriquée avec des matériaux de haute qualité, cette applique assure la sécurité des enfants tout en offrant une durabilité à long terme. Les matériaux sont choisis pour leur résistance et leur facilité d&#039;entretien.\r\nil ajoute une touche décorative charmante à la chambre des enfants, apportant une note de fantaisie et de gaieté à l&#039;espace. Son design rose tendre crée un point focal visuel qui égaie la pièce.\r\n', 56, 29, 'chambre enfant'),
(17, 'chambread3.webp', 'Lindby Kaylou applique LED, USB, tablette', 'L\'applique LED Lindby Kaylou est un luminaire multifonctionnel et moderne, doté de caractéristiques innovantes telles qu\'une prise USB intégrée et une tablette. Cette application combine éclairage et fonctionnalité pour répondre à divers besoins dans un espace de vie ou de travail.\r\nLa principale caractéristique de l\'applique est son éclairage LED intégré, qui offre un éclairage efficace et écoénergétique. Les LED fournissent une lumière vive et agréable, idéale pour éclairer une zone spécifique comme une tête de lit, un bureau ou un coin lecture.\r\n', 49, 74, 'chambre adulte'),
(18, 'chambread4.webp', 'Lucande Evaine lampe table chromée abat-jour blanc', 'La lampe de table Lucande Evaine est un luminaire élégant et contemporain, caractérisé par son design chromé et son abat-jour blanc. Cette lampe incarne un équilibre entre modernité et fonctionnalité, ajoutant une touche de style raffiné à tout espace.\r\nLa base de la lampe est fabriquée en chrome, lui conférant une finition brillante et durable. Cette base offre stabilité et soutien à la lampe, assurant sa robustesse sur une table ou une surface plane.\r\nL\'abat-jour blanc diffuse une lumière douce et agréable, créant une atmosphère chaleureuse et accueillante dans la pièce. Le contraste entre la base chromée et l\'abat-jour blanc apporte une esthétique moderne et sophistiquée à la lampe, lui permettant de s\'intégrer harmonieusement dans différents styles .\r\n', 89, 44, 'chambre adulte'),
(19, 'chambread5.webp', 'Applique Aiden avec liseuse LED, laiton ancien', 'L\'applique Aiden est un luminaire sophistiqué et pratique, caractérisé par son design en laiton ancien et sa liseuse LED intégrée. Cette applique combine élégance et fonctionnalité pour offrir un éclairage polyvalent dans n\'importe quel espace.\r\nLa principale caractéristique de l\'applique est sa liseuse LED, qui permet une lecture confortable et pratique sans déranger l\'éclairage ambiant. Cette liseuse est souvent réglable en intensité, ce qui permet à l\'utilisateur d\'ajuster la luminosité selon ses besoins spécifiques.\r\nLe design en laiton ancien de l\'applique ajoute une touche de charme et de caractère rétro à l\'espace où elle est installée. Le laiton ancien offre également une durabilité et une résistance accrues, assurant que la lampe conserve son aspect esthétique au fil du temps.\r\n', 54, 63, 'chambre adulte'),
(20, 'chambread6.webp', 'Applique textile Jettka à bras liseuse', 'L\'applique textile Jettka à bras liseuse est un luminaire élégant et fonctionnel conçu pour offrir un éclairage optimal dans les espaces de vie ou de travail. Son design se compose généralement d\'un abat-jour en tissu et d\'un bras articulé intégrant une liseuse.\r\n\r\nL\'applique est souvent équipée d\'un abat-jour en textile, offrant une diffusion douce et agréable de la lumière. Le textile peut être disponible dans une variété de couleurs et de textures, permettant ainsi de s\'adapter à différents styles d\'intérieur.\r\n\r\nLe luminaire est doté d\'un bras articulé qui permet de régler la position de la liseuse selon les besoins de l\'utilisateur. La liseuse est une petite lampe intégrée qui offre un éclairage concentré, idéal pour la lecture ou le travail\r\n', 79, 22, 'chambre adulte'),
(22, 'chambrenf5.webp', 'Joli plafonnier pour chambre d’enfants Hibou, rose', 'Le plafonnier hibou en rose est une charmante pièce conçue spécialement pour les chambres d\'enfants, ajoutant une touche de douceur et de fantaisie à l\'espace\r\nLe plafonnier présente un design ludique mettant en vedette un hibou, un symbole souvent associé à la sagesse et à la magie. Sa forme adorable et ses détails mignons raviront les enfants et stimuleront leur imagination.\r\nLe plafonnier est proposé dans une teinte rose douce, qui évoque une atmosphère chaleureuse et réconfortante dans la chambre. Cette couleur délicate crée une ambiance féminine et accueillante, parfaite pour un espace dédié aux enfants.\r\nCe plafonnier est généralement facile à installer et peut être fixé au plafond de la chambre en quelques étapes simples. Les instructions de montage sont incluses pour faciliter le processus.\r\n', 58, 13, 'chambre enfant'),
(23, 'chambrenf6.webp', 'Applique murale Plane III à trois lampes', 'L\'applique murale Plane III est un luminaire moderne et élégant doté de trois lampes, offrant un éclairage efficace et esthétique.\r\n\r\nCette applique est équipée de trois lampes intégrées, fournissant un éclairage suffisamment lumineux pour éclairer une pièce de manière uniforme. Les lampes peuvent être orientées individuellement pour diriger la lumière selon les besoins spécifiques de l\'utilisateur.\r\n\r\nFabriquée avec des matériaux durables et de haute qualité, cette applique offre une construction solide et une longue durée de vie. Les finitions soignées ajoutent une touche d\'élégance à son design global.\r\n: L\'installation de cette applique murale est généralement simple et ne nécessite que quelques étapes. Les instructions de montage sont incluses pour faciliter le processus.\r\n', 126, 15, 'chambre enfant'),
(24, 'sallebain4.webp', 'Applique LED allongée pour salle de bain Julie', 'L\'applique LED allongée Julie pour salle de bain est une solution lumineuse élégante et fonctionnelle conçue spécifiquement pour répondre aux besoins d\'éclairage dans les environnements humides. Avec son design épuré et sa technologie d\'éclairage LED avancée, cette applique offre une combinaison parfaite de style et de performance.\r\n\r\n', 74, 28, 'salle de bain'),
(25, 'sallebain5.webp', 'Applique Space, nickel, deux lampes', '\"Applique Space\" est une applique murale moderne conçue en nickel. Elle est équipée de deux lampes, offrant un éclairage élégant et fonctionnel. Son design contemporain en nickel lui confère une esthétique chic et sophistiquée, Cette applique murale peut ajouter une touche de style et d\'illumination à  la pièce, tout en apportant une ambiance lumineuse agréable et accueillante.', 47, 22, 'salle de bain'),
(26, 'sallebain6.webp\r\n', 'Applique pour miroir LED Tizian exclusive', 'Son design exclusif, baptisé Tizian, allie fonctionnalité et esthétique. Fabriquée avec des matériaux de haute qualité, cette applique ajoute une touche de luxe à n\'importe quelle salle de bain ou espace de beauté. Son installation facile et sa construction durable en font un choix pratique et élégant pour toute personne cherchant à améliorer l\'éclairage de son miroir.\r\n', 79, 30, 'salle de bain'),
(27, 'imgsalon5.webp\r\n', 'Lindby Evengeline plafonnier LED', 'Fabriqué avec des matériaux de haute qualité, le plafonnier Lindby Evengeline allie durabilité et esthétique. Sa structure discrète et sa finition soignée en font une pièce intemporelle qui s\'intègre parfaitement à une variété de décors intérieurs, qu\'ils soient modernes, classiques ou contemporains.\r\n\r\n\r\n\r\n', 85, 91, 'salon'),
(28, 'imgsalon6.webp', 'Lindby Moskau suspension abat-jour multicolores', 'La suspension Lindby Moskau est une pièce luminaire vibrante et pleine de caractère qui apporte une touche d\'éclat à n\'importe quelle pièce. Avec son abat-jour multicolore, cette suspension est une véritable œuvre d\'art lumineuse qui ajoute une dose de couleur et de vitalité à votre espace de vie ', 109, 62, 'salon'),
(29, 'imgsalon7.webp\r\n', 'Plafonnier Yos décoratif, aspect feuilles', 'Le plafonnier Yos décoratif, avec son aspect feuilles, est une œuvre d\'art lumineuse qui évoque la beauté de la nature à l\'intérieur de votre maison. Inspiré par la délicatesse des feuilles, ce plafonnier offre une esthétique organique et raffinée qui ajoute une touche de fraîcheur et d\'élégance à n\'importe quel espace.\r\nLe luminaire Plafonnier Yos est conçu pour une installation facile. Avec des instructions claires et des composants bien organisés, vous pouvez rapidement et facilement ajouter cette pièce maîtresse à votre intérieur sans tracas inutiles.\r\n\r\n', 85, 23, 'salon'),
(30, 'imgcuisine4.webp', 'Arcchio Tadej suspension à 4 lampes, noire-blanche', 'La suspension Arcchio Tadej à 4 lampes présente un design moderne et élégant, avec des finitions noires et blanches contrastées.\r\nLa suspension Arcchio Tadej arbore un design épuré et minimaliste qui s\'intègre parfaitement à différents styles de décoration intérieure. Son esthétique moderne apporte une touche de sophistication à l\'espace.\r\nCette suspension est équipée de quatre lampes, chacune étant généralement réglable en hauteur. Cela permet de personnaliser l\'éclairage en fonction des besoins spécifiques de la pièce et de créer une ambiance confortable et accueillante.\r\nFabriquée avec des matériaux durables et de haute qualité, la suspension Arcchio Tadej assure une longue durée de vie et une utilisation fiable à long terme. Les finitions soignées ajoutent une touche de sophistication à son design global.La suspension Arcchio Tadej est généralement facile à installer au plafond.\r\n', 179, 66, 'cuisine'),
(31, 'imgcuisine5.webp\r\n', 'Arcchio Albiona suspension LED, noire, 2 anneaux', 'La suspension LED Arcchio Albiona est un luminaire moderne et élégant, caractérisé par deux anneaux noirs\r\nLa suspension Arcchio Albiona présente un design minimaliste et contemporain qui s\'intègre parfaitement à différents styles de décoration intérieure. Son esthétique épurée apporte une touche de modernité à l\'espace.\r\nCette suspension est équipée de deux anneaux lumineux LED, disposés de manière élégante et géométrique. Les anneaux créent un éclairage uniforme et agréable qui illumine la pièce de manière efficace et esthétique.\r\nLa finition noire de la suspension ajoute une touche de sophistication et de sobriété à l\'espace. Cette couleur polyvalente s\'harmonise facilement avec différents styles de décoration et apporte une note de contraste subti\r\n', 250, 50, 'cuisine'),
(32, 'imgsalon8.webp', 'Lindby Aovan lampadaire à tablette', 'Le lampadaire Lindby Aovan avec tablette est une fusion élégante de fonctionnalité et de style contemporain. Doté d\'un design épuré et moderne, ce lampadaire offre non seulement un éclairage ambiant doux et agréable, mais également un espace pratique pour placer des livres, des lunettes ou d\'autres objets essentiels à portée de main.\r\n\r\n\r\n', 189, 88, 'salon'),
(33, 'imgsalon9.webp', 'Lindby Lennart lampadaire arqué, laiton mat', 'Grâce à son bras réglable, ce lampadaire offre une flexibilité maximale pour diriger la lumière exactement où vous en avez besoin. Que ce soit pour éclairer votre espace de lecture préféré ou pour ajouter une touche de lumière ambiante dans votre salon, le lampadaire arqué Lindby Lennart répond à tous vos besoins d\'éclairage.\r\n\r\n\r\n\r\n', 189, 45, 'salon'),
(34, 'imgext5.webp', 'Plafonnier d\'extérieur LED Lahja, IP65, blanc', 'Le plafonnier d\'extérieur LED Lahja est un luminaire robuste et moderne conçu pour éclairer efficacement les espaces extérieurs tout en offrant une esthétique épurée. \r\nFabriqué avec des matériaux de haute qualité et résistants aux intempéries, ce plafonnier est conçu pour résister à l\'humidité, à la pluie, au vent et aux rayons UV. Son indice de protection IP65 garantit une protection fiable contre les infiltrations d\'eau et la poussière, assurant ainsi une longue durée de vie en extérieur.\r\nDoté de LED intégrées, le plafonnier Lahja offre un éclairage puissant et économe en énergie pour éclairer efficacement les espaces extérieurs. Les LED produisent une lumière blanche et uniforme qui améliore la visibilité et la sécurité, tout en créant une ambiance accueillante.\r\nCe plafonnier est équipé d\'un diffuseur opale qui répartit la lumière de manière uniforme et douce, éliminant les éblouissements et les ombres indésirables. \r\n', 69, 11, 'exterieur'),
(35, 'imgext6.webp', 'Lucande Aegisa applique d\'extérieur LED, angulaire', 'L\'applique d\'extérieur LED Lucande Aegisa est un luminaire moderne et fonctionnel conçu pour éclairer les espaces extérieurs avec style et efficacité.\r\nL\'applique Aegisa présente un design contemporain avec des lignes angulaires qui lui confèrent une esthétique moderne et élégante. Son allure épurée et sophistiquée en fait un ajout attrayant à tout espace extérieur.\r\nFabriquée avec des matériaux de haute qualité et résistants aux intempéries, cette applique est conçue pour résister aux conditions extérieures difficiles telles que la pluie, le vent et la poussière. Elle conserve son apparence et sa durabilité même après une exposition prolongée aux éléments.\r\nCette applique est généralement simple à installer sur un mur extérieur à l\'aide du matériel de montage inclus et des instructions détaillées fournies. Elle peut être montée horizontalement ou verticalement selon les préférences de l\'utilisateur.\r\n', 69, 52, 'exterieur'),
(36, 'chambread7.webp', 'Lindby Vetki plafonnier avec décor, noir', 'Le plafonnier Lindby Vetki est un luminaire élégant conçu pour être installé au plafond. Il est caractérisé par son design contemporain et son décor noir, ajoutant une touche de sophistication à n\'importe quelle pièce. \r\n\r\nLe plafonnier Vetki arbore un design moderne et épuré, avec des lignes simples et des contours élégants qui s\'adaptent facilement à différents styles d\'intérieur.\r\nLa finition noire confère au luminaire un aspect sobre et raffiné, lui permettant de se fondre harmonieusement dans divers décors tout en ajoutant une touche de contraste visuel.\r\nLe plafonnier peut être agrémenté d\'un décor spécifique, ajoutant une dimension esthétique supplémentaire à son design. Ce décor peut prendre différentes formes et styles, apportant ainsi une touche de personnalité à l\'éclairage.\r\n', 59, 9, 'chambre adulte'),
(37, 'chambread8.webp', 'Lindby Ellamina plafonnier LED, blanc', 'Le plafonnier Lindby Ellamina LED est un luminaire moderne et élégant conçu pour être installé au plafond\r\nLe plafonnier Ellamina mesure environ 40 cm de diamètre, offrant une taille convenable pour éclairer efficacement des espaces de taille moyenne à grande.\r\nCe plafonnier est équipé de la technologie LED intégrée, ce qui signifie qu\'il intègre des sources lumineuses LED directement dans sa structure. Les LED offrent un éclairage puissant, lumineux et écoénergétique, tout en ayant une durée de vie prolongée.\r\ne plafonnier Ellamina présente un design épuré et contemporain, avec une finition blanche qui apporte luminosité et fraîcheur à la pièce. Sa couleur neutre lui permet de s\'intégrer harmonieusement dans divers styles d\'intérieur.\r\n', 44, 22, 'chambre adulte'),
(38, 'chambrenf6.webp', 'Applique murale Plane III à trois lampes', 'L\'applique murale Plane III est un luminaire moderne et élégant doté de trois lampes, offrant un éclairage efficace et esthétique.\r\n\r\nCette applique est équipée de trois lampes intégrées, fournissant un éclairage suffisamment lumineux pour éclairer une pièce de manière uniforme. Les lampes peuvent être orientées individuellement pour diriger la lumière selon les besoins spécifiques de l\'utilisateur.\r\n\r\nFabriquée avec des matériaux durables et de haute qualité, cette applique offre une construction solide et une longue durée de vie. Les finitions soignées ajoutent une touche d\'élégance à son design global.\r\n: L\'installation de cette applique murale est généralement simple et ne nécessite que quelques étapes. Les instructions de montage sont incluses pour faciliter le processus.\r\n', 126, 22, 'chambre enfant'),
(39, 'chambrenf7.webp', 'Suspension Bateau de pirate pour chambre d’enfant', 'La suspension Bateau de pirate est une pièce décorative et ludique spécialement conçue pour les chambres d\'enfants, ajoutant une touche d\'aventure et d\'imagination à l\'espace. \r\n\r\nLa suspension est conçue sous la forme d\'un bateau de pirate, inspiré des contes et des aventures en haute mer. Son design détaillé et réaliste évoque l\'univers fascinant des pirates, stimulant l\'imagination des enfants.\r\nFabriquée avec des matériaux de haute qualité, cette suspension assure la sécurité des enfants tout en offrant une durabilité à long terme. Les matériaux sont choisis pour leur résistance et leur facilité d\'entretien.\r\nLa suspension offre un éclairage fonctionnel et doux, idéal pour créer une atmosphère confortable et accueillante dans la chambre des enfants. Sa lumière diffuse crée une ambiance propice au sommeil et à la détente.\r\n\r\n', 107, 7, 'chambre enfant'),
(40, 'sallebain7.webp', 'Fine applique LED Julie', 'La fine applique LED Julie est une solution d\'éclairage moderne et élégante, conçue pour apporter à votre espace une lumière subtile et efficace. Avec son design épuré et minimaliste, cette applique s\'intègre harmonieusement à différents styles de décoration intérieure.\r\n\r\n', 59, 22, 'salle de bain'),
(41, 'sallebain8.webp', 'Paulmann Tega plafonnier LED', 'La technologie LED, ce luminaire offre une luminosité éclatante tout en étant économe en énergie, ce qui permet de réduire les coûts énergétiques. Sa construction robuste garantit une durabilité à long terme, nécessitant peu d\'entretien.\r\n', 23, 11, 'salle de bain'),
(42, 'imgext7.webp', 'Lindby Mathea plafonnier d’extérieur LED, cylindre', 'Le plafonnier d\'extérieur LED Lindby Mathea est un luminaire cylindrique moderne conçu pour offrir un éclairage efficace et élégant dans les espaces extérieurs\r\nLe plafonnier Mathea arbore un design cylindrique moderne et épuré qui s\'intègre harmonieusement à divers styles architecturaux extérieurs. Son esthétique minimaliste en fait un choix polyvalent pour éclairer les porches, les terrasses, les balcons ou les entrées extérieures.\r\nFabriqué avec des matériaux de haute qualité et résistants aux intempéries, ce plafonnier est conçu pour résister aux éléments extérieurs tels que la pluie, le vent et la poussière. Sa construction solide lui permet de conserver son apparence et sa performance même après une exposition prolongée à l\'extérieur.\r\n', 32, 42, 'exterieur'),
(43, 'imgext8.webp', 'Lucande Ditta applique extérieur LED avec enceinte', 'L\'applique extérieure LED Lucande Ditta avec enceinte est un luminaire polyvalent et innovant conçu pour éclairer les espaces extérieurs tout en offrant des fonctionnalités supplémentaires.\r\n\r\nL\'applique Ditta présente un design moderne et élégant qui s\'intègre harmonieusement à divers styles architecturaux extérieurs. Son esthétique discrète en fait un ajout attrayant à tout espace extérieur, qu\'il s\'agisse de jardins, de terrasses ou de patios.\r\n\r\nFabriqué avec des matériaux de haute qualité et résistants aux intempéries, ce luminaire est conçu pour résister aux conditions extérieures difficiles telles que la pluie, le vent et la poussière. Il conserve son apparence et sa performance même après une exposition prolongée à l\'extérieur.\r\n', 109, 28, 'exterieur'),
(48, 'imgsalon11.webp', 'Lindby Emilienne lampadaire arqué', 'Le lampadaire arqué Lindby Emilienne, avec sa combinaison de noir et de doré, incarne l&#039;élégance et le raffinement dans un design contemporain. Son allure audacieuse et ses lignes épurées en font une pièce remarquable pour éclairer tout espace de vie avec style.\r\n\r\n', 200, 23, 'salon'),
(49, 'imgsalon12.webp', 'Lindby Fibi suspension, bois, brun', 'L\'aspect rustique de cette suspension en fait un choix parfait pour une variété de décors, qu\'ils soient traditionnels, modernes ou éclectiques. Son design intemporel s\'intègre harmonieusement dans les salons, les cuisines ou les salles à manger, ajoutant une touche de chaleur et de convivialité à l\'espace.\r\n', 250, 21, 'salon'),
(50, 'imgcuisine6.webp', 'Lindby Mitis spot en bois et béton', 'Le spot Lindby Mitis est un luminaire au design contemporain combinant le bois et le béton pour un aspect élégant et industriel\r\nLe spot Lindby Mitis présente un design minimaliste et contemporain, idéal pour les intérieurs à la fois modernes et industriels. Son esthétique épurée s\'intègre parfaitement à différents styles de décoration.\r\nCe spot est composé de bois et de béton, créant un contraste visuel saisissant entre la chaleur naturelle du bois et la robustesse du béton. Cette combinaison de matériaux ajoute une touche d\'originalité à la pièce.\r\n: Le spot est équipé d\'une ou plusieurs sources lumineuses, généralement LED, orientables pour permettre un éclairage directionnel précis. Cela permet de mettre en valeur des éléments spécifiques de la pièce ou de créer des ambiances lumineuses variées.\r\n', 24, 12, 'cuisine'),
(51, 'imgcuisine7.webp', 'Spot métallique blanc Fridolin avec interrupteur', 'Le spot métallique blanc Fridolin avec interrupteur est un luminaire pratique et fonctionnel, idéal pour éclairer des zones spécifiques dans une pièce\r\nFabriqué en métal, ce spot est robuste et résistant, assurant une utilisation fiable à long terme. La finition blanche apporte une touche de luminosité et de fraîcheur à l\'espace.\r\nLe spot est généralement orientable, permettant de diriger la lumière vers des zones spécifiques selon les besoins. Cela permet de mettre en valeur des éléments décoratifs ou d\'éclairer des espaces de travail avec précision.\r\nL\'interrupteur intégré facilite l\'allumage et l\'extinction du spot, offrant une commodité supplémentaire pour l\'utilisateur. Cela permet un contrôle facile de l\'éclairage sans avoir besoin d\'un interrupteur mural séparé.\r\n', 19, 9, 'cuisine'),
(52, 'chambread9.webp', 'Plafonnier Boho, rotin, tissu, noir', 'Le plafonnier Boho est un luminaire au design artisanal et naturel, caractérisé par l\'utilisation de matériaux tels que le rotin, le tissu et le métal noir\r\nCe plafonnier est principalement fabriqué à partir de rotin, un matériau naturel et durable qui apporte une touche organique et chaleureuse à l\'espace où il est installé. Le rotin est tissé avec habileté pour créer une structure unique et élégante.\r\n L\'abat-jour est souvent confectionné à partir de tissu, offrant une diffusion douce et agréable de la lumière. Le tissu peut être de couleur noire, en harmonie avec le métal noir, ou présenter des motifs et des textures bohèmes pour accentuer le style artisanal.\r\n', 109, 93, 'chambre adulte'),
(53, 'chambread10.webp', 'Lindby Mariyana plafonnier ', 'Le plafonnier Lindby Mariyana LED est un luminaire moderne et élégantCe plafonnier est équipé de la technologie LED intégrée, ce qui signifie qu&#039;il intègre des sources lumineuses LED directement dans sa structure. Les LED offrent un éclairage puissant, lumineux et écoénergétique, tout en ayant une durée de vie prolongée. il présente un design moderne et épuré, avec une finition anthracite qui lui confère une allure sophistiquée et tendance. Sa couleur anthracite apporte une touche de modernité et de contraste à tout espace.\r\nL&#039;abat-jour du plafonnier est conçu pour assurer une diffusion uniforme de la lumière dans la pièce, créant ainsi une ambiance lumineuse agréable et confortable.\r\nFabriqué avec des matériaux de haute qualité, ce plafonnier offre une durabilité et une résistance accrues, assurant ainsi sa longévité et son bon fonctionnement au fil du temps.\r\n', 119, 25, 'chambre adulte'),
(54, 'chambread11.webp', 'ELC Manasa plafonnier ', 'Le plafonnier ELC Manasa présente un design contemporain et polyvalent, offrant une combinaison harmonieuse de couleurs gris-brun, blanc et gris\r\n\r\nCe plafonnier combine différentes teintes de gris-brun, de blanc et de gris, créant un contraste subtil et une esthétique visuellement intéressante. Cette palette de couleurs polyvalente lui permet de s&#039;adapter à différents styles d&#039;intérieur.\r\nFabriqué avec des matériaux durables et de haute qualité, ce plafonnier offre une construction solide et une longue durée de vie, assurant ainsi une utilisation fiable à long terme.\r\n&#039;abat-jour du plafonnier est conçu pour assurer une distribution uniforme de la lumière dans la pièce, créant ainsi une atmosphère lumineuse et accueillante.\r\n', 109, 8, 'chambre adulte'),
(55, 'chambread12.webp', 'Lindby Lettie plafonnier en textile à 4 lampes', 'Le plafonnier Lindby Lettie est un luminaire élégant et polyvalent, équipé de quatre lampes et d\'un abat-jour en textile\r\nLes quatre lampes du plafonnier sont généralement équipées d\'abat-jours en textile, offrant une diffusion douce et agréable de la lumière. Le textile peut être disponible dans différentes couleurs et textures, permettant ainsi de personnaliser l\'esthétique du luminaire.\r\nFabriqué avec des matériaux durables et de haute qualité, ce plafonnier offre une construction solide et une longue durée de vie, assurant ainsi une utilisation fiable à long terme.\r\nplafonnier Lettie est généralement facile à installer et est livré avec toutes les pièces nécessaires pour le montage au plafond.\r\n\r\n', 109, 8, 'chambre adulte'),
(56, 'chambrenf8.webp', 'Suspension pour chambre d’enfant Prince, rotatif', 'La suspension \"Prince\" pour chambre d\'enfant est une pièce décorative charmante et fonctionnelle, conçue pour créer une ambiance magique dans l\'espace des petits.\r\nLa suspension \"Prince\" est inspirée des contes de fées et des histoires de princes, avec des éléments décoratifs tels que des couronnes, des étoiles ou des motifs royaux. Son design captivant évoque un univers enchanté, stimulant l\'imagination des enfants.\r\nFabriquée avec des matériaux de haute qualité, cette suspension assure la sécurité des enfants tout en offrant une durabilité à long terme. Les matériaux sont choisis pour leur résistance et leur facilité d\'entretien.\r\nCette suspension est généralement facile à installer et peut être suspendue au plafond de la chambre en quelques étapes simples. \r\n', 64, 29, 'chambre enfant'),
(57, 'chambrenf9.webp', 'Plafonnier Wire Kids 5 lampes, blanc/rose/violet', 'Le plafonnier Wire Kids est une magnifique pièce conçue spécialement pour les chambres d\'enfants, offrant une touche de charme et de couleur à l\'espace.\r\nLe plafonnier Wire Kids présente un design ludique et fantaisiste, avec une structure filaire qui crée une apparence légère et aérienne. Sa forme délicate et ses couleurs vives ajoutent une touche de gaieté à la chambre des enfants.\r\nCette suspension est équipée de cinq lampes intégrées, offrant un éclairage lumineux et uniforme dans la pièce. Les lampes peuvent être disposées de manière artistique pour créer un effet visuel saisissant.\r\nFabriqué avec des matériaux de haute qualité, ce plafonnier assure la sécurité des enfants tout en offrant une durabilité à long terme. Les matériaux sont choisis pour leur résistance et leur facilité d\'entretien.\r\n', 145, 48, 'chambre enfant'),
(58, 'sallebain9.webp', 'Spot mural pour salle de bain Zela ', 'Fabriqué avec des matériaux résistants à l\'humidité et à la corrosion, le spot Zela est spécialement adapté à une utilisation dans les salles de bains. Sa construction robuste garantit une durabilité à long terme, même dans un environnement humide.\r\n', 24, 14, 'salle de bain'),
(59, 'sallebain10.webp', 'Lindby Medon plafonnier LED', 'la construction robuste assure une durabilité à long terme, tandis que son installation facile en fait une option pratique pour une mise à niveau de l\'éclairage dans divers espaces tels que les salons, les chambres, les cuisines ou les bureaux.\r\n\r\n', 17, 28, 'salle de bain'),
(60, 'imgext9.webp', 'Applique d\'extérieur LED Ettan en inox', 'L\'applique d\'extérieur LED Ettan en inox est un luminaire élégant et fonctionnel conçu pour éclairer les espaces extérieurs avec style et efficacité\r\nFabriquée en acier inoxydable de haute qualité, cette applique est résistante à la corrosion et aux intempéries, assurant sa durabilité et sa longévité même en cas d\'exposition aux éléments extérieurs.\r\nL\'applique Ettan présente un design moderne et épuré qui s\'intègre harmonieusement à différents styles architecturaux extérieurs. Son esthétique minimaliste en fait un choix polyvalent pour éclairer les entrées, les allées, les terrasses ou les jardins.\r\nCette applique est généralement simple à installer sur un mur extérieur à l\'aide du matériel de montage inclus et des instructions détaillées fournies. \r\n', 44, 45, 'exterieur'),
(61, 'imgext10.webp', 'Lucande Kartivan applique d’extérieur LED', 'L\'applique d\'extérieur LED Lucande Kartivan est un luminaire élégant et fonctionnel conçu pour éclairer les espaces extérieurs avec style et efficacité\r\nL\'applique Kartivan présente un design moderne et épuré qui s\'intègre harmonieusement à divers styles architecturaux extérieurs. Son esthétique minimaliste en fait un choix polyvalent pour éclairer les entrées, les allées, les terrasses ou les jardins.\r\n\r\nFabriqué avec des matériaux de haute qualité et résistants aux intempéries, ce luminaire est conçu pour résister aux conditions extérieures difficiles telles que la pluie, le vent et la poussière. Il conserve son apparence et sa performance même après une exposition prolongée à l\'extérieur.\r\n', 49, 39, 'exterieur'),
(62, 'imgcuisine8.webp', 'Applique en plâtre Pocillo à peindre', 'L\'applique en plâtre Pocillo à peindre est un luminaire polyvalent conçu pour offrir à la fois fonctionnalité et personnalisation dans votre espace.\r\nFabriquée à partir de plâtre de haute qualité, cette applique offre une surface lisse et uniforme, prête à être peinte selon vos préférences. Le plâtre est un matériau robuste et durable qui permet une manipulation créative sans compromettre la qualité.\r\nL\'applique Pocillo est généralement conçue pour produire un éclairage doux et indirect qui crée une ambiance chaleureuse et accueillante dans la pièce. Elle est souvent utilisée pour éclairer des zones spécifiques ou pour ajouter une touche de lumière d\'appoint.\r\nCette applique est généralement facile à installer sur un mur à l\'aide du matériel de montage inclus. Les instructions de montage sont fournies pour vous guider tout au long du processus.\r\n', 34, 23, 'cuisine'),
(63, 'imgcuisine9.webp', 'Lindby Pimana applique avec abat-jour ', 'L&#039;applique Lindby Pimana avec abat-jour en céramique est un luminaire élégant et sophistiqué qui ajoute une touche de charme à tout espace.\r\nL&#039;abat-jour est fabriqué en céramique de haute qualité, offrant une finition lisse et durable. La céramique ajoute une dimension tactile et esthétique à la pièce, avec des détails souvent travaillés pour une touche d&#039;élégance supplémentaire.\r\nL&#039;applique Lindby Pimana arbore un design raffiné et contemporain, avec des lignes épurées qui s&#039;adaptent facilement à différents styles de décoration intérieure. Son esthétique intemporelle en fait un choix polyvalent pour une variété d&#039;espaces.\r\nL&#039;applique Lindby Pimana est généralement facile à installer sur le mur à l&#039;aide du matériel de montage inclus. Les instructions de montage sont fournies pour faciliter le processus.\r\n', 34, 22, 'cuisine'),
(64, 'chambrenf10.webp', 'Plafonnier Corazon rose avec cœurs', 'Le plafonnier Corazon rose est une pièce adorable conçue spécialement pour les chambres d\'enfants, ajoutant une touche de charme et de fantaisie à l\'espace.\r\nLe plafonnier Corazon arbore un design romantique et fantaisiste, avec des motifs de cœurs délicats qui évoquent une ambiance douce et chaleureuse dans la chambre des enfants. Son design captivant éveille l\'imagination et crée un environnement propice au jeu et à la créativité.\r\nLe plafonnier est proposé dans une teinte rose tendre, qui apporte une touche de féminité et de délicatesse à la décoration de la chambre. Cette couleur délicate crée une atmosphère chaleureuse et réconfortante, parfaite pour un espace dédié aux enfants. Le plafonnier Corazon offre un éclairage doux et tamisé, idéal pour créer une atmosphère confortable et apaisante dans la chambre des enfants. Sa lumière diffuse crée une ambiance propice au sommeil et à la détente.\r\n', 107, 6, 'chambre enfant'),
(65, 'chambrenf11.webp', 'Plafonnier Rondo Kids, bleu', 'Le plafonnier Rondo Kids est une luminaire spécialement conçu pour les chambres d\'enfants, offrant à la fois fonctionnalité et style\r\nLe plafonnier Rondo Kids présente un design charmant et ludique qui plaira aux enfants. Avec ses formes arrondies et son style enfantin, il ajoute une touche de fantaisie à la chambre.\r\nCe plafonnier est proposé dans une teinte bleue vive, qui apporte une sensation de fraîcheur et de vivacité à l\'espace. Cette couleur stimulante peut également contribuer à créer une ambiance dynamique dans la chambre.\r\nAvec un diamètre de 38 cm, ce plafonnier offre une taille suffisante pour éclairer efficacement la pièce tout en constituant un élément décoratif attrayant.\r\nÉquipé de sources lumineuses efficaces, ce plafonnier offre un éclairage adéquat pour les activités quotidiennes des enfants, telles que jouer, lire ou faire leurs devoirs.\r\n', 107, 25, 'chambre enfant'),
(66, 'sallebain11.webp', 'Applique murale Lindby Tavino, 3 lampe', 'L&#039;applique murale Lindby Tavino est un luminaire moderne et élégant conçu pour être fixé au mur. Elle est fabriquée par Lindby, une marque réputée dans le domaine de l&#039;éclairage. Habituellement fabriquée à partir de matériaux durables tels que le métal, le verre ou le plastique de haute qualité, cette applique murale est conçue pour durer .La gamme Lindby Tavino peut proposer différents styles et finitions pour s&#039;adapter à diverses préférences en matière de décoration intérieure.\r\n\r\n', 99, 23, 'salle de bain'),
(67, 'sallebain12.webp', ' lampes Applique pour salle de bain Dejan chromée', 'L\'applique Dejan chromée est une solution d\'éclairage élégante spécialement conçue pour les salles de bains.\r\nFabriquée à partir de matériaux de qualité supérieure résistants à l\'humidité, tels que le métal chromé, le verre trempé ou le plastique étanche, cette applique est spécialement conçue pour résister à l\'humidité présente dans les salles de bains.\r\nelle est équipée de deux lampes , cette applique offre un éclairage suffisamment lumineux pour illuminer la salle de bain de manière adéquate. Les lampes peuvent être équipées d\'ampoules LED pour une efficacité énergétique accrue et une lumière vive et naturelle.', 64, 54, 'salle de bain'),
(68, 'imgext11.webp', 'Lucande Florka applique d\'extérieur LED', 'La Lucande Florka est une applique d\'extérieur à LED. Cette applique est conçue pour être installée à l\'extérieur, offrant ainsi un éclairage efficace et esthétique pour les espaces extérieurs tels que les jardins, les terrasses ou les façades de bâtiments.\r\nElle utilise des diodes électroluminescentes (LED) comme source lumineuse, offrant une luminosité élevée tout en étant économe en énergie.\r\nLa Lucande Florka est souvent caractérisée par un design moderne et élégant, adapté à différents styles d\'aménagement extérieur.\r\nÉtant destinée à une utilisation en extérieur, elle est souvent fabriquée avec des matériaux résistants aux intempéries, tels que l\'aluminium ou l\'acier inoxydable, pour assurer une durabilité accrue.\r\n', 119, 30, 'exterieur'),
(69, 'imgext12.webp', 'Lucande Keany Applique d&#039;extérieur LED', 'La Lucande Keany est une applique d&#039;extérieur à LED en forme de couronne, conçue pour apporter à la fois un éclairage fonctionnel et un élément décoratif à votre espace extérieur\r\nLa caractéristique distinctive de la Lucande Keany est son design en forme de couronne, qui lui confère une esthétique unique et attrayante.\r\nComme la plupart des luminaires modernes, la Lucande Keany est équipée de LED intégrées qui offrent un éclairage lumineux et économe en énergie. Les LED ont également une durée de vie plus longue par rapport aux sources lumineuses traditionnelles.\r\nFabriquée à partir de matériaux de haute qualité et durables, tels que l&#039;aluminium ou l&#039;acier inoxydable, cette applique est conçue pour résister aux intempéries et pour une utilisation à long terme à l&#039;extérieur.\r\n', 89, 69, 'exterieur'),
(70, 'imgsalon13.webp', 'Plafonnier LED Bully ', 'Le plafonnier LED Bully à l&#039;aspect patiné combine l&#039;esthétique vintage avec la technologie moderne pour créer une pièce lumineuse et pleine de caractère. Son design rétro, avec une finition patinée qui évoque le charme du passé, apporte une touche d&#039;authenticité et de style à tout espace de vie.\r\n\r\n', 71, 51, 'salon'),
(71, 'imgsalon14.webp', 'Lindby Welina suspension LED', 'Fabriquée avec soin, cette suspension présente une structure métallique élégante et discrète qui assure à la fois solidité et légèreté visuelle. Son abat-jour en forme de disque, équipé de LED intégrées, diffuse une lumière douce et uniforme dans la pièce, créant une atmosphère accueillante et agréable.\r\n', 149, 49, 'salon'),
(72, 'imgcuisine10.webp', 'Lucande Stakato suspension ', 'La suspension LED Lucande Stakato avec 6 lampes et une longueur de 140 cm est un luminaire moderne et élégant qui apporte une luminosité vive et une esthétique saisissante à tout espace.\r\n\r\nÉquipée de six lampes LED intégrées, cette suspension offre un éclairage lumineux et économe en énergie. Les LED produisent une lumière vive et uniforme qui éclaire efficacement la pièce tout en réduisant la consommation d&#039;énergie.\r\nLa suspension Stakato est souvent réglable en hauteur, ce qui permet de personnaliser son positionnement selon les besoins spécifiques de la pièce et les préférences de décoration.\r\nFabriquée avec des matériaux de haute qualité, cette suspension assure une durabilité à long terme et une utilisation fiable. Les finitions soignées ajoutent une touche de sophistication à son design global.\r\n', 149, 36, 'cuisine');
INSERT INTO `produits` (`id_produit`, `image`, `titre`, `description`, `prix`, `stock`, `categorie`) VALUES
(73, 'imgcuisine11.webp', 'Suspension LED Marija', 'La suspension LED Marija est un luminaire moderne et élégant, caractérisé par un cache vertical de couleur noire\r\nLe cache vertical, souvent en métal noir, ajoute une touche de sophistication et de contraste à la suspension. Cette couleur intense crée un effet visuel saisissant qui attire l&#039;attention dans la pièce.\r\nCette suspension est équipée d&#039;un éclairage LED intégré, offrant un éclairage lumineux et économe en énergie. Les LED produisent une lumière blanche et uniforme qui éclaire efficacement la pièce.\r\nLa suspension LED Marija est idéale pour éclairer des zones spécifiques dans la pièce, telles que la salle à manger, la cuisine ou le salon. Son design moderne en fait également un élément décoratif attrayant.\r\nCette suspension est généralement facile à installer au plafond à l&#039;aide du matériel de montage inclus. Les instructions de montage sont fournies pour simplifier le processus.\r\n', 199, 29, 'cuisine'),
(74, 'sallebain13.webp', 'Lindby Imiria ', 'Le plafonnier LED Lindby Imiria à trois lampes est un luminaire moderne et élégant conçu pour éclairer efficacement une pièce tout en ajoutant une touche de style contemporain à son décor. Avec ses trois lampes LED intégrées, il offre une luminosité puissante tout en étant économe en énergie. Son design épuré . Grâce à sa construction de qualité et à sa technologie LED durable, ce plafonnier est conçu pour durer longtemps tout en offrant un éclairage fiable et uniforme. Son installation est généralement simple, ce qui en fait un choix pratique pour les personnes à la recherche d&#039;un éclairage fonctionnel et esthétique.', 99, 59, 'salle de bain'),
(76, 'chambrenf12.webp', 'La susp Planets', 'La suspension Planets est une luminaire spécialement conçue pour les chambres d&#039;enfants, offrant à la fois fonctionnalité et esthétique\r\nLa suspension Planets présente un design captivant avec des motifs représentant les planètes du système solaire. Ce design éducatif stimule l&#039;imagination des enfants tout en leur permettant d&#039;apprendre sur l&#039;espace et les planètes.\r\nLes couleurs vives utilisées dans la suspension Planets ajoutent une touche de dynamisme et d&#039;énergie à la chambre d&#039;enfant. Les nuances lumineuses attirent l&#039;attention des enfants et créent une atmosphère joyeuse et stimulante.\r\nFabriquée avec des matériaux robustes et durables, cette suspension garantit une longue durée de vie et une utilisation sécurisée dans l&#039;environnement souvent mouvementé d&#039;une chambre d&#039;enfant\r\n', 68, 40, 'chambre enfant'),
(77, 'imgcuisine12.webp', 'Lindby Leontino ', 'Le plafonnier Lindby Leontino est un luminaire élégant et fonctionnel, conçu avec une forme ronde\r\n\r\nFabriqué avec des matériaux durables et de haute qualité, ce plafonnier assure une longue durée de vie et une utilisation fiable. Les finitions soignées ajoutent une touche de sophistication à son design global.\r\nLe plafonnier Leontino est souvent équipé de sources lumineuses LED intégrées, offrant un éclairage efficace et économe en énergie. Les LED produisent une lumière blanche et uniforme qui illumine la pièce de manière agréable et fonctionnelle.\r\nLe plafonnier Lindby Leontino est généralement facile à installer au plafond à l&#039;aide du matériel de montage inclus. Les instructions de montage sont fournies pour simplifier le processus\r\n', 69, 39, 'cuisine'),
(78, 'sallebain15.webp', 'Paulmann Luena ', 'L&#039;applique Paulmann Luena est un luminaire élégant et fonctionnel, idéal pour les espaces intérieurs et extérieurs où une protection contre l&#039;humidité est nécessaire. Avec son indice de protection IP44, cette applique est parfaitement adaptée aux salles de bains, aux balcons, aux porches et à d&#039;autres zones sujettes à l&#039;humidité.\r\nDotée d&#039;une finition chromée attrayante, elle ajoute une touche de sophistication à tout décor. Cette applique est équipée de deux douilles E14 qui vous permettent de choisir les ampoules de votre choix, ce qui vous donne la liberté de personnaliser l&#039;ambiance lumineuse selon vos préférences.', 104, 20, 'salle de bain');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `statut` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `telephone`, `adresse`, `ville`, `statut`) VALUES
(1, 'benidir', 'radia', 'amelaimanee@gmail.com', '$2y$10$D03D8BQ3EXNdJGgedH6o/.MuQs0QtqoNKnISzxGmIvQDOOz8hfkUK', '0781000554', '5 rue de l&#039;égalité ', 'paris', 1),
(2, 'beniddir', 'nesrine', 'nesrine@gmail.com', '$2y$10$BCc/2WJAx5yCYf2dXl1/HOSqqJwK0GZVWHdmXhJ57umCPMgKaqr7O', '0718000354', '5 rue de l\'égalité ', 'Nanterre', 0),
(3, 'beniddir', 'lina', 'lina@gmail.com', '$2y$10$cdU41JOff.R8xZeWUCNlCeHSV2byxmLY9Gmwg5zG55SPeese56pCm', '0782000453', '5 rue de l&#039;égalité ', 'nanterre', 0),
(4, 'benidir', 'samie', 'samir@gmail.com', '$2y$10$ugZOJ.6bIS.2/eJZZSVU1OPYIOJKxKQK2P0WXLIhjtq85VaEscIzy', '0718000354', '82, Rue du Palais', 'Nanterre', 0),
(5, 'perinel', 'justine', 'justine@gmail.com', '$2y$10$Ln9hZImP.m8JMi3aa9VaW.jBH9fQkYJgMWCHtoz8QRxUlgQGPXnq6', '0718000354', '82, Rue du Palais', 'suresnes', 0),
(6, 'gaspar', 'MELINDA', 'melinda@gmail.com', '$2y$10$bF/RLGPpRZo7JYu643VqE./pw0vASxIBitsX6O4ErcSzfm/G/ESLi', '0782000453', '82, Rue du Palais', 'Paris', 0),
(7, 'gater', 'yema', 'yema@gmail.com', '$2y$10$zccAUThAQbDcUwVBVrz0s.hQk/UhQlFONes/X3dWwF9dPbP4j.u3G', '0782000453', '82, Rue du Palais', 'algerie', 0),
(8, 'samia', 'benidir', 'samia@gmail.com', '$2y$10$11A5OO21l.oBscMu0p326OhDPoB0KnsYNPgo7xH0fS5ACOD2CIc9S', '0202220202', 'Aglagal Tizi ouzou', 'france', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `commande_details`
--
ALTER TABLE `commande_details`
  ADD PRIMARY KEY (`id_commande_details`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_utilisateur` (`id_utilisateur`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `commande_details`
--
ALTER TABLE `commande_details`
  MODIFY `id_commande_details` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commande_details`
--
ALTER TABLE `commande_details`
  ADD CONSTRAINT `commande_details_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id_commande`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commande_details_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
