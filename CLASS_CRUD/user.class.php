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

		$query = 'SELECT * FROM user;';
		$result = $db->query($query);
		$allUsers = $result->fetchAll();
		return($allUsers);
	}

	// Inutile car la PK (pseudo, pass) est forcément unique
	function get_ExistPseudo($pseudoUser) {
		global $db;

		$query = 'SELECT * FROM user WHERE pseudoUser = ?;';
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

			$query = 'INSERT INTO user (pseudoUser, passUser, nomUser, prenomUser, emailUser, idStat) VALUES (?, ?, ?, ?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert user : ' . $e->getMessage());
		}
	}

	function update($pseudoUser, $passUser, $nomUser, $prenomUser, $emailUser, $idStat){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE user set passUser=?, nomUser=?, prenomUser=?, emailUser=?, idStat=? where pseudoUser=? ';
			$request = $db->prepare($query);
			$request->execute([$passUser, $nomUser, $prenomUser, $emailUser, $idStat, $pseudoUser]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update user : ' . $e->getMessage());
		}
	}

	function delete($pseudoUser){
		global $db;
		
		try {
			$db->beginTransaction();

			$query = 'DELETE FROM thematique where numThem=?;';
			$request = $db->prepare($query);
			$request->execute([$pseudoUser]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete user : ' . $e->getMessage());
		}
	}
}	// End of class
