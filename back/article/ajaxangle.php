<?php
/*
*   Script : ajaxEtudiant.php
*   Example : 2 listbox dynamiques liées via AJAX
*/
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
// connexion
require_once __DIR__ . '/../../CONNECT/database.php';
?>
<select name='angle' style='padding:2px; border:solid 1px black; color:steelblue; border-radius:5px;' >
<?php
$langue = $_REQUEST["numLang"];

if (isset($langue)) {
	$query = "SELECT libAngl, numAngl FROM ANGLE WHERE numLang = ?;" ;
	$result = $db->prepare($query);
	$result->execute([$langue]);
	$allAnglesByLangue = $result->fetchAll();

	if ($allAnglesByLangue) {
?>
			<option value='-1'>- - - Choisissez un angle - - -</option>
<?php
			foreach($allAnglesByLangue as $row){
?>
				<option value="<?= $row['numAngl']; ?>">
					<?= $row['libAngl']; ?>
				</option>
<?php
			}	// End of foreach
	}else {
?>
			<option value='-1'>- - - Choisissez un angle - - -</option>
<?php
	}	// else
}	// End of if (isset($classe))
?>
</select>
