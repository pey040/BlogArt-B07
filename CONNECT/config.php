<?php
// nom de votre serveur (ou 127.0.0.1)
$hostBD = "localhost";
// nom BD
$nomBD = "BLOGART22";
// Serveur
// Avec encodage UTF8
$serverBD = "mysql:dbname=$nomBD;host=$hostBD;charset=utf8";

// nom utilisateur de connexion à la bdd
$userBD = 'root';         // Votre login
// mot de passe de connexion à la bdd
$passBD = '';         // Votre Pass

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/BLOGART22/BlogArt-B07');
define('ROOTFRONT', "http://" . $_SERVER['SERVER_NAME'] . '/BLOGART22/BlogArt-B07'); 
var_dump(ROOTFRONT);