<?php
// CRUD MOTCLE
// ETUD
require_once __DIR__ . '../../connect/database.php';

class MOTCLE{

	 function get_AllLangues(){
		global $db;

	 	$query = 'SELECT * FROM LANGUE;';
	 	$result = $db->query($query);
	 	$allLangues = $result->fetchAll();
	 	return($allLangues);
	 }

	function get_1MotCle($numMotCle){
		global $db;

		$query = 'SELECT * FROM MOTCLE WHERE numMotCle=?;';
		$request = $db->prepare($query);
		$request->execute([$numMotCle]);
		return($request->fetch());
	}

	function get_1MotCleByLang($numMotCle){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllMotCles(){
		global $db;

		$query = 'SELECT * FROM MOTCLE;';
		$result = $db->query($query);
		$allMotCles = $result->fetchAll();
		return($allMotCles);
	}

	function get_AllMotsClesByLang(){
		global $db;

		// select
        $query = "SELECT * FROM MOTCLE MO INNER JOIN LANGUE LA ON MO.numLang = LA.numLang";
        // prepare
        $result=$db->query($query);
        // execute
        $allMotsClesByLang = $result->fetchAll();
		return($allMotsClesByLang);
	}

	function get_NbAllMotsClesBynumLang($numLang){
		global $db;

		// select
		// prepare
		// execute
		return($allNbMotsClesBynumLang);
	}

	// Sortir mots clés déjà sélectionnés dans MOTCLE (TJ) dans ARTICLE
	// ppour le drag and drop
	function get_MotsClesNotSelect($listNumMotcles) {
		global $db;

		/*
		Pour numArt = 1 :
		SELECT numMotCle, libMotCle FROM MOTCLE WHERE numMotCle NOT IN (1, 6, 8, 9, 10, 11, 12, 13);
		*/
		// Recherche mot clé (INNER JOIN) dans tables MOTCLEARTICLE
		$textQuery = 'SELECT numMotCle, libMotCle FROM MOTCLE WHERE numMotCle NOT IN (' . $listNumMotcles . ');';
		$result = $db->prepare($textQuery);
		$result->execute([$listNumMotcles]);
		$allMotsClesNotSelect = $result->fetchAll();
		return($allMotsClesNotSelect);
	}

	// Récupérer next PK de la table MOTCLE
	function getNextNumMotCle($numMotCle) {
		global $db;
	
		// Découpage FK LANGUE
		$libMotCleSelect = substr($numMotCle, 0, 4);
		$parmNumMotCle = $libMotCleSelect . '%';
	
		$requete = "SELECT MAX(numMotCle) AS numMotCle FROM MOTCLE WHERE numMotCle LIKE '$parmNumMotCle';";
		$result = $db->query($requete);
	
		if ($result) {
			$tuple = $result->fetch();
			$numMotCle = $tuple["numMotCle"];
			if (is_null($numMotCle)) {    // New lang dans MOTCLE
				// Récup dernière PK utilisée
				$requete = "SELECT MAX(numMotCle) AS numMotCle FROM MOTCLE;";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numMotCle = $tuple["numMotCle"];
	
				$numMotCleSelect = (int)substr($numMotCle, 4, 2);
				// No séquence suivant LANGUE
				$numSeq1MotCle = $numMotCleSelect + 1;
				// Init no séquence MOTCLE pour nouvelle lang
				$numSeq2MotCle = 1;
			} else {
				// Récup dernière PK pour FK sélectionnée
				$requete = "SELECT MAX(numMotCle) AS numMotCle FROM MOTCLE WHERE numLang LIKE '$parmNumMotCle';";
				$result = $db->query($requete);
				$tuple = $result->fetch();
				$numMotCle = $tuple["numMotCle"];
	
				// No séquence actuel LANGUE
				$numSeq1MotCle = (int)substr($numMotCle, 4, 2);
				// No séquence actuel MOTCLE
				$numSeq2MotCle = (int)substr($numMotCle, 6, 2);
				// No séquence suivant MOTCLE
				$numSeq2MotCle++;
			}
	
			$libMotCleSelect = "MTCL";
			// PK reconstituée : MTCL + no seq langue
			if ($numSeq1MotCle < 10) {
				$numMotCle = $libMotCleSelect . "0" . $numSeq1MotCle;
			} else {
				$numMotCle = $libMotCleSelect . $numSeq1MotCle;
			}
			// PK reconstituée : MOCL + no seq langue + no seq mot clé
			if ($numSeq2MotCle < 10) {
				$numMotCle = $numMotCle . "0" . $numSeq2MotCle;
			} else {
				$numMotCle = $numMotCle . $numSeq2MotCle;
			}
		}   // End of if ($result) / no seq LANGUE
		return $numMotCle;
	} // End of function

	function create($libMotCle, $numLang){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO MOTCLE (libMotCle, numLang) VALUES (?, ?)';
			$request = $db->prepare($query);
			$request->execute([$libMotCle, $numLang]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert MOTCLE : ' . $e->getMessage());
		}
	}

	function update($libMotCle, $numLang, $id){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE MOTCLE set libMotCle=?, numLang=? where numMotCle=? ';
			$request = $db->prepare($query);
			$request->execute([$libMotCle, $numLang, $id]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update MOTCLE : ' . $e->getMessage());
		}
	}

	function delete($numMotCle){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'DELETE FROM MOTCLE where numMotCle=?;';
			$request = $db->prepare($query);
			$request->execute([$numMotCle]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete MOTCLE : ' . $e->getMessage());
		}
	}

	function TestIfMotCle($numMotCle, $table) {
		global $db;
		try {
			$db->beginTransaction();

			$query = 'SELECT * FROM '.$table.' where numMotCle=?';
			$request = $db->prepare($query);
			$request->execute([$numMotCle]);
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


	function MotCleExist($numMotCle) {
		return 0==(
			$this->TestIfMotCle($numMotCle, "motclearticle")
			);

	}
}	// End of class
