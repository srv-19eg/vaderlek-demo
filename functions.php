<?php

function db() {
    // https://www.w3schools.com/php/php_mysql_connect.asp
    $host = "localhost";
    $db = "weather_db";
    $user = "root";
    $pass = "";
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, [PDO::MYSQL_ATTR_LOCAL_INFILE => true]);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
}