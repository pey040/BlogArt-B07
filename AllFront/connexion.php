<html>
    <head>
        <link rel="stylesheet" href="Style/style_header.css">
    </head>
    <body>
        <!--<header>
            <a href="Accueil.html"><img src="Assets/" alt="Sculp'eaux" ></a>
            <a href="Accueil.html">Accueil</a>
            <a href="Connexion.html">Connexion</a>
            Barre de recherche -->
        </header>
        
        <h1>Connexion</h1>


    </body>
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
    echo "Merci de vous connecter" . '<br>';
}
?>

<!--login form-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
        <legend class="legend1">Login</legend>
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
                <input type="submit" value="Login" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
            </div>
        </div>
    </fieldset>