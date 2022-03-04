<?php
////////////////////////////////////////////////////////////
//
//  CRUD USER (PDO) - Modifié : 4 juillet 2021
//
//  Script  : user.php  -  (ETUD)  BLOGART22
//
////////////////////////////////////////////////////////////

// Mode DEV
require_once __DIR__ . '/../../util/utilErrOn.php';

// controle des saisies du formulaire
require_once __DIR__ . '/../../util/ctrlSaisies.php';

// Mise en forme date
require_once __DIR__ . '/../../util/dateChangeFormat.php';

// Insertion classe User
require_once __DIR__ . '/../../class_crud/user.class.php';
$monUser = new USER();
// Instanciation de la classe User


?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Admin - CRUD User</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .error {
            padding: 2px;
            border: solid 0px black;
            color: red;
            font-style: italic;
            border-radius: 5px;
        }
        .superAdmin {
            text-decoration: none;  /* del sourligné */
            color: #797979;     /* Acier */
/*            color: #919191;      Etain */
        }
    </style>
</head>
<body>
    <h1>BLOGART22 Admin - CRUD User</h1>

	<hr />
	<h2>Nouveau Membre :&nbsp;<a href="./createuser.php"><i>Créer un Membre</i></a></h2>
    <hr />
	<h2>Tous les Users</h2>

	<table border="3" bgcolor="aliceblue">
    <thead>
        <tr>
            <th>&nbsp;Pseudo&nbsp;</th>
            <th>&nbsp;Identité&nbsp;</th>
            <th>&nbsp;eMail&nbsp;</th>

            <th colspan="2">&nbsp;Action&nbsp;</th>
        </tr>
    </thead>
    <tbody>
<?php
    // Appel méthode : Get tous les users en bdd
    $allUser = $monUser->get_AllUsers();
    // Boucle pour afficher
    foreach($allUser as $row) {

?>
            <tr>

            <td><h4>&nbsp; <?= $row["pseudoUser"]; ?> &nbsp;</h4></td>

            <td>&nbsp; <?= $row["prenomUser"] . " " . $row["nomUser"]; ?> &nbsp;</td>

            <td>&nbsp; <?= $row["eMailUser"]; ?> &nbsp;</td>

            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./updateuser.php?id1=<?=$row['pseudoUser']; ?>"><i><img src="./../../img/valider-png.png" width="20" height="20" alt="Modifier user" title="Modifier user" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <br /></td>

            <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="./deleteuser.php?id1=<?=$row['pseudoUser']; ?>" class="superAdmin"><i><img src="./../../img/supprimer-png.png" width="20" height="20" alt="Suppression user impossible" title="Suppression user impossible" /></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <br /></td>
        </tr>
<?php

	 }	// End of foreach
?>
    </tbody>
    </table>
    <br />
    <div class="error"><i><br>&nbsp;&nbsp;=>&nbsp;Attention, le statut <b>SUPER ADMINISTRATEUR</b> ne peut être supprimé !</i></div>
    <br />
<?php
require_once __DIR__ . '/footer.php';
?>
</body>
</html>
