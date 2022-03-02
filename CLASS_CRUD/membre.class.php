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
		$allStat = $result->fetchAll();
		return($allStat);
		}


	function get_1Membre($numMemb){
		global $db;


		$query = 'SELECT * FROM MEMBRE WHERE numMemb=?;';
		$request = $db->prepare($query);
		$request->execute([$numMemb]);
		return($request->fetch());
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
	function create($prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $accordMemb, $idStat){
		global $db;


		try {
			$db->beginTransaction();

			$query = 'INSERT INTO MEMBRE (prenomMemb, nomMemb, pseudoMemb, passMemb, eMailMemb, dtCreaMemb, accordMemb, idStat) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$prenomMemb, $nomMemb, $pseudoMemb, $passMemb, $eMailMemb, $accordMemb, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert MEMBRE : ' . $e->getMessage());
		}
	}

	function update($prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat, $accordMemb, $num){
		global $db;

		try {
			$db->beginTransaction();
			
			$query = 'UPDATE MEMBRE set prenomMemb="?", nomMemb="?", passMemb="?", eMailMemb="?", idStat="?", accordMemb="?" where numMemb="?" ';
			$request = $db->prepare($query);
			$request->execute([$prenomMemb, $nomMemb, $passMemb, $eMailMemb, $idStat, $accordMemb, $num]);
				$db->commit();
				$request->closeCursor();
			}
	
		catch (PDOException $e) {
			$db->rollBack();
			if ($passMemb == -1) {
				$request1->closeCursor();
			} else {
				$request->closeCursor();
			}
			die('Erreur update MEMBRE : ' . $e->getMessage());
		}
	}

	// Ctrl FK sur COMMENT avec del
	function delete($numMemb){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'DELETE FROM Membre where numMemb=?;';
			$request = $db->prepare($query);
			$request->execute([$numMemb]);
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

	function TestIfMemb($numMemb, $table) {
		global $db;
		try {
			$db->beginTransaction();

			$query = 'SELECT * FROM '.$table.' where numMemb=?';
			$request = $db->prepare($query);
			$request->execute([$numMemb]);
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

	function MembExist($numMemb) {
		return 0==(
			$this->TestIfMemb($numMemb, "comment")+
			$this->TestIfMemb($numMemb, "likecom")+
			$this->TestIfMemb($numMemb, "likeart")
			);
}		// End of class
}	// End of class
