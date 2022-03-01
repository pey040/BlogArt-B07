<?php require_once('../AllFront/header.php') ?>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="Style/style_inscription.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>
</html>

<html>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <fieldset>
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
                <input type="submit" value="S'inscrire" style="cursor:pointer; padding:5px 20px; background-color:#FCC967;" name="Valider" />
            </div>
        </div>
        <h2>Vous avez déjà un compte, <a href="connexion.php">Connectez-vous</a></h2>
    </fieldset>
</html>



<?php require_once('../AllFront/footer.php') ?>