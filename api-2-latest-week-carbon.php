<?php
//visar all väderdata
//visar väderdata för senaste veckan
// detta är lösning med Carbon för att räkna fram datum

// Installera och ta in Carbon
// composer require nesbot/carbon
require_once "vendor/autoload.php";

// Läs in klassen Carbon
use Carbon\Carbon;

// connect to db
$pdo = new PDO("sqlite:db.sqlite");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// hämta det senaste datumet först
$sql = "select max(created_at) from weather";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$latestDate = $stmt->fetchColumn();

// skapa ett datum med Carbon från det senaste datumet
$startDate = Carbon::create($latestDate)->addWeek(-1);

// hämta senaste veckan från den data vi har
$sql = "select * from weather where created_at > '$startDate'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

// sätt header till json och skriv ut json-data
header("Content-Type: application/json");
echo json_encode($results);
