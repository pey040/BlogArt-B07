<?php 
require_once('../connect/config.php');
require_once('../allfront/header.php'); 
require_once __DIR__ . '/../class_crud/user.class.php';
$monUser = new USER();
?>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/style_connexionadmin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>
</html>
<?php

/* password_hash($pass, PASSWORD_DEFAULT); */ //Lors de linscription on va inserer ca en DB a partir du pass en clair

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $allUsers = $monUser->get_AllUsers();

    if (isset($_POST['eMail']) AND !empty($_POST['eMail'])
    AND isset($_POST['pass']) AND !empty($_POST['pass'])){

    foreach($allUsers as $row) {
        if (($_POST['eMail'] == $row['eMailUser']) AND ($_POST['pass'] == $row['passUser'])){
            setcookie('useradmin', $row['pseudoUser'], time() + 7400, '/');  
        }

        
    }


}

}
if (isset($_COOKIE['useradmin']) && isset($_COOKIE['pass'])) {
    //on fais un select du user pour voir son hash
    if ($_COOKIE['pass'] == $LePassRecuperéParLeSelect) {
        echo 'Bonjour ' . $_COOKIE['useradmin'] . '<br>';
    }
} 
?>

<!--login form-->
<html>
    <div class="connexion-admin-case">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <h2>CONNEXION ADMIN</a></h2>
            <div class="control-group">
                <label class="control-label" for="eMail">eMail  </label>
                <input type="text" name="eMail" id="eMail" style="width:350px; height:30px" />
            </div>
            <div class="control-group">
                <label class="control-label" for="pass">Mot de passe  </label>
                <input type="password" name="pass" id="pass" style="width:350px; height:30px" />
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Se connecter" style="cursor:pointer; padding:10px 40px; background-color:#FCC967;" name="Valider" />
                </div>
            </div>
            <?php   
            
            if (isset($_POST['eMail']) AND !empty($_POST['eMail'])
            AND isset($_POST['pass']) AND !empty($_POST['pass'])){

                if (isset($_COOKIE['useradmin']) == true){
                    ?> <html><div class="true-login"> <h2> Bonjour <?php echo $_COOKIE['useradmin'] . '<br>'; ?> </h2>
                    <h3>Accéder au &nbsp;<a href="/../BlogArt/BlogArt-B07/index1.php">CRUD</a></h3></div></html> <?php
                }

                else{
                    ?> <html><div class="error-login"> <h2>Le mot de passe et/ou l'adrese mail ne sont pas correct(s)</h2></div></html> <?php
                }

            }
            ?>
            <h3><a href="deconnexion.php">Se déconnecter</a></h3>
        </fieldset>
    </div>
</html>

<?php require_once('../allfront/footer.php') ?>