<?php
// CRUD USER
// ETUD
require_once __DIR__ . '../../connect/database.php';

class USER{
	function get_1User($pseudoUser, $passUser){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllUsers(){
		global $db;

		$query = 'SELECT * FROM USER;';
		$result = $db->query($query);
		$allUsers = $result->fetchAll();
		return($allUsers);
	}

	// Inutile car la PK (pseudo, pass) est forcément unique
	function get_ExistPseudo($pseudoUser) {
		global $db;

		$query = 'SELECT * FROM USER WHERE pseudoUser = ?;';
		$result = $db->prepare($query);
		$result->execute(array($pseudoUser));
		return($result->rowCount());
	}

	function get_AllUsersByStat(){
		global $db;

		// select
		// prepare
		// execute
		return($allUsersByStat);
	}

	function get_NbAllUsersByidStat($idStat){
		global $db;

		// select
		// prepare
		// execute
		return($allNbUsersByStat);
	}

	function create($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
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
			die('Erreur insert USER : ' . $e->getMessage());
		}
	}

	function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			// update
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update USER : ' . $e->getMessage());
		}
	}

	function delete($pseudoUser, $passUser){
		global $db;
		
		try {
			$db->beginTransaction();

			// delete
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete USER : ' . $e->getMessage());
		}
	}
}	// End of class
