<?php
// CRUD LANGUE
// ETUD
require_once __DIR__ . '../../connect/database.php';

class LANGUE{
	function get_AllPays(){
    global $db;

    $query = 'SELECT * FROM pays;';
    $result = $db->query($query);
    $allPays = $result->fetchAll();
    return($allPays);
	}

	function get_1Langue($numLang){
		global $db;


		$query = 'SELECT * FROM langue WHERE numLang=?;';
		$request = $db->prepare($query);
		$request->execute([$numLang]);
		return($request->fetch());
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

		$query = 'SELECT * FROM langue;';
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
        $query = "SELECT * FROM langue la INNER JOIN pays pa ON la.numPays = pa.numPays";
        // prepare
        $result=$db->query($query);
        // execute
        $allLanguesByLib1Lang = $result->fetchAll();
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
	
		$requete = "SELECT MAX(numLang) AS numLang FROM langue WHERE numLang LIKE '$parmNumLang';";
	
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

			$query = 'INSERT INTO langue (numLang, lib1Lang, lib2Lang, numPays) VALUES (?, ?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert langue : ' . $e->getMessage());
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
			die('Erreur insert langue : ' . $e->getMessage());
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
			$query = 'UPDATE langue set numLang=?, lib1Lang=?, lib2Lang=?, numPays=? where numLang=? ';
			$request = $db->prepare($query);
			$request->execute([$numLang, $lib1Lang, $lib2Lang, $numPays, $id]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update langue : ' . $e->getMessage());
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
			die('Erreur delete langue : ' . $e->getMessage());
		}
	}
}	// End of class
