<?php

$host = 'localhost';
$dbname = 'gym';
$dbusername = "gymgur-";
$dbpassword = "aeea";

// $dsn = "mysql:host=localhost;dbname=c2142086_torneo";

try {
    // $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
    // echo "Connection failed: " . $e->getMessage();
}