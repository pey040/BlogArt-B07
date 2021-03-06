<?php
////////////////////////////////////////////////////////////
//
//  CRUD LANGUE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : updateLangue.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe Langue
require_once __DIR__ . '/../../class_crud/langue.class.php';
// Instanciation de la classe langue
$maLangue = new LANGUE();

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

        header("Location: ./createLangue.php");
    }   // End of if ((isset($_POST["submit"])) ...
    if (isset($_POST['lib1Lang']) AND !empty($_POST['lib1Lang'])
        AND isset($_POST['lib2Lang']) AND !empty($_POST['lib2Lang'])
        AND isset($_POST['TypPays']) AND !empty($_POST['TypPays'])
        AND !empty($_POST['Submit']) AND $Submit === "Valider") {
    
        // Saisies valides
        $erreur = false;

        $lib1Lang = ctrlSaisies($_POST['lib1Lang']);
        $lib2Lang = ctrlSaisies($_POST['lib2Lang']);
        $numPays = ctrlSaisies($_POST['TypPays']);

        $numLang = $maLangue->getNextNumLang($numPays);

        $maLangue->update($numLang, $lib1Lang, $lib2Lang, $numPays, $_POST["id"]);

        header("Location: ./langue.php");
    }   // Fin if ((isset($_POST['libStat'])) ...
    else {
        // Saisies invalides
        $erreur = true;
        $errSaisies =  "Erreur, la saisie est obligatoire !";
    }   // End of else erreur saisies




    // controle des saisies du formulaire

    // modification effective du langue



    // Gestion des erreurs => msg si saisies ko








}   // Fin if ($_SERVER["REQUEST_METHOD"] === "POST")
// Init variables form
include __DIR__ . '/initLangue.php';
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <title>Admin - CRUD Langue</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Langue</h1>
    <h2>Modification d'une langue</h2>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $row = $maLangue->get_1Langue($id);
        $id = $row["numLang"];
        $lib1Lang = $row["lib1Lang"];
        $lib2Lang = $row["lib2Lang"];
        $numPays = $row["numPays"];
    }

?>
    <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" accept-charset="UTF-8">

      <fieldset>
        <legend class="legend1">Formulaire Langue...</legend>

        <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" />

        <div class="control-group">
            <label class="control-label" for="lib1Lang"><b>Libellé court :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="lib1Lang" id="lib1Lang" size="80" maxlength="80" value="<?= $lib1Lang; ?>" tabindex="10" autofocus="autofocus" /><br><br>
        </div>
        <div class="control-group">
            <label class="control-label" for="lib2Lang"><b>Libellé long :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
            <input type="text" name="lib2Lang" id="lib2Lang" size="80" maxlength="80" value="<?= $lib2Lang; ?>" tabindex="20" />
        </div>
        <br>
<!-- --------------------------------------------------------------- -->
<!-- --------------------------------------------------------------- -->
    <!-- Listbox Pays -->
        <br>
        <div class="control-group">
            <div class="controls">
            <label class="control-label" for="LibTypPays">
                <b>Quel pays :&nbsp;&nbsp;&nbsp;</b>
            </label>


                <?php
                if (isset($_GET["id"])) {
                $numPays = $row["numPays"];}
            ?>

            
            <input type="hidden" id="idTypPays" name="idTypPays" value="<?= $numPays; ?>" />
            <select size="1" name="TypPays" id="TypPays" class="form-control form-control-create" title="Sélectionnez le pays !" >
                <option value="-1">- - - Choisissez un pays - - -</option>
<?php
                $listNumPays = "";
                $listfrPays = "";

                $result = $maLangue->get_AllPays();
                // var_dump($result);
                if($result){
                    foreach($result as $row){
                        $listNumPays = $row["numPays"]; //
                        $listfrPays = $row["frPays"];

                        if ($listNumPays == $numPays){
                            ?>          <option value="<?= $listNumPays; ?>" selected>
                            <?= $listfrPays; ?>
                        </option>  
                        <?php ;}?>
                      
                    <?php    if ($listNumPays != $numPays){
                            ?>          <option value="<?= $listNumPays; ?>" >
                            <?= $listfrPays; ?>
                        </option>  
                        <?php ;}?>
<?php
                    } // End of foreach
                }   // if ($result)
?>
            </select>
                <!-- Listbox pays => 2ème temps -->

            </div>
        </div>

    <!-- FIN Listbox Pays -->
<!-- --------------------------------------------------------------- -->
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
require_once __DIR__ . '/footerLangue.php';

require_once __DIR__ . '/footer.php';
?>
</body>
</html>
