<?php
// CRUD MEMBRE
// ETUD
// A tester sur Blog'Art
require_once __DIR__ . '../../CONNECT/database.php';

class MEMBRE{



	function get_AllStat(){
		global $db;
	
		$query = 'SELECT * FROM STATUT;';
		$result = $db->query($query);
		$allPays = $result->fetchAll();
		return($allStat);
		}


	function get_1Membre($numMemb){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_1MembreByEmail($eMailMemb){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllMembres(){
		global $db;

		$query = 'SELECT * FROM MEMBRE;';
		$result = $db->query($query);
		$allMembres = $result->fetchAll();
		return($allMembres);
	}

	function get_ExistPseudo($pseudoMemb) {
		global $db;

		// select
		// prepare
		// execute
		return($result->rowCount());
	}

	function get_AllMembersByStat(){
		global $db;

		// select
		// prepare
		// execute
		return($allMembersByStat);
	}

	function get_NbAllMembersByidStat($idStat){
		global $db;

		// select
		// prepare
		// execute
		return($allNbMembersByStat);
	}

	function get_AllMembresByEmail($eMailMemb){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetchAll());
	}

	// Inscription membre
	function create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $dtCreaMemb, $accordMemb, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			// insert
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert MEMBRE : ' . $e->getMessage());
		}
	}

	function update($numMemb, $prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat){
		global $db;

		try {
			$db->beginTransaction();
			
			// update
			// prepare
			// execute
				$db->commit();
				$request2->closeCursor();
			}
	
		catch (PDOException $e) {
			$db->rollBack();
			if ($passMemb == -1) {
				$request1->closeCursor();
			} else {
				$request2->closeCursor();
			}
			die('Erreur update MEMBRE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur COMMENT avec del
	function delete($numMemb){
		global $db;
		
		try {
			$db->beginTransaction();

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
			die('Erreur delete MEMBRE : ' . $e->getMessage());
		}
	}
}	// End of class
