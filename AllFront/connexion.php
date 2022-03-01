<?php require_once('../AllFront/header.php') ?>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="Style/style_connexion.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>
</html>
<?php
//On simule ma base de données
$user = 'gwendal';
/* $pass = 'password'; */ // A ete remplace par en dessous
$pass = '$2y$10$kHrRUCyaEM1N3zx5oyEGi.n.ohkJLWDevEVXH25tqohqC1mspFS6W'; //Mot de passe hashé

/* password_hash($pass, PASSWORD_DEFAULT); */ //Lors de linscription on va inserer ca en DB a partir du pass en clair

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo($_POST['pass'] . '<br>');
    if (password_verify($_POST['pass'], $pass) === true) {
        echo ('<p>Bon mot de passe</p>');
        setcookie('user', $user, time() + 3600); // 1h
        setcookie('pass', $pass /* ICI ON STOCK LE HASH DU PASSWORD EVIDEMENT */, time() + 3600); // 1h
    } else {
        echo ('<p>Mauvais mot de passe</p>');
    }
}

if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
    //on fais un select du user pour voir son hash
    if ($_COOKIE['pass'] == $LePassRecuperéParLeSelect) {
        echo 'Bonjour ' . $_COOKIE['user'] . '<br>';
    }
} else {
    echo "Connexionpodvsipvnisdvsiunvsihbvhdbvsjsdjvbqjcfbqbc suhbvsjbvsbvjdshbvcksdvbsdcbqsjkscb, cela commence à me courir sur le haricot :) hahahaa" . '<br>';
}
?>

<!--login form-->
<html>
    <div class="connexion-case">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <h2>CONNEXION</a></h2>
            <div class="control-group">
                <label class="control-label" for="user">User</label>
                <input type="text" name="user" id="user" value="<?php echo $user; ?>" />
            </div>
            <div class="control-group">
                <label class="control-label" for="pass">Password</label>
                <input type="password" name="pass" id="pass" value="<?php echo $pass; ?>" />
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="submit" value="Se connecter" style="cursor:pointer; padding:10px 40px; background-color:#FCC967;" name="Valider" />
                </div>
            </div>
            <h2>Pas encore de compte, <a href="inscription.php">Inscrivez-vous</a></h2>
        </fieldset>
    </div>
</html>

<?php require_once('../AllFront/footer.php') ?>