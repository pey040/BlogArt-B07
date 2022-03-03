<?php
////////////////////////////////////////////////////////////
//
//  CRUD COMMENT (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateComment.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Comment
require_once __DIR__ . '/../../CLASS_CRUD/comment.class.php';
$monComment = new COMMENT();
// Instanciation de la classe Comment


//--> Appel parser BBCode


// Gestion des erreurs de saisie
$erreur = false;

// Gestion du $_SERVER["REQUEST_METHOD"] => En POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(isset($_POST['Submit'])){
        $Submit = $_POST['Submit'];
    } else {
        $Submit = "";
    }
    if (isset($_POST["Submit"]) AND $Submit === "Initialiser") {

        header("Location: ./updateComment.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['delLogiq']) AND !empty($_POST['delLogiq'])
        AND isset($_POST['attModOK']) AND !empty($_POST['attModOK'])
        AND isset($_POST['notifComKOAff']) AND !empty($_POST['notifComKOAff'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    




        $attModOK = $_POST['attModOK'];

        if ($attModOK == "on"){
            $boolattModOK = 1;
        } elseif ($attModOK == "off"){
            $boolattModOK = 0;
        }
        // Saisies valides

        $delLogiq = $_POST['delLogiq'];

        if ($delLogiq == "on"){
            $booldelLogiq = 1;
        } elseif ($delLogiq == "off"){
            $booldelLogiq = 0;
        }

        $notifComKOAff = $_POST['notifComKOAff'];

        $idCom = $_POST['idCom'];

        $idArt = $_POST['idArt'];

        $erreur = false;



        $monComment->update($idCom, $idArt, $boolattModOK, $notifComKOAff, $booldelLogiq);
    
        header("Location: ./comment.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies



}   // Fin if ($_SERVER["REQUEST_METHOD"] == "POST")
// Init variables form
include __DIR__ . '/initComment.php';
$htmlCode    = "";
$noBBCode    = "";
$description = "";
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Commentaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

  <!-- Style du formulaire et des boutons -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="./script_global.js"></script>

    <style type="text/css">
        textarea { /* Désactivez redimensionnement par défaut */
            resize: none;
        }
    </style>
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Commentaire</h1>
    <h2>Mise à jour d'un commentaire</h2>
    <?php
    if (isset($_GET["idArt"]) AND isset($_GET["idCom"])) {
        $numArt = $_GET["idArt"];
        $numSeqCom = $_GET["idCom"];
        var_dump($monComment->get_1Comment($numSeqCom, $numArt));
        $row = $monComment->get_1Comment($numSeqCom, $numArt);
        $numArt = $row["numArt"];
        $numMemb = $row["numMemb"];
        $libCom = $row["libCom"];
    }

?>

    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Modération : validez un commentaire...</legend>

        <input type="hidden" id="idCom" name="idCom" value="<?= isset($_GET['idCom']) ? $_GET['idCom'] : '' ?>" />
        <input type="hidden" id="idArt" name="idArt" value="<?= isset($_GET['idArt']) ? $_GET['idArt'] : '' ?>" />

<!-- --------------------------------------------------------------- -->
    <!-- FK : Membre, Article -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Membre -->
        <br>
        <div class="control-group">
            <div class="controls">
            <label class="control-label" for="LibTypAngl">
                <b>Quel membre :&nbsp;&nbsp;&nbsp;</b>
            </label>

<input type="text" name="numMemb" id="numMemb" size="80" maxlength="80" value="<?= $numMemb; ?>" tabindex="20" disabled/>

            </select>
            </div>
        </div>
    <!-- FIN Listbox Membre -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Article -->
        <br>
        <div class="control-group">
            <div class="controls">
            <label class="control-label" for="LibTypThem">
                <b>Quel article :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            </label>

            
<input type="text" name="numArt" id="numArt" size="80" maxlength="80" value="<?= $numArt; ?>" tabindex="20" disabled />
            </div>
        </div>
    <!-- FIN Listbox Article -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Fin FK : Membre, Article -->
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- textarea comment -->
        <br>
        <div class="control-group">
            <label class="control-label" for="libCom"><b>Commentaire à valider :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">

            <textarea name="libCom" id="libCom" tabindex="30"  rows="20" cols="70" style="background-color:white;" disabled="disabled"><?= $libCom; ?></textarea>
            </div>
        </div>
    <!-- End textarea comment -->
<!-- --------------------------------------------------------------- -->

        <br>
        <div class="control-group">
            <label class="control-label" for="attModOK"><b>En tant que modérateur, je valide le post :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="attModOK"
                  <? if($attModOK == 1) echo 'checked="checked"'; ?>
                  value="on" />&nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="attModOK"
                  <? if($attModOK == 0) echo 'checked="checked"'; ?>
                  value="off" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>

<!-- --------------------------------------------------------------- -->
     <!-- Début textarea notification commentaire -->
        <div class="control-group">
            <label class="control-label" for="notifComKOAff"><b>En voici les raisons :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <div class="controls">
                <textarea name="notifComKOAff" id="notifComKOAff" rows="10" cols="70" tabindex="70" placeholder="Décrivez la raison pour laquelle vous ne voulez pas afficher le post." ><?= $notifComKOAff; ?></textarea>
            </div>
        </div>
       <small class="error">Vous pouvez ajouter une notification de rejet du post (propos difammatoires, injures, vulgarité,...)</small><br>
    <!-- End textarea notification commentaire -->
<!-- --------------------------------------------------------------- -->

<!-- --------------------------------------------------------------- -->
    <!-- Suppression logique du commentaire -->
       <br>
        <div class="control-group">
            <label class="control-label" for="delLogiq"><b>En tant que modérateur, je veux que le post soit supprimé :</b></label>
            <div class="controls">
               <fieldset>
                  <input type="radio" name="delLogiq"
                  <? if($delLogiq == 1) echo 'checked="checked"'; ?>
                  value="on" />& nbsp;&nbsp;Oui&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="radio" name="delLogiq"
                  <? if($delLogiq == 0) echo 'checked="checked"'; ?>
                  value="off" />&nbsp;&nbsp;Non
               </fieldset>
            </div>
        </div>
        <br>
<!-- --------------------------------------------------------------- -->

        <div class="control-group">
            <div class="error">
<?php
            if ($erreur) {
                echo ($errSaisies);
            } else {
                $errSaisies = "";
                echo ($errSaisies);
            }
?>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
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
require_once __DIR__ . '/footerComment.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
