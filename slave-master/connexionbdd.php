<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors',1);
//Connexion à la base de données
$dsn = 'mysql:dbname=offres_emplois;host=127.0.0.1';
$hote = 'localhost';
$user = 'root';
$password = '';

try{
    $titre = "Connexion";
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
