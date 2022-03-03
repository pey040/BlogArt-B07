<?php 
require_once('../connect/config.php');
require_once('../allfront/header.php') ;
require_once __DIR__ . '/../class_crud/membre.class.php';
require_once __DIR__ . '/../util/ctrlSaisies.php';
$monMembre = new MEMBRE();
?>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/style_inscription.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">
    </head>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }
    if (isset($_POST["Submit"]) AND $Submit === "Initialiser") {

        header("Location: ./createMembre.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['prenom']) AND !empty($_POST['prenom'])
        AND isset($_POST['nom']) AND !empty($_POST['nom'])
        AND isset($_POST['pseudo']) AND !empty($_POST['pseudo'])
        AND isset($_POST['pass1']) AND !empty($_POST['pass1'])
        AND isset($_POST['pass2']) AND !empty($_POST['pass2'])
        AND isset($_POST['eMail1']) AND !empty($_POST['eMail1'])
        AND isset($_POST['eMail2']) AND !empty($_POST['eMail2'])
        AND isset($_POST['accordMemb']) AND !empty($_POST['accordMemb'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    
        // Saisies valides

        $prenomMemb = ctrlSaisies($_POST['prenom']);

        $nomMemb = ctrlSaisies($_POST['nom']);

        $pseudoMemb = ctrlSaisies($_POST['pseudo']);

        $pass1Memb = ctrlSaisies($_POST['pass1']);

        $pass2Memb = ctrlSaisies($_POST['pass2']);
        
        $eMail1Memb = ctrlSaisies($_POST['eMail1']);

        $eMail2Memb = ctrlSaisies($_POST['eMail2']);

        $idStat = 3;

        $accordMemb = $_POST['accordMemb'];
        
        var_dump($_POST);

        if ($accordMemb == "on"){
            $boolaccordMemb = 1;
        } elseif ($accordMemb == "off"){
            $boolaccordMemb = 0;
        }



        if(($pass1Memb === $pass2Memb) AND ($eMail1Memb === $eMail2Memb)){
            $erreur = false;    
        $monMembre->create($prenomMemb, $nomMemb, $pseudoMemb, $pass1Memb, $eMail1Memb, $boolaccordMemb, $idStat);
        }
        else{
            $erreur = true;
            $errSaisies =  "Erreur, les deux mot de passe ou les deux emails ne sont pas identique !";
        }
        header("Location: ./connexion.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies
}
?>

<html>
    <div class="inscription-case">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <h2>INSCRIPTION</a></h2>
                <div class="control-group">
                    <label class="control-label" for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenomMemb" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="nom">Nom</label>
                    <input type="text" name="nom" id="nomMemb" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="pseudo">Pseudonyme</label>
                    <input type="text" name="pseudo" id="pseudoMemb" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="eMail1">eMail</label>
                    <input type="text" name="eMail1" id="eMailMemb1" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="eMail2">Confirmer l'eMail</label>
                    <input type="text" name="eMail2" id="eMailMemb2" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="pass1">Mot de passe</label>
                    <input type="password" name="pass1" id="pass1" style="width:350px; height:30px"  />
                </div>
                <div class="control-group">
                    <label class="control-label" for="pass2">Confirmer le mot de passe</label>
                    <input type="password" name="pass2" id="pass2" style="width:350px; height:30px"  />
                </div>

                <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'accepte que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
                    <?php $accordMemb = "";?>

                  <input type="radio" name="accordMemb"
                  <?= ($accordMemb == "on") ? 'checked="checked"' : ''
                  ?> value="on" />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="accordMemb"
                  <?= ($accordMemb == "off") ? 'checked="checked"' : ''
                  ?> value="off" checked="checked" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>

        <div class="control-group">
                    <div class="controls">
                    <input type="submit" value="S'inscrire" style="cursor:pointer; padding:10px 40px; background-color:#FCC967;" name="Submit" />
                        
                    </div>
                </div>
            <h2>Vous avez déjà un compte, <a href="connexion.php">Connectez-vous</a></h2>
        </fieldset>
    </div>        
</html>



<?php require_once('../allfront/footer.php') ?>