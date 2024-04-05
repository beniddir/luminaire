/* js menu */
let bouton1 = document.querySelector('#bouton');
/* sélectionne  l'element qui a un id= "bouton" dans le document HTML et le stocke dans la variable bouton1 pour une utilisation ultérieure dans le code  */
let modale = document.querySelector('.modale');
bouton1.addEventListener('click', () => {
    /* C'est une méthode qui permet d'ajouter un écouteur d'événements à un élément HTML */
    modale.classList.toggle('modale-change');
    bouton1.classList.toggle('bi-x-lg');
})
/* fin js du menu  */

/*  js Boutique  */

/*  1js salon */

// Sélection de l'élément avec la classe '.salon' c'est la div salon 
let salon = document.querySelector('.salon');

// Sélection de l'élément avec l'ID '#imgsalon' c'est l'image 
let imgsalon = document.querySelector('#imgsalon');

// créer un variable  source  d'origine de l'image
let originalSrc = imgsalon.src;

// créer un variable nouvelle source de l'image 
let newSrc = 'assets/img/salon1.webp';

// Ajout d'un écouteur d'événement pour l'événement 'mouseover' pour la div salon
salon.addEventListener('mouseover', () => {
    // Au survol, changer la source de l'image pour le nouveau chemin
    imgsalon.src = newSrc;
});

// Ajout d'un écouteur d'événement pour l'événement 'mouseout'
salon.addEventListener('mouseout', () => {
    // Lorsque le curseur quitte l'élément, restaurer la source d'origine de l'image
    imgsalon.src = originalSrc;
});


/*  fin js salon */

/*  cuisine */

let cuisine = document.querySelector('.cuisine');
let imgcuisine = document.querySelector('#imgcuisine');
let originalcuisineSrc = imgcuisine.src;
let newcuisineSrc = 'assets/img/cuisine1.webp';

cuisine.addEventListener('mouseover', () => {
    imgcuisine.src = newcuisineSrc;
});

cuisine.addEventListener('mouseout', () => {
    imgcuisine.src = originalcuisineSrc;
});



/* 3 js chambre */

let chambre = document.querySelector('.chambre');
let imgchambre = document.querySelector('#imgchambre');
let originalchambreSrc = imgchambre.src;
let newchambreSrc = 'assets/img/chambre1.webp';

chambre.addEventListener('mouseover', () => {
    imgchambre.src = newchambreSrc;
});

chambre.addEventListener('mouseout', () => {
    imgchambre.src = originalchambreSrc;
});

/* 4 js salle de bain */

let sallebain = document.querySelector('.sallebain');
let imgsallebain = document.querySelector('#imgsallebain');
let originalsallebainSrc = imgsallebain.src;
let newsallebainSrc = 'assets/img/sallebain1.webp';

sallebain.addEventListener('mouseover', () => {
    imgsallebain.src = newsallebainSrc;
});

sallebain.addEventListener('mouseout', () => {
    imgsallebain.src = originalsallebainSrc;
});
/* 5 js exterieur */

let exterieur = document.querySelector('.exterieur');
let imgexterieur = document.querySelector('#imgext');
let originalexterieurSrc = imgexterieur.src;
let newextSrc = 'assets/img/exterieur1.webp';

exterieur.addEventListener('mouseover', () => {
    imgexterieur.src = newextSrc;
});

exterieur.addEventListener('mouseout', () => {
    imgexterieur.src = originalexterieurSrc;
});




/*  section pub */


let image = document.querySelector('.divimage');
let imagelivre = document.querySelector('#imagelivre');
let originalimageSrc = imagelivre.src;
let newimageSrc = 'assets/img/livrelum1.jpg';
let isOriginal = true;

image.addEventListener('click', () => {
    if (isOriginal) {
        imagelivre.src = newimageSrc;
        isOriginal = false;
    } else {
        imagelivre.src = originalimageSrc;
        isOriginal = true;
    }
});

let image1 = document.querySelector('.divimage1');
let imagelivre1 = document.querySelector('#imagelivre1');
let originalimage1Src = imagelivre1.src;
let newimage1Src = 'assets/img/livrelum3.jpg';
let isOriginal1 = true;

image1.addEventListener('click', () => {
    if (isOriginal1) {
        imagelivre1.src = newimage1Src;
        isOriginal1 = false;
    } else {
        imagelivre1.src = originalimage1Src;
        isOriginal1 = true;
    }
});

