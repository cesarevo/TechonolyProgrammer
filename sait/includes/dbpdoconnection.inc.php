<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "todolist";
/*$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "tp";*/


$dsn = "mysql:host=$serverName;dbname=$dBName;charset=utf8";

$opt = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO:: ATTR_EMULATE_PREPARES => false,
];

try {
$pdo = new PDO($dsn, $dBUsername, $dBPassword, $opt);

} catch (PDOException $e) {
echo "Error " .$e->getMessage();

}

?>