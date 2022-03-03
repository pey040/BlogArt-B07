<?php
// CRUD THEMATIQUE
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class THEMATIQUE{

	function get_AllLangues(){
		global $db;

		$query = 'SELECT * FROM LANGUE;';
		$result = $db->query($query);
		$allLangues = $result->fetchAll();
		return($allLangues);
	}

	function get_1Thematique($numThem){
		global $db;

		$query = 'SELECT * FROM THEMATIQUE WHERE numThem=?;';
		$request = $db->prepare($query);
		$request->execute([$numThem]);
		return($request->fetch());
	}

	function get_1ThematiqueByLang($numThem){
		global $db;

		// select
        $query = "SELECT * FROM THEMATIQUE TH INNER JOIN LANGUE LA ON TH.numLang = LA.numLang";
        // prepare
        $result=$db->query($query);
        // execute
        $result->fetchAll();
		return($result->fetch());
	}

	function get_AllThematiques(){
		global $db;

		$query = 'SELECT * FROM THEMATIQUE;';
		$result = $db->query($query);
		$allThematiques = $result->fetchAll();
		return($allThematiques);
	}

	function get_AllThematiquesByLang(){
		global $db;

		// select
        $query = "SELECT * FROM THEMATIQUE TH INNER JOIN LANGUE LA ON TH.numLang = LA.numLang";
        // prepare
        $result=$db->query($query);
        // execute
        $allThematiquesByLang = $result->fetchAll();
		return($allThematiquesByLang);
	}

	function get_NbAllThematiquesBynumLang($numLang){
		global $db;

		// select
		// prepare
		// execute
		return($allNbThematiquesBynumLang);
	}

	// Récup dernière PK NumThem
	function getNextNumThem($numThem) {
		global $db;
	
		// Découpage FK LANGUE
		$libThemSelect = substr($numThem, 0, 4);
		$parmNumThem = $libThemSelect . '%';
	
		$requete = "SELECT MAX(numThem) AS numThem FROM THEMATIQUE WHERE numThem LIKE '$parmNumThem';";
		$result = $db->query($requete);
	
		if ($result) {
			$tuple = $result->fetch();
			$numThem = $tuple["numThem"];
			if (is_null($numThem)) {    // New lang dans THEMATIQUE
				// Récup dernière PK utilisée
				$requete = "SELECT MAX(numThem) AS numThem FROM THEMATIQUE;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numThem = $tuple["numThem"];
	
				$numThemSelect = (int)substr($numThem, 4, 2);
				// No séquence suivant LANGUE
				$numSeq1Them = $numThemSelect + 1;
				// Init no séquence THEMATIQUE pour nouvelle lang
				$numSeq2Them = 1;
			} else {
				// Récup dernière PK pour FK sélectionnée
				$requete = "SELECT MAX(numThem) AS numThem FROM THEMATIQUE WHERE numThem LIKE '$parmNumThem' ;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numThem = $tuple["numThem"];
	
				// No séquence actuel LANGUE
				$numSeq1Them = (int)substr($numThem, 4, 2);
				// No séquence actuel LANGUE
				$numSeq2Them = (int)substr($numThem, 6, 2);
				// No séquence suivant THEMATIQUE
				$numSeq2Them++;
			}
	
			$libThemSelect = "THEM";
			// PK reconstituée : THE + no seq langue
			if ($numSeq1Them < 10) {
				$numThem = $libThemSelect . "0" . $numSeq1Them;
			} else {
				$numThem = $libThemSelect . $numSeq1Them;
			}
			// PK reconstituée : THE + no seq langue + no seq thématique
			if ($numSeq2Them < 10) {
				$numThem = $numThem . "0" . $numSeq2Them;
			} else {
				$numThem = $numThem . $numSeq2Them;
			}
		}   // End of if ($result) / no seq LANGUE
		return $numThem;
	} // End of function

	function create($numThem, $libThem, $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO Thematique (numThem, libThem, numLang) VALUES (?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$numThem, $libThem, $numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert THEMATIQUE : ' . $e->getMessage());
		}
	}

	function update($numThem, $libThem, $numLang, $id){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE THEMATIQUE set numThem=?, libThem=?, numLang=? where numThem=? ';
			$request = $db->prepare($query);
			$request->execute([$numThem, $libThem, $numLang, $id]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update THEMATIQUE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
	function delete($numThem){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'DELETE FROM THEMATIQUE where numThem=?;';
			$request = $db->prepare($query);
			$request->execute([$numThem]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete THEMATIQUE : ' . $e->getMessage());
		}
	}

	function TestIfThem($numThem, $table) {
		global $db;
		try {
			$db->beginTransaction();

			$query = 'SELECT * FROM '.$table.' where numThem=?';
			$request = $db->prepare($query);
			$request->execute([$numThem]);
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

	function ThemExist($numThem) {
		return 0==(
			$this->TestIfThem($numThem, "article")
			);

	}
}		// End of class
