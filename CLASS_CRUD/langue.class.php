<?php
// CRUD LANGUE
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class LANGUE{
	function get_AllPays(){
    global $db;

    $query = 'SELECT * FROM PAYS;';
    $result = $db->query($query);
    $allPays = $result->fetchAll();
    return($allPays);
	}

	function get_1Langue($numLang){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_1LangueByPays($numLang){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllLangues(){
		global $db;

		$query = 'SELECT * FROM LANGUE;';
		$result = $db->query($query);
		$allLangues = $result->fetchAll();
		return($allLangues);
	}

	function get_AllLanguesByPays(){
		global $db;

		// select
		// prepare
		// execute
		return($allLanguesByPays);
	}

	function get_AllLanguesByLib1Lang(){
		global $db;

		// select
		// prepare
		// execute
		return($allLanguesByLib1Lang);
	}

	// Récup dernière PK NumLang
	function getNextNumLang($numPays) {
		global $db;
	
		// Les 4 premiers caractères de la PK concernent le pays
		// les 4 suivants représentent un numéro de séquence
		// Récup dernière PK utilisée pour le pays concerné
		$numPaysSelect = $numPays;  // exemple : 'CHIN'
		$parmNumLang = $numPaysSelect . '%';
	
		$requete = "SELECT MAX(numLang) AS numLang FROM LANGUE WHERE numLang LIKE '$parmNumLang';";
	
		$result = $db->query($requete);
	
		$numSeqLang = 0;
		if ($result) {
			// Récup résultat requête
			$tuple = $result->fetch();
			$numLang = $tuple["numLang"];
			if (is_null($numLang)) {
				$numLang = 0;
				$strLang = $numPaysSelect;
			} else {
				// Récup dernière PK attribuée
				$numLang = $tuple["numLang"];
				$strLang = substr($numLang, 0, 4);
				$numSeqLang = (int)substr($numLang, 4);
			}
			$numSeqLang++;
	
			// PK reconstituée
			if ($numSeqLang < 10) {
				$numLang = $strLang . "0" . $numSeqLang;
			} else {
				$numLang = $strLang . $numSeqLang;
			}
		}   // End of if ($result)
	
		return $numLang;
	} // End of function

	function create($numLang, $lib1Lang, $lib2Lang, $numPays){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO Langue (numLang, lib1Lang, lib2Lang, numPays) VALUES (?, ?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert LANGUE : ' . $e->getMessage());
		}
	}

	function TestIfLang($numLang, $table) {
		global $db;
		try {
			$db->beginTransaction();

			$query = 'SELECT * FROM '.$table.' where numLang=?';
			$request = $db->prepare($query);
			$request->execute([$numLang]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert LANGUE : ' . $e->getMessage());
		}
	}

	function LangExist($numLang) {
		return 0==(
			$this->TestIfLang($numLang, "motcle") +
			$this->TestIfLang($numLang, "thematique") +
			$this->TestIfLang($numLang, "angle")
			);

	}

	function update($numLang, $lib1Lang, $lib2Lang, $numPays, $id){
		global $db;

		try {
			$db->beginTransaction();
			$query = 'UPDATE LANGUE set numLang=?, lib1Lang=?, lib2Lang=?, numPays=? where numLang=? ';
			$request = $db->prepare($query);
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays, $id]);
			// update
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update LANGUE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
	function delete($numLang){
		global $db;

		try {
			$db->beginTransaction();
			$query = 'DELETE FROM langue where numLang=?;';
			$request = $db->prepare($query);
			$request->execute([$numLang]);
			// delete
			// prepare
			// execute
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete LANGUE : ' . $e->getMessage());
		}
	}
}	// End of class