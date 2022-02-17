<?php
////////////////////////////////////////////////////////////
//
//  CRUD MEMBRE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateMembre.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Membre
require_once __DIR__ . '/../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE();
// Instanciation de la classe Membre


// Gestion des erreurs de saisie
$erreur = false;
// Init msg


// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }
    if (isset($_POST["Submit"]) AND $Submit === "Initialiser") {

        header("Location: ./createMembre.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['TypStat']) AND !empty($_POST['TypStat'])
        AND isset($_POST['prenomMemb']) AND !empty($_POST['prenomMemb'])
        AND isset($_POST['nomMemb']) AND !empty($_POST['nomMemb'])
        AND isset($_POST['pass1Memb']) AND !empty($_POST['pass1Memb'])
        AND isset($_POST['pass2Memb']) AND !empty($_POST['pass2Memb'])
        AND isset($_POST['eMail1Memb']) AND !empty($_POST['eMail1Memb'])
        AND isset($_POST['eMail2Memb']) AND !empty($_POST['eMail2Memb'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    
        // Saisies valides

        $prenomMemb = ctrlSaisies($_POST['prenomMemb']);

        $nomMemb = ctrlSaisies($_POST['nomMemb']);

        $pass1Memb = ctrlSaisies($_POST['pass1Memb']);

        $pass2Memb = ctrlSaisies($_POST['pass2Memb']);
        
        $eMail1Memb = ctrlSaisies($_POST['eMail1Memb']);

        $eMail2Memb = ctrlSaisies($_POST['eMail2Memb']);

        $idStat = ctrlSaisies($_POST['TypStat']);
        

        if(($pass1Memb === $pass2Memb) AND ($eMail1Memb === $eMail2Memb)){
            $erreur = false;    
        $monMembre->update($prenomMemb, $nomMemb, $pass1Memb, $eMail1Memb, $idStat, $_POST["id"]);
        }
        else{
            $erreur = true;
            $errSaisies =  "Erreur, les deux mot de passe ou les deux emails ne sont pas identique !";
        }
        header("Location: ./Membre.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies
}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initMembre.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Membre</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
    </style>
    <script>
        // Affichage pass
        function myFunction(myInputPass) {
            var x = document.getElementById(myInputPass);
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
        }
    </script>
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Membre</h1>
    <h2>Modification d'un membre</h2>
<?php
    // Modif : récup id à modifier
    // id passé en GET







?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Membre...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="prenomMemb"><b>Prénom<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="prenomMemb" id="prenomMemb" size="80" maxlength="80" value="<?= $prenomMemb; ?>" autocomplete="on" autofocus="autofocus" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="nomMemb"><b>Nom<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="nomMemb" id="nomMemb" size="80" maxlength="80" value="<?= $nomMemb; ?>" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pseudoMemb"><b>Pseudonyme :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="pseudoMemb" id="pseudoMemb" size="80" maxlength="80" value="<?= $pseudoMemb; ?>" disabled />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pass1Memb"><b>Mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="pass1Memb" id="myInput1" size="80" maxlength="80" value="<?= $pass1Memb; ?>" autocomplete="on" />
            <br>
            <input type="checkbox" onclick="myFunction('myInput1')">
            &nbsp;&nbsp;
            <label><i>Afficher mot de passe</i></label>
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="pass2Memb"><b>Confirmez le mot passe<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="password" name="pass2Memb" id="myInput2" size="80" maxlength="80" value="<?= $pass2Memb; ?>" autocomplete="on" />
            <br>
            <input type="checkbox" onclick="myFunction('myInput2')">
            &nbsp;&nbsp;
            <label><i>Afficher mot de passe</i></label>
        </div>
        <small class="error">*Champ obligatoire si nouveau passe</small><br>
        <br>
        <div class="control-group">
            <label class="control-label" for="eMail1Memb"><b>eMail<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMail1Memb" id="eMail1Memb" size="80" maxlength="80" value="<?= $eMail1Memb; ?>" autocomplete="on" />
        </div>

        <br>
        <div class="control-group">
            <label class="control-label" for="eMail2Memb"><b>Confirmez l'eMail<span class="error">(*)</span> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="email" name="eMail2Memb" id="eMail2Memb" size="80" maxlength="80" value="<?= $eMail2Memb; ?>" autocomplete="on" />
        </div>
        <small class="error">*Champ obligatoire si nouveau eMail</small><br>

        <br>
        <div class="control-group">
            <label class="control-label" for="accordMemb"><b>J'ai accepté que mes données soient conservées :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="accordMemb"
                  <? if($accordMemb == 1) echo 'checked="checked"'; ?>
                  value="on" disabled />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="accordMemb"
                  <? if($accordMemb == 0) echo 'checked="checked"'; ?>
                  value="off" disabled />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>
        <br><br>

<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Statut -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox statut -->
        <div class="control-group">
            <label class="control-label" for="LibTypStat"><b>Statut :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>

            <?php
            $libStat = "";
            ?>

            
            <input type="hidden" id="idTypStat" name="idTypStat" value="<?= $libStat; ?>" />
            <select size="1" name="TypStat" id="TypStat" class="form-control form-control-create" title="Sélectionnez un statut !" >
                <option value="-1">- - - Choisissez un statut - - -</option>
<?php
                $listidStat = "";
                $listlibStat = "";

                $result = $monMembre->get_AllStat();
                // var_dump($result);
                if($result){
                    foreach($result as $row){
                        $listidStat = $row["idStat"]; //
                        $listlibStat = $row["libStat"];
?>
                        <option value="<?= $listidStat; ?>">
                            <?= $listlibStat; ?>
                        </option>
<?php
                    } // End of foreach
                }   // if ($result)
?>
            </select>

        </div>
    <!-- FIN Listbox statut -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Statut -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
        <br>
        <div class="control-group">
            <label class="control-label" for="dtCreaMemb"><b>Date création :&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="dtCreaMemb" id="dtCreaMemb" value="<?= $dtCreaMemb; ?>" disabled />
        </div>
        <small>(Pour mémoire)</small><br>

        <div class="control-group">
            <div class="error">
<?php
            if ($erreur) {
                echo ($errSaisies);
            }
            else {
                $errSaisies = "";
                echo ($errSaisies);
            }
?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Initialiser" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Valider" style="cursor:pointer; padding:5px 20px; background-color:lightsteelblue; border:dotted 2px grey; border-radius:5px;" name="Submit" />
                <br>
            </div>
        </div>
      </fieldset>
    </form>
<?php
require_once __DIR__ . '/footerMembre.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
