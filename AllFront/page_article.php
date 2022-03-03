<?php 
require_once('../allfront/header.php');

// Insertion classe Article
require_once __DIR__ . '../../class_crud/article.class.php';
$monArticle = new ARTICLE();
require_once __DIR__ . '../../class_crud/thematique.class.php';
$maThematique = new THEMATIQUE();
require_once __DIR__ . '../../class_crud/angle.class.php';
$monAngle = new ANGLE();
require_once __DIR__ . '../../class_crud/comment.class.php';
$monComment = new COMMENT();

?>

<html>

    <head>      
        <link rel="stylesheet" href="styles/page_article.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>

    <body>

    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    // Appel méthode : Get tous les articles en bdd
    $allArticles = $monArticle->get_1Article($id);
    $allThematiques = $maThematique->get_1ThematiqueByLang($id);
    $allAngles = $monAngle->get_1AngleByLang($id);
    $allComments = $monComment->get_AllCommentsByNumArt($id);
    $allpseudoComment = $monComment->get_AllCommentsByArticleByMemb($id);

    // echo('<pre>');
    // print_r($allArticles);
    // echo('</pre>');

    // Supprimer les doublons
	// $unique = array_unique($allArticles);
    // echo('<pre>');
	// print_r($unique);
    // echo('</pre>');

    // foreach ($allArticles as $row){
    ?>
        <div class="flux">
            <div class="motcletop">
                <div>
                    <h4>#motclé1</h4>
                </div>
                <div>
                    <h4>#motclé2</h4>
                </div>
                <div>
                    <h4>#motclé3</h4>
                </div>
                <div>
                    <h4>#motclé4</h4>
                </div>
                <div>
                    <h4>#motclé5</h4>
                </div>
            </div>

            <h1><?= $allArticles["libTitrArt"]; ?></h1>
            <div class="entete">
                <div>
                <p>Article n°<?= $allArticles["numArt"]; ?></p>
                <p>Écrit le <?= $allArticles["dtCreArt"]; ?></p>
                </div>
                <div>
                <p><?= $allArticles["numAngl"]; ?></p>
                <p><?= $allArticles["numThem"]; ?></p>
                </div>
            </div>
            
            <h2><?= $allArticles["libChapoArt"]; ?></h2>
            
            
        </div>
        <div class="image-frame" style="background-image: url('../uploads/<?= $allArticles['urlPhotArt']; ?>');"></div>
        
        <div class="flux">
            <h3><?= $allArticles["libAccrochArt"]; ?></h3>
            <h4><?= $allArticles["libSsTitr1Art"]; ?></h4>
            <p>
            <?= $allArticles["parag1Art"]; ?>
            </p>

            <h4><?= $allArticles["libSsTitr2Art"]; ?></h4>
            <p>
            <?= $allArticles["parag2Art"]; ?>
            </p>

            <p>
            <?= $allArticles["parag3Art"]; ?>
            </p>

            <p>
            <?= $allArticles["libConclArt"]; ?>
            </p>

    <?php
    // }	// End of foreach
    ?>

            <h3>Commentaires</h3>
            <p>
               <label>Ecrivez votre commentaire</label> : <input type="text"></input>
            </p>

            <?php
            foreach ($allpseudoComment as $row){
                // var_dump($row['numArt']);
                // var_dump($id);
                if ($row['numArt']==$id){?>  
           
           <div class="bulle-com">
            <div>
            <p>
                <?= $row["pseudoMemb"];?>
            </p>
                
            <p>
                <?= $row["libCom"];?>
            </p> 
                </div>
            <div>
                <p>
                    <?= $row["dtCreCom"];?> 
                </p>
            </div>
           </div>
          
            <?php 
                }
                    
            }	// End of foreach
            ?>
            

        </div>

    </body>
</html>

<?php require_once('../allfront/footer.php') ?>