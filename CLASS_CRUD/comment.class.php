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

	// Fonction : recup??rer next num??ro s??quence de article recherch?? (PK COMMENT)
	// Commentaire suivant sur un article
	// => Pour table COMMENT & table COMMENTPLUS
	function getNextNumCom($numArt) {
		global $db;

		//r??cup id de l'article et num s??quence comment
		$queryText = "SELECT CO.numArt, MAX(numSeqCom) AS numSeqCom FROM ARTICLE AR INNER JOIN COMMENT CO ON AR.numArt = CO.numArt WHERE AR.numArt = ?;";
		$result = $db->prepare($queryText);
		$result->execute(array($numArt));

		if ($result) {
			$tuple = $result->fetch();
			$numArtCom = $tuple["numArt"];
			$numSeqCom = $tuple["numSeqCom"];
			// New comment dans COMMENT ou REPONSE pour ARTICLE
			if (is_null($numArtCom)) { // si l'id de l'article est null
				// Init no s??quence
				$numSeqCom = 1; //premi??re fois qu'on rentre un commentaire pour cet article
			} else {
			if ((!is_null($numArtCom)) AND (!is_null($numSeqCom))) { //si num de sequence existe alors num??ro de s??quence++
				// No s??quence suivant
				$numSeqCom++;
			} else {
				// Pbl coh??rence select NumArt & NumCom
				return -1;
			}
			}
			return $numSeqCom;
		}   // End of if ($result)
		else {
		return -1;  // Pbl select / bdd
		}
	} // End of function

	// comment en attente : Moderation affComOK ?? FALSE
	function create($numSeqCom, $numArt, $libCom, $numMemb){
		global $db;


		

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO comment (numSeqCom, numArt, dtCreCom, libCom, numMemb, delLogiq, attModOK, notifComKOAff) VALUES (?, ?, NOW(), ?, ?, 0, 0, "")';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt, $libCom, $numMemb]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert comment : ' . $e->getMessage());
		}
	}

	// Moderation : TRUE si comment affich??, FALSE sinon
	// et remarques possibles admin si non affich??
	function update($numSeqCom, $numArt, $attModOK, $notifComKOAff, $delLogiq){
		global $db;

		var_dump($numSeqCom);
		var_dump($numArt);
		var_dump($attModOK);
		var_dump($notifComKOAff);
		var_dump($delLogiq);
		


		try {
			$db->beginTransaction();

			$query = 'UPDATE comment set attModOK=?, dtModCom=NOW(), notifComKOAff=?, delLogiq=? where numSeqCom=? AND numArt=?';
			$request = $db->prepare($query);
			$request->execute([$attModOK, $notifComKOAff, $delLogiq, $numSeqCom, $numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update comment : ' . $e->getMessage());
		}
	}

	// Create et Update en m??me temps => Del logique du Comment
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
			die('Erreur insert Or Update comment : ' . $e->getMessage());
		}
	}

	// A priori : del comment impossible (sauf si choix admin apr??s mod??ration) => Cf. createOrUpdate() ci-dessus
	function delete($numSeqCom, $numArt){	// OU ?? utiliser pour del logique : del => update
		global $db;


		var_dump($numSeqCom);
		var_dump($numArt);

		exit;

		try {
			$db->beginTransaction();

			$query = 'UPDATE comment set attModOK=0, dtModCom=NOW(), delLogiq=1 where numSeqCom=? AND numArt=? ';
			$request = $db->prepare($query);
			$request->execute([$numSeqCom, $numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete comment : ' . $e->getMessage());
		}
	}
}	// End of class
