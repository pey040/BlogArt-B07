<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/style_footer.css">
        <link rel="stylesheet" href="styles/style_cookies.css">
        
    </head>
    <body>
        <?php if(isset($_COOKIE['accept_cookie'])){
        $showCookie = false;
        }else{
        $showCookie = true;
        }
        require_once('footer.view.php');?>
        <footer>
            <div class="footerButtons">
                <a class ="sculpHome" href="<?php echo ROOTFRONT; ?>/../../blogArt/allfront/accueil.php">SCULP'EAUX </a>
                <div class ="subFooter">
                    <div class="foot1">
                        <a href="<?php echo ROOTFRONT; ?>/../../blogArt/allfront/accueil.php">Accueil</a>
                        <a href="<?php echo ROOTFRONT; ?>/../../blogArt/allfront/connexion.php">Connexion</a>
                    </div>
                    <a href="<?php echo ROOTFRONT; ?>/../../blogArt/allfront/mentionslegales.php">Mentions <br/> légales</a>
                    <a href="<?php echo ROOTFRONT; ?>/../../blogArt/allfront/apropos.php">À propos <br/> de nous</a>
                </div>
            </div>
        </footer>
    </body>
</html>