<?php
// CRUD COMMENT
// ETUD
require_once __DIR__ . '../../connect/database.php';

class COMMENT{

	function get_AllArticles(){
		global $db;

		$query = 'SELECT * FROM ARTICLE;';
		$result = $db->query($query);
		$allArticles = $result->fetchAll();
		return($allArticles);
	}

	function get_AllMembres(){
		global $db;

		$query = 'SELECT * FROM MEMBRE;';
		$result = $db->query($query);
		$allMembres = $result->fetchAll();
		return($allMembres);
	}

	function get_1Comment($numSeqCom, $numArt){
		global $db;

		$query = 'SELECT * FROM COMMENT WHERE numSeqCom=? AND numArt=?;';
		$request = $db->prepare($query);
		$request->execute([$numSeqCom, $numArt]);
		return($request->fetch());
	}

	function get_AllComment(){
		global $db;

		$query = 'SELECT * FROM COMMENT;';
		$result = $db->query($query);
		$allComments = $result->fetchAll();
		return($allComments);
	}

	function get_AllCommentByArticle($numArt){
		global $db;

		// // select
        // $query = "SELECT * FROM COMMENT CO INNER JOIN ARTICLE AR ON CO.numArt= AR.numArt";
        // // prepare
        // $result=$db->query($query);
        // // execute
        // $result->fetchAll();
		return($result->fetchAll());
	}

	function get_AllCommentsByNumArt($numArt){
		global $db;

		// select
        $query = "SELECT * FROM COMMENT CO INNER JOIN ARTICLE AR ON CO.numArt= AR.numArt";
        // prepare
        $result=$db->query($query);
        // execute
        $allCommentsByArt = $result->fetchAll();
		return($allCommentsByArt);
	}

	function get_1CommentsByNumSeqComNumArt($numSeqCom, $numArt){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllCommentsByNumSeqComNumArt($numSeqCom, $numArt){
		global $db;

		// select
		// prepare
		// execute
		return($allCommentsByNumSeqComNumArt);
	}

	function get_AllCommentsByArticleByMemb(){
		global $db;

		// select
        $query = "SELECT * FROM COMMENT CO , ARTICLE AR , MEMBRE ME WHERE CO.numArt = AR.numArt AND CO.numMemb = ME.numMemb";
        // prepare
        $result=$db->query($query);
        // execute
        $allCommentsByArticleByMemb = $result->fetchAll();
		return($allCommentsByArticleByMemb);
	}

	function get_NbAllCommentsBynumMemb($numMemb){
		global $db;

		// select
		// prepare
		// execute
		return($allNbAllCommentsBynumMemb);
	}

	function get_1Pseudo($numMemb)
	{
		global $db;

		$query = 'SELECT * FROM MEMBRE WHERE numMemb=?;';
		$request = $db->prepare($query);
		$request->execute([$numMemb]);
		return ($request->fetch());
	}

	// Fonction : recupérer next numéro séquence de article recherché (PK COMMENT)
	// Commentaire suivant sur un article
	// => Pour table COMMENT & table COMMENTPLUS
	function getNextNumCom($numArt) {
		global $db;

		//récup id de l'article et num séquence comment
		$queryText = "SELECT CO.numArt, MAX(numSeqCom) AS numSeqCom FROM ARTICLE AR INNER JOIN COMMENT CO ON AR.numArt = CO.numArt WHERE AR.numArt = ?;";
		$result = $db->prepare($queryText);
		$result->execute(array($numArt));

		if ($result) {
			$tuple = $result->fetch();
			$numArtCom = $tuple["numArt"];
			$numSeqCom = $tuple["numSeqCom"];
			// New comment dans COMMENT ou REPONSE pour ARTICLE
			if (is_null($numArtCom)) { // si l'id de l'article est null
				// Init no séquence
				$numSeqCom = 1; //première fois qu'on rentre un commentaire pour cet article
			} else {
			if ((!is_null($numArtCom)) AND (!is_null($numSeqCom))) { //si num de sequence existe alors numéro de séquence++
				// No séquence suivant
				$numSeqCom++;
			} else {
				// Pbl cohérence select NumArt & NumCom
				return -1;
			}
			}
			return $numSeqCom;
		}   // End of if ($result)
		else {
		return -1;  // Pbl select / bdd
		}
	} // End of function

	// comment en attente : Moderation affComOK à FALSE
	function create($numSeqCom, $numArt, $libCom, $numMemb){
		global $db;


		

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO COMMENT (numSeqCom, numArt, dtCreCom, libCom, numMemb, delLogiq, attModOK, notifComKOAff) VALUES (?, ?, NOW(), ?, ?, 0, 0, "")';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $libCom, $numMemb]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert COMMENT : ' . $e->getMessage());
		}
	}

	// Moderation : TRUE si comment affiché, FALSE sinon
	// et remarques possibles admin si non affiché
	function update($numSeqCom, $numArt, $attModOK, $notifComKOAff, $delLogiq){
		global $db;

		var_dump($numSeqCom);
		var_dump($numArt);
		var_dump($attModOK);
		var_dump($notifComKOAff);
		var_dump($delLogiq);
		


		try {
			$db->beginTransaction();

			$query = 'UPDATE COMMENT set attModOK=?, dtModCom=NOW(), notifComKOAff=?, delLogiq=? where numSeqCom=? AND numArt=?';
			$request = $db->prepare($query);
			$request->execute([$attModOK, $notifComKOAff, $delLogiq, $numSeqCom, $numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update COMMENT : ' . $e->getMessage());
		}
	}

	// Create et Update en même temps => Del logique du Comment
	function createOrUpdate($numSeqCom, $numArt){
		global $db;

		try {
			$db->beginTransaction();

			// insert / update
			// prepare
			// execute
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert Or Update COMMENT : ' . $e->getMessage());
		}
	}

	// A priori : del comment impossible (sauf si choix admin après modération) => Cf. createOrUpdate() ci-dessus
	function delete($numSeqCom, $numArt){	// OU à utiliser pour del logique : del => update
		global $db;


		var_dump($numSeqCom);
		var_dump($numArt);

		exit;

		try {
			$db->beginTransaction();

			$query = 'UPDATE COMMENT set attModOK=0, dtModCom=NOW(), delLogiq=1 where numSeqCom=? AND numArt=? ';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete COMMENT : ' . $e->getMessage());
		}
	}
}	// End of class
