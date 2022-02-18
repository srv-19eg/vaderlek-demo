<?php
//visar all väderdata
//visar väderdata för senaste veckan
// detta är lösning för MySQL som själv kan lösa det mesta

// connect to db
$host = "localhost";
$db = "weather_db";
$user = "root";
$pass = "";
$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// hämta senaste veckan från den data vi har
// MySQL kan hantera en enkel > eller between
// Vi gör en subfråga för att ta reda på vad som är maxvärdet
// INTERVAL låter oss modifiera datumet
// Paranteser är viktiga :)
$sql = "select * from weather where created_at > (date((select max(created_at) from weather)) - INTERVAL 7 day)";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

// sätt header till json och skriv ut json-data
header("Content-Type: application/json");
echo json_encode($results);
