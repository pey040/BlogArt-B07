<?php 
setcookie("user", null, -1, '/');
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


        
    

        <h2>Les articles récents :</h2>

        <?php 
        // Appel méthode : Get tous les articles en BDD
        $allArticles = (array)$monArticle->get_AllArticles();

        //compter le nbre de ligne en php
        $allArticles2 = array(array());
        $pair = 0;
        $i = 0; $j = 0;
        $nombreMax = count($allArticles);
        $nombreInit = 1;

        // Boucle pour afficher
        // var_dump($allArticles);
        foreach($allArticles as $row) {
            // var_dump($row);
            if ($nombreInit <= $nombreMax){ //impaire
                if($pair == 0){
                    $allArticles2[$i][$j] = $row['libTitrArt'];
                    $allArticles2[$i][$j+1] = $row['libChapoArt'];
                    $allArticles2[$i][$j+2] = $row['urlPhotArt'];

                    $pair = 1;
                    $nombreInit ++;
                    
                }
                else{ //pair
                    $allArticles2[$i][$j+3] = $row['libTitrArt'];
                    $allArticles2[$i][$j+4] = $row['libChapoArt'];
                    $allArticles2[$i][$j+5] = $row['urlPhotArt'];

                    $pair = 0;
                    $nombreInit ++;
                    $i++;
                }
                
            }
        }	// End of foreach1
        // echo('<pre>');
        // print_r($allArticles2);
        // echo('</pre>');
        $nombreMax2 = count($allArticles2);
        $i = 0;
        $rest = (int)($nombreMax2 / 2);
        // echo($rest . ' ' . $nombreMax2);
        $finished = false;
        // for($i = 0; $i < count($allArticles2); $i++ ) {
        while($i < count($allArticles2) AND $finished == false) {
            // echo('echo du while' . $i);
            if ( $rest != 0 AND $i >= $nombreMax2-1){ ?>
                <div class="accueilMiddle grid-container">
                <div class="article1 grid-item">
                <div><img class="imageArticle" src="../uploads/<?= $allArticles2[$i][2]; ?>" alt=""></div>
                <div>
                    <h3><?= $allArticles2[$i][0]; ?></h3>
                    <p>
                    <?= $allArticles2[$i][1]; ?>
                    </p>
                </div>
                </div>
        <?php
            $finished = true;
            } //impair
            else {
                // echo('echo du début else' . $i);

                ?>
            
            <div class="accueilMiddle grid-container">
            <div class="article1 grid-item">
                <div><img class="imageArticle" src="../uploads/<?= $allArticles2[$i][2]; ?>" alt=""></div>
                <div>
                    <h3><?= $allArticles2[$i][0]; ?></h3>
                    <p>
                    <?= $allArticles2[$i][1]; ?>
                    </p>
                </div>
            </div>



            <div class="article2 grid-item">
                <div>
                    <h3><?= $allArticles2[$i][3]; ?></h3>
                    <p>
                    <?= $allArticles2[$i][4]; ?>
                    </p>
                </div>
                <div><img class="imageArticle" src="../uploads/<?= $allArticles2[$i][5]; ?>" alt=""></div>
            </div>

        </div>
        
        <?php
        $i++;
            } // end of if else
        
        }	// End of while
    
    
        ?>
    

        

        
  


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
    <?php setcookie("cookiesok", "GOOD") ?>
} else {
    popup.style.display = "flex"
}

var refresh = window.getElementById('refresh');
refresh.addEventListener('click', location.reload(), false);
</script>


