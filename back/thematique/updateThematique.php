<?php
////////////////////////////////////////////////////////////
//
//  CRUD THEMATIQUE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateThematique.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';
// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe Thematique
require_once __DIR__ . '/../../CLASS_CRUD/thematique.class.php';
$maThematique = new THEMATIQUE();
// Instanciation de la classe Thematique



// BBCode


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

        header("Location: ./createThematique.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['TypLang']) AND !empty($_POST['TypLang'])
        AND isset($_POST['libThem']) AND !empty($_POST['libThem'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    
        // Saisies valides
        $erreur = false;

        $libThem = ctrlSaisies($_POST['libThem']);
        
        $numLang = ctrlSaisies($_POST['TypLang']);

        $Themtext = "THEM";
        $numThem = $maThematique->getNextNumThem($Themtext);

        $maThematique->update($numThem, $libThem, $numLang, $_POST["id"]);

        header("Location: ./thematique.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies


}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initThematique.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Thematique</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Thematique</h1>
    <h2>Modification d'une Thematique</h2>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $row = $maThematique->get_1Thematique($id);
        $id = $row["numThem"];
        $libThem = $row["libThem"];
        $idLang = $row["numLang"];
    }


?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Thematique...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="libThem"><b>Libellé :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="libThem" id="libThem" size="80" maxlength="80" value="<?= $libThem; ?>" placeholder="Titre de la thématique" autocomplete="on" autofocus="autofocus" />
        </div>
        <br><br>
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- FK : Langue -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox langue -->
        <div class="control-group">
            <label class="control-label" for="LibTypLang"><b>Langue :&nbsp;&nbsp;&nbsp;</b></label>
            <label class="control-label" for="LibTypLang"><b>Quelle langue :&nbsp;&nbsp;&nbsp;</b></label>
            
            <?php
            $numLang = "";
            ?>

            
            <input type="hidden" id="idTypLang" name="idTypLang" value="<?= $numLang; ?>" />
            <select size="1" name="TypLang" id="TypLang" class="form-control form-control-create" title="Sélectionnez la langue !" >
                <option value="-1">- - - Choisissez une langue - - -</option>
<?php
                $listNumLang = "";
                $listlibLang = "";

                $result = $maThematique->get_AllLangues();
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
require_once __DIR__ . '/footerThematique.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
