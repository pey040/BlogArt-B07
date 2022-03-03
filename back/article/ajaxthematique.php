<?php
/*
*   Script : ajaxEtudiant.php
*   Example : 2 listbox dynamiques liées via AJAX
*/
// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';
// connexion
require_once __DIR__ . '/../../connect/database.php';
?>
<select name='thematique' style='padding:2px; border:solid 1px black; color:steelblue; border-radius:5px;' >
<?php
$langue = $_REQUEST["numLang"];

if (isset($langue)) {
	$query = "SELECT libThem, numThem FROM THEMATIQUE WHERE numLang = ?;" ;
	$result = $db->prepare($query);
	$result->execute([$langue]);
	$allThematiqueByLangue = $result->fetchAll();

	if ($allThematiqueByLangue) {
?>
			<option value='-1'>- - - Choisissez une thematique - - -</option>
<?php
			foreach($allThematiqueByLangue as $row){
?>
				<option value="<?= $row['numThem']; ?>">
					<?= $row['libThem']; ?>
				</option>
<?php
			}	// End of foreach
	}else {
?>
			<option value='-1'>- - - Choisissez une thematique - - -</option>
<?php
	}	// else
}	// End of if (isset($classe))
?>
</select>
