<?php
////////////////////////////////////////////////////////////
//
//  CRUD MOTCLE (PDO) - Modifié : 4 Juillet 2021
//
//  Script  : motCle.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Insertion classe MotCle
require_once __DIR__ . '/../../CLASS_CRUD/motcle.class.php';
$monMotCle = new MOTCLE();
// Instanciation de la classe MotCle

// Ctrl CIR
$errCIR = 0;
$errDel = 0;


?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Admin - CRUD Mot Clé</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
</head>
<body>
    <h1>BLOGART22 Admin - CRUD Mot Clé</h1>

	<hr />
	<h2>Nouveau Mot Clé :&nbsp;<a href="./createMotCle.php"><i>Créer un Mot Clé</i></a></h2>
	<hr />
	<h2>Tous les Mots Clés</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Numéro&nbsp;</th>
            <th>&nbsp;Nom Mot Clé&nbsp;</th>
            <th>&nbsp;Langue&nbsp;</th>
            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>

<?php
    // Appel méthode : Get toutes les mots cles en BDD
    $allMotCle = $monMotCle->get_AllMotCles();
    // Boucle pour afficher
    foreach($allMotCle as $row) {
?>
        <tr>

		<td><h4>&nbsp; <?= $row["numMotCle"]; ?> &nbsp;</h4></td>

        <td>&nbsp; <?= $row["libMotCle"]; ?> &nbsp;</td>

        <td>&nbsp; <?= $row["numLang"]; ?> &nbsp;</td>

		<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateMotCle.php?id=<?=$row["numMotCle"]; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier mot clé" title="Modifier mot clé" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<br /></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteMotCle.php?id=<?=$row["numMotCle"]; ?>"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Supprimer mot clé" title="Supprimer mot clé" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
		<br /></td>

        </tr>
<?php
	}	// End of foreach
?>
    </tbody>
    </table>
<?php
    if ($errCIR == 1) {
?>
        <i><div class="error"><br>=>&nbsp;Suppression impossible, existence d'article(s) associé(s) à cette thématique. Vous devez d'abord supprimer le(s) thématique(s) concernée(s).</div></i>
<?php
    }   // End of if ($errCIR == 1)
?>
    <p>&nbsp;</p>
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>