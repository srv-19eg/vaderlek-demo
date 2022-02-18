<?php
//visar all väderdata

// connect to db
$host = "localhost";
$db = "weather_db";
$user = "root";
$pass = "";
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// hämta all data
$sql = "select * from weather";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

// sätt header till json och skriv ut json-data
header("Content-Type: application/json");
echo json_encode($results);
