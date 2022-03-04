<?php 
require_once('../connect/config.php');
setcookie("user", null, -1, '/');
setcookie("useradmin", null, -1, '/');
require_once('../allfront/header.php'); 
 ?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/style_connexion.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>
    <div class="connexion-case">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
        <h2>Vous êtes déconnectés.</h2></br>
        <h2>Retour à la page d'accueil</h2> </br>
        <h2><a href="accueil.php"> ici</a></h2>
        </fieldset>
    </div>
</html>
<?php require_once('../allfront/footer.php') ?>