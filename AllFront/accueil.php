<?php 
require_once('../AllFront/header.php');

// Insertion classe Article
require_once __DIR__ . '../../CLASS_CRUD/article.class.php';
$monArticle = new ARTICLE();
?>

<html>

    <head>
        <!-- <link rel="stylesheet" href="Style/style_header.css"> -->
        <link rel="stylesheet" href="Style/style_accueil.css">
        <link rel="stylesheet" href="Style/style_cookies.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>



    <body>
        
        <div class="accueilTop">
            <div class="toptextaccueil">
                <h1 class="texttitle">Les sculptures de Bordeaux</h1>

                <p class="text">
                Que diriez-vous de visiter Bordeaux avec nous ? <br><br>
                On vous invite à suivre nos articles sur les sculptures. <br><br>
                Ces œuvres majestueuses et artistiques qui posent pour la plupart depuis des décennies sur des lieux emblématiques, des places ou devant des monuments. <br><br>
                Si vous êtes intéressés par le sujet ou que vous cherchez tout simplement un moyen de pouvoir les contempler et de vous renseigner sur leur histoire, <br><br>
                vous êtes au bon endroit !
                </p>
            </div>
        

        <img class="dessinQuinconces" src="Assets/statuequinconces.png" alt="">
        </div>
  


    </body>
</html>
<?php include('../AllFront/popup.php') ?>
<?php require_once('../AllFront/footer.php') ?>


<script>

popup = document.getElementById("popup");
acceptPopupButton = document.getElementById("acceptPopupButton")
var cookiesAuthorized = false;

function closePopup() {
    popup.style.display = "none";
    closeButton.style.display = "none";
    burgerButton.style.display = "flex";
}

function acceptCookies() {
    cookiesAuthorized = true;
    popup.style.display = "none";
    localStorage.setItem("cookiesAuthorized", JSON.stringify(cookiesAuthorized));
}

if (localStorage.getItem("cookiesAuthorized") === "true") {
    popup.style.display = "none";
} else {
    popup.style.display = "flex"
}
</script>


