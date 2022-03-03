<?php
////////////////////////////////////////////////////////////
//
//  Gestion des CRUD (PDO) - Modifié : 14 Juillet 2021
//
//  Script  : index1.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/util/utilErrOn.php';
// require_once ('AllFront/header.php');
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <title>Gestion des CRUD</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text&display=swap" rel="stylesheet">


    <style type="text/css">
		:root{
			--white: #F6F6F6;
			--blue: #7E8ACF;
			--gold: #FCC967;
			--grey: #56504D;
			--black: #000000;
		}
		
		body{
			font-family: 'Spartan', serif;
			font-weight: lighter;
			color: var(--grey);
		}

		div {
			padding-top: 60px;
			padding-bottom: 40px;
			margin-bottom: 0px;
			display: flex;
		}
        /* span {
            background-color: yellow;
        } */

		a{
			/* background-color: red; */
			text-align: center;
			margin: 20px;
			padding: 20px;
		}

		a:visited{
			color: var(--grey);
		}

		hr {
			border: none;
			height: 3px;
			/* Set the hr color */
			color: var(--grey); /* old IE */
			background-color: #333; /* Modern Browsers */
		}
		.hr1 {
			width: 60%;
			background-color: #CCCCCC;	/* => grey */
		}

		/* GRID CONTAINER AND ITEM */
		.grid-container {
			display: grid;
			grid-template-columns: 1fr 1fr 1fr;
		}
		

		.grid-item {
			text-align: center;
			display: flex;
			flex-direction: column;
			/* justify-content: space-between; */
			padding: 10px;
			margin: 6%;
			
		}
		
		.element{
			background-color: var(--gold);
			color: var(--grey);
			margin: 30px;
		}

		.recherche a{
			background-color: var(--blue);
			padding: 10px;
			color: var(--grey);
		}


		
    </style>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"></script>
</head>

<body>
	<br />
	<h1>Panneau d'Admin : CRUD</h1>
	<!-- <small><span><i>CRUD fini et valide</i></span></small> -->
	<!-- <br /><br /><hr /> -->
	<p>
		<!-- <h2>Connexion...</h2> -->
	</p>
	<hr class="hr1" />
	<div class="grid-container">
		<div class="grid-item">
		<a class="element" href="./BACK/angle/angle.php"><span>Angle</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/article/article.php"><span>Article</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/comment/comment.php"><span>Commentaire</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/commentplus/commentplus.php">Réponse sur Commentaire</a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/langue/langue.php"><span>Langue</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/likeart/likeart.php"><span>Like Article</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/likecom/likecom.php"><span>Like Commentaire</span></a>
		<br /><br />
		</div>
		
		
		
		
		
		
	<!-- Membre (*) - reCaptcha à ajouter -->
		<div class="grid-item">
		<a class="element" href="./BACK/membre/membre.php"><span>Membre</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/motcle/motcle.php"><span>Mot-clé</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="#">Mot-clé Article => dans Article</a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/statut/statut.php"><span>Statut</span></a>
		<br /><br />
		</div>
		<div class="grid-item">
		<a class="element" href="./BACK/thematique/thematique.php"><span>Thématique</span></a>
		<br /><br />
		</div>
		
		
	
		
	<!-- User (*) - reCaptcha à ajouter -->
		<div class="grid-item"></div>
		<div class="grid-item">
		<a class="element" href="./BACK/user/user.php"><span>User</span></a>
		<br /><br /><hr class="hr1" /><br />
		</div>
		<div class="grid-item"></div>
	</div>

	"RECHERCHE" ici
	<!-- <item class="recherche">
		Barre de recherche :
		<a href="./SearchBar/barreF2.php"><span>CONCAT : Un SEUL Mot clé dans articles </span></a>
		<br>(F1 en GET)
		<br /><br /> <br>
	</item>
	<item class="recherche">
		Barre de recherche :
		<a href="./SearchBar/barreCONCAT.php"><span>CONCAT : Mots clés dans articles & thématiques</span></a>
		<br /><br /><br>
	</item>
	<item class="recherche">
		Barre de recherche :
		<a href="./SearchBar/barreJOIN.php"><span>JOIN : Liste des Mots clés par article</span></a>
		<br /><br /><br>
	</item>
	<item class="recherche">
		Barre de recherche :
		<a href="./SearchBar/barreLes2.php"><span>Les 2 (CONCAT, JOIN) : Mots clés dans articles, thématiques & liste des Mots clés par article</span></a>
		<br /><br /><br>
	</item> -->
	

		
		
	
<?php
require_once __DIR__ . '/footeradmin.php';
// require_once ('AllFront/footer.php');
?>
</body>
</html>



<!-- <body>
	<br />
	<h1>Panneau d'Admin : CRUD - BLOGART22 (ETUD)</h1>
	<small><span><i>CRUD fini et valide (reste à intégrer et à tester)</i></span></small>
	<br /><br /><hr />
	<p>
		<h2>Connexion...</h2>
	</p>
	<hr class="hr1" />
	<div>
	CRUD :
	<a href="./BACK/angle/angle.php"><span>Angle (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/article/article.php"><span>Article (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/comment/comment.php"><span>Commentaire (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/commentplus/commentplus.php">Réponse sur Commentaire</a>
	<br /><br />
	CRUD :
	<a href="./BACK/langue/langue.php"><span>Langue (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/likeart/likeart.php"><span>Like Article (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/likecom/likecom.php"><span>Like Commentaire (*)</span></a>
	<br /><br />
Membre (*) - reCaptcha à ajouter -->
	<!-- CRUD :
	<a href="./BACK/membre/membre.php"><span>Membre (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/motcle/motcle.php"><span>Mot-clé (*)</span></a>
	<br /><br />
	CRUD :
	<a href="#">Mot-clé Article => dans Article</a>
	<br /><br />
	CRUD :
	<a href="./BACK/statut/statut.php"><span>Statut (*)</span></a>
	<br /><br />
	CRUD :
	<a href="./BACK/thematique/thematique.php"><span>Thématique (*)</span></a>
	<br /><br />
 User (*) - reCaptcha à ajouter -->
	<!-- CRUD :
	<a href="./BACK/user/user.php"><span>User (*)</span></a>
	<br /><br /><hr class="hr1" /><br />
	Barre de recherche :
	<a href="./SearchBar/barreF2.php"><span>CONCAT : Un SEUL Mot clé dans articles (*)</span></a>
	<br>(F1 en GET)
	<br /><br />
	Barre de recherche :
	<a href="./SearchBar/barreCONCAT.php"><span>CONCAT : Mots clés dans articles & thématiques (*)</span></a>
	<br /><br />
	Barre de recherche :
	<a href="./SearchBar/barreJOIN.php"><span>JOIN : Liste des Mots clés par article (*)</span></a>
	<br /><br />
	Barre de recherche :
	<a href="./SearchBar/barreLes2.php"><span>Les 2 (CONCAT, JOIN) : Mots clés dans articles, thématiques & liste des Mots clés par article (*)</span></a>
	<br /><br />
	</div> --> 


