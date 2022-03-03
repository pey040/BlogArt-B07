<?php 
require_once('../connect/config.php');
require_once('../allfront/header.php'); 
require_once __DIR__ . '/../class_crud/membre.class.php';
$monMembre = new MEMBRE();
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
</html>
<?php

// $monMembre -> $password_hash($pass, PASSWORD_DEFAULT);  //Lors de linscription on va inserer ca en DB a partir du pass en clair

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $allMembres = $monMembre->get_AllMembersByStat();

//     if (isset($_POST['eMail']) AND !empty($_POST['eMail'])
//     AND isset($_POST['pass']) AND !empty($_POST['pass'])){

//     foreach($allMembres as $row) {
//         if (($_POST['eMail'] == $row['eMailMemb']) AND ($_POST['pass'] == $row['passMemb'])){
//             setcookie('user', $row['pseudoMemb'], time() + 7400, '/');  
//         }

        
//     }


// }

// }
// if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
//     //on fais un select du user pour voir son hash
//     if ($_COOKIE['pass'] == $LePassRecuperéParLeSelect) {
//         echo 'Bonjour ' . $_COOKIE['user'] . '<br>';
//     }
// } 
?>

<!--login form-->
<html>
    <div class="connexion-case">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <h2>CONNEXION</a></h2>
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
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $allMembres = $monMembre->get_AllMembersByStat();
            
                if (isset($_POST['eMail']) AND !empty($_POST['eMail'])
                AND isset($_POST['pass']) AND !empty($_POST['pass'])){
            
                foreach($allMembres as $row) {
                    if (($_POST['eMail'] == $row['eMailMemb']) AND ($_POST['pass'] == $row['passMemb'])){
                        setcookie('user', $row['pseudoMemb'], time() + 7400, '/');  
                    }
            
                    
                }
            
            
            }
            
            }


            if (isset($_POST['eMail']) AND !empty($_POST['eMail'])
            AND isset($_POST['pass']) AND !empty($_POST['pass'])){
                var_dump($_COOKIE);
                echo "coucou";
                
                if (isset($_COOKIE['user']) == true){
                    ?> <html><div class="true-login"> <h2> Bonjour <?php echo $_COOKIE['user'] . '<br>'; ?> </h2></div></html> <?php
                }

                elseif (isset($_COOKIE['user']) == false){
                    ?> <html><div class="error-login"> <h2>Le mot de passe et/ou l'adrese mail ne sont pas correct(s)</h2></div></html> <?php
                }

            }
            var_dump($_COOKIE);
            ?>
            <h2>Pas encore de compte, <a href="inscription.php">Inscrivez-vous</a></h2>
            <h3><a href="deconnexion.php">Se déconnecter</a></h3>
            <h3>Vous êtes administrateur ? Connectez-vous &nbsp;<a href="connexionadmin.php"> ici</a>.</h3>
            <?var_dump($_COOKIE);?>
        </fieldset>
    </div>
</html>

<?php require_once('../allfront/footer.php') ?>