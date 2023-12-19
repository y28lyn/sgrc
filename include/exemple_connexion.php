<!-- IMPORTANT | Renommer le fichier exemple_connexion.php par connexion.php -->
<?php
$servername = ""; //Veuillez remplacer par l'adresse IP de votre serveur
$database = ""; //Veuillez remplacer par le nom de votre base de donnees
$username = ""; //Veuillez remplacer par le nom d'utilisateur de votre base de donnees
$password = ""; //Veuillez remplacer par le mot de passe de votre base de donnees

$link = mysqli_connect($servername, $username, $password, $database);

$pdo = new PDO("mysql:host=" . $servername . ";dbname=" . $database, $username, $password);
