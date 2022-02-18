<?php
// CRUD ANGLE
// ETUD
require_once __DIR__ . '../../CONNECT/database.php';

class ANGLE{

	function get_AllLangues(){
		global $db;

		$query = 'SELECT * FROM LANGUE;';
		$result = $db->query($query);
		$allLangues = $result->fetchAll();
		return($allLangues);
	}

	function get_1Angle(string $numAngl) {
		global $db;


		$query = 'SELECT * FROM ANGLE WHERE numAngl=?;';
		$request = $db->prepare($query);
		$request->execute([$numAngl]);
		return($request->fetch());
	}

	function get_1AngleByLang(string $numAngl) {
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllAngles() {
		global $db;

		$query = 'SELECT * FROM ANGLE;';
		$result = $db->query($query);
		$allAngles = $result->fetchAll();
		return($allAngles);
	}

	function get_AllAnglesByLang() {
		global $db;

		// select
		// prepare
		// execute
		return($allAnglesByLang);
	}

	function get_NbAllAnglesBynumLang(string $numLang) {
		global $db;

		// select
		// prepare
		// execute
		return($allNbAnglesBynumLang);
	}

	//  Récupérer la prochaine PK de la table ANGLE
	function getNextNumAngl($numAngl) {
		global $db;
	
		// Découpage FK LANGUE
		$libAnglSelect = substr($numAngl, 0, 4);
		$parmNumAngl = $libAnglSelect . '%';
	
		$requete = "SELECT MAX(numAngl) AS numAngl FROM ANGLE WHERE numAngl LIKE '$parmNumAngl';";
		$result = $db->query($requete);
	
		if ($result) {
			$tuple = $result->fetch();
			$numAngl = $tuple["numAngl"];
			if (is_null($numAngl)) {    // New lang dans ANGLE
				// Récup dernière PK utilisée
				$requete = "SELECT MAX(numAngl) AS numAngl FROM ANGLE;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numAngl = $tuple["numAngl"];
	
				$numAnglSelect = (int)substr($numAngl, 4, 2);
				// No séquence suivant LANGUE
				$numSeq1Angl = $numAnglSelect + 1;
				// Init no séquence ANGLE pour nouvelle lang
				$numSeq2Angl = 1;
			} else {
				// Récup dernière PK pour FK sélectionnée
				$requete = "SELECT MAX(numAngl) AS numAngl FROM ANGLE WHERE numAngl LIKE '$parmNumAngl' ;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numAngl = $tuple["numAngl"];
	
				// No séquence actuel LANGUE
				$numSeq1Angl = (int)substr($numAngl, 4, 2);
				// No séquence actuel LANGUE
				$numSeq2Angl = (int)substr($numAngl, 6, 2);
				// No séquence suivant ANGLE
				$numSeq2Angl++;
			}
	
			$libAnglSelect = "ANGL";
			// PK reconstituée : ANGL + no seq langue
			if ($numSeq1Angl < 10) {
				$numAngl = $libAnglSelect . "0" . $numSeq1Angl;
			} else {
				$numAngl = $libAnglSelect . $numSeq1Angl;
			}
			// PK reconstituée : ANGL + no seq langue + no seq angle
			if ($numSeq2Angl < 10) {
				$numAngl = $numAngl . "0" . $numSeq2Angl;
			} else {
				$numAngl = $numAngl . $numSeq2Angl;
			}
		}   // End of if ($result) / no seq angle
		return $numAngl;
	} // End of function

	function create(string $numAngl, string $libAngl, string $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO Angle (numAngl, libAngl, numLang) VALUES (?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$numAngl, $libAngl, $numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert ANGLE : ' . $e->getMessage());
		}
	}

	function update(string $numAngl, string $libAngl, string $numLang, $id){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE ANGLE set numAngl=?, libAngl=?, numLang=? where numAngl=? ';
			$request = $db->prepare($query);
			$request->execute([$numAngl, $libAngl, $numLang, $id]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update ANGLE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur THEMATIQUE, ANGLE, MOTCLE avec del
	function delete(string $numAngl){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'DELETE FROM ANGLE where numAngl=?;';
			$request = $db->prepare($query);
			$request->execute([$numAngl]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete ANGLE : ' . $e->getMessage());
		}
	}

	function TestIfAngl($numAngl, $table) {
		global $db;
		try {
			$db->beginTransaction();

			$query = 'SELECT * FROM '.$table.' where numAngl=?';
			$request = $db->prepare($query);
			$request->execute([$numAngl]);
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

	function AnglExist($numAngl) {
		return 0==(
			$this->TestIfAngl($numAngl, "article")
			);
}		// End of class
}