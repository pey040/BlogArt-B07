<?php
////////////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateMotCle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe MotCle
require_once __DIR__ . '/../../class_crud/motcle.class.php';
$monMotCle = new MOTCLE();
// Instanciation de la classe MotCle


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

        header("Location: ./createMotCle.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['TypLang']) AND !empty($_POST['TypLang'])
        AND isset($_POST['libMotCle']) AND !empty($_POST['libMotCle'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    
        // Saisies valides
        $erreur = false;

        $libMotCle = ctrlSaisies($_POST['libMotCle']);
        
        $numLang = ctrlSaisies($_POST['TypLang']);

        $MotCletext = "MOTCLE";
        $numMotCle = $monMotCle->getNextNumMotCle($MotCletext);

        $monMotCle->update($libMotCle, $numLang, $_POST["id"]);

        header("Location: ./motCle.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies




}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initMotCle.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Mot Clé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Mot Clé</h1>
    <h2>Modification d'un Mot Clé</h2>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $row = $monMotCle->get_1MotCle($id);
        $id = $row["numMotCle"];
        $libMotCle = $row["libMotCle"];
        $idLang = $row["numLang"];
    }

?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Mot Clé...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />
        <div class="control-group">
            <label class="control-label" for="libMotCle"><b>Libellé :&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libMotCle" id="libMotCle" size="80" maxlength="100" value="<?= $libMotCle; ?>" placeholder="Décrivez le mot Clé" autocomplete="on" autofocus="autofocus" />
        </div>
        <br>
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Langue -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox langue -->
        <br>

        <div class="control-group">
            <div class="controls">
            <label class="control-label" for="LibTypLang">
                <b>Quelle langue :&nbsp;&nbsp;&nbsp;</b>
            </label>
            
            <?php
            $numLang = "";
            ?>

            
            <input type="hidden" id="idTypLang" name="idTypLang" value="<?= $numLang; ?>" />
            <select size="1" name="TypLang" id="TypLang" class="form-control form-control-create" title="Sélectionnez la langue !" >
                <option value="-1">- - - Choisissez une langue - - -</option>
<?php
                $listNumLang = "";
                $listlibLang = "";

                $result = $monMotCle->get_AllLangues();
                // var_dump($result);
                if($result){
                    foreach($result as $row){
                        $listNumLang = $row["numLang"]; //
                        $listlibLang = $row["lib1Lang"];

                if ($listNumLang == $idLang){
                    ?>          <option value="<?= $listNumLang; ?>" selected>
                    <?= $listlibLang; ?>
                </option>  
                <?php ;}?>
              
            <?php    if ($listNumLang != $idLang){
                    ?>          <option value="<?= $listNumLang; ?>" >
                    <?= $listlibLang; ?>
                </option>  
                <?php ;}?>
<?php
                    } // End of foreach
                }   // if ($result)
?>
            </select>
            </div>

        </div>
    <!-- FIN Listbox langue -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Langue -->
<!-- --------------------------------------------------------------- -->
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
require_once __DIR__ . '/footerMotCle.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
