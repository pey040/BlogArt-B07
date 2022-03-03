<?php
// CRUD ARTICLE
// ETUD
require_once __DIR__ . '/../connect/database.php';

class ARTICLE{

	// function get_AllLangues(){
	// 	global $db;

	// 	$query = 'SELECT * FROM LANGUE;';
	// 	$result = $db->query($query);
	// 	$allLangues = $result->fetchAll();
	// 	return($allLangues);
	// }
	
	function get_AllThematiques(){
		global $db;

		$query = 'SELECT * FROM thematique;';
		$result = $db->query($query);
		$allThematiques = $result->fetchAll();
		return($allThematiques);
	}

	function get_AllAngles() {
		global $db;

		$query = 'SELECT * FROM angle;';
		$result = $db->query($query);
		$allAngles = $result->fetchAll();
		return($allAngles);
	}

	function get_1Article($numArt){
		global $db;
		
		$query = 'SELECT * FROM article WHERE numArt=?;';
		$request = $db->prepare($query);
		$request->execute([$numArt]);
		$oneArticle = $request->fetch();
		return($oneArticle);
	}

	function get_1ArticleAnd3FK($numArt){
		global $db;

		// select
		// prepare
		// execute
		return($result->fetch());
	}

	function get_AllArticles(){
		global $db;

		$query = 'SELECT * FROM article;';
		$result = $db->query($query);
		$allArticles = $result->fetchAll();
		return($allArticles);
	}


	function get_AllArticlesByNumAnglNumThem(){
		global $db;

		// select
        $query = "SELECT * FROM article ar , angle an , thematique th WHERE ar.numAngl = an.numAngl AND ar.numThem = th.numThem";
        // prepare
        $result=$db->query($query);
        // execute
        $allArticlesByNumAnglNumThem = $result->fetchAll();
		return($allArticlesByNumAnglNumThem);
	}

	function get_NbAllArticlesByNumAngl($numAngl){
		global $db;

		// select
		// prepare
		// execute
		return($allNbArticlesBynumAngl);
	}

	function get_NbAllArticlesByNumThem($numThem){
		global $db;

		// select
		// prepare
		// execute
		return($allNbArticlesBynumThem);
	}

	// Barre de recherche CONCAT : mots clés dans ARTICLE & THEMATIQUE
	function get_ArticlesByMotsCles($motcle){
		global $db;

		// Recherche plusieurs mots clés (CONCAT)
		$textQuery = 'SELECT * FROM article ar INNER JOIN thematique th ON ar.numThem = th.numThem WHERE CONCAT(libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, libThem) LIKE "%'.$motcle.'%" ORDER BY numArt DESC';
		$result = $db->query($textQuery);
		$allArticlesByMotsCles = $result->fetchAll();
		return($allArticlesByMotsCles);
	}

	// Barre de recherche JOIN : mots clés par MOTCLE (TJ) dans ARTICLE
	function get_MotsClesByArticles($listMotcles){
		global $db;

		/*
		Requete avec IN :
		SELECT * FROM MOTCLE WHERE libMotCle IN ('Bordeaux', 'bleu');
		*/
		// Recherche mot clé (INNER JOIN) dans tables MOTCLE & (ARTICLE)
		$textQuery = 'SELECT ar.numArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt FROM motcle mc INNER JOIN motclearticle mca ON mc.numMotCle = mca.numMotCle INNER JOIN article ar ON mca.numArt = ar.numArt WHERE libMotCle IN (' . $listMotcles . ');';
		$result = $db->prepare($textQuery);
		$result->execute([$listMotcles]);
		$allArticlesByNumAnglNumThem = $result->fetchAll();
		return($allArticlesByNumAnglNumThem);
	}

	// Fonction pour recupérer la prochaine PK de la table ARTICLE
	function getNextNumArt() {
		global $db;

		$requete = "SELECT MAX(numArt) AS numArt FROM article;";
		$result = $db->query($requete);

		if ($result) {
			$tuple = $result->fetch();
			$numArt = $tuple["numArt"];
			// No PK suivante ARTICLE
			$numArt++;
		}   // End of if ($result)
		return $numArt;
	} // End of function

	// Fonction pour recupérer la dernière PK de ARTICLE
	// avant insert des n occurr dans TJ MOTCLEARTICLE
	function get_LastNumArt(){
		global $db;

		$requete = "SELECT MAX(numArt) AS numArt FROM article;";
		$result = $db->query($requete);

		if ($result) {
			$tuple = $result->fetch();
			$lastNumArt = $tuple["numArt"];

		}   // End of if ($result)
		return $lastNumArt;
	} // End of function

	function create($dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO article (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numAngl, numThem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
			$request = $db->prepare($query);
			$request->execute([$dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert article : ' . $e->getMessage());
		}
	}

	function testcreate($urlPhotArt, $numAngl, $numThem){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'INSERT INTO article (dtCreArt, libTitrArt, libChapoArt, libAccrochArt, parag1Art, libSsTitr1Art, parag2Art, libSsTitr2Art, parag3Art, libConclArt, urlPhotArt, numAngl, numThem) VALUES (NOW(), "Test", "Test", "Test", "Test", "Test", "Test", "Test", "Test", "Test", ?, ?, ?);';
			$request = $db->prepare($query);
			$request->execute([$urlPhotArt, $numAngl, $numThem]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur insert article : ' . $e->getMessage());
		}
	}

	function update($numArt, $dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE article set dtCreArt=?, libTitrArt=?, libChapoArt=?, libAccrochArt=?, parag1Art=?, libSsTitr1Art=?, parag2Art=?, libSsTitr2Art=?, parag3Art=?, libConclArt=?, urlPhotArt=?, numAngl=?, numThem=? where numArt=? ';
			$request = $db->prepare($query);
			$request->execute([$dtCreArt, $libTitrArt, $libChapoArt, $libAccrochArt, $parag1Art, $libSsTitr1Art, $parag2Art, $libSsTitr2Art, $parag3Art, $libConclArt, $urlPhotArt, $numAngl, $numThem, $numArt]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update article : ' . $e->getMessage());
		}
	}

	function testupdate($urlPhotArt, $numAngl, $numThem, $id){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'UPDATE article set urlPhotArt=?, numAngl=?, numThem=? where numArt=? ';
			$request = $db->prepare($query);
			$request->execute([$urlPhotArt, $numAngl, $numThem, $id]);
			$db->commit();
			$request->closeCursor();
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur update article : ' . $e->getMessage());
		}
	}

	function delete($numArt){
		global $db;

		try {
			$db->beginTransaction();

			$query = 'DELETE FROM article where numArt=?;';
			$request = $db->prepare($query);
			$request->execute([$numArt]);
			$count = $request->rowCount();
			$db->commit();
			$request->closeCursor();
			return($count);
		}
		catch (PDOException $e) {
			$db->rollBack();
			$request->closeCursor();
			die('Erreur delete article : ' . $e->getMessage());
		}
	}
}	// End of class
