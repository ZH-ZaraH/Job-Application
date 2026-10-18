<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "lopez"; //This is the name of the database i have in my "localhost/phpmyadmin"
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn, $user, $password);
$pdo->exec("SET time_zone = '+08:00';");
// the rest of the code is just what i followed from the tutorial posted in brightspace. Given by Sir Ivan.
?>
