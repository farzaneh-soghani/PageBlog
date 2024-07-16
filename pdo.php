<?php
$dein_name = "chris";

$host = '127.0.0.1';
$db   = $dein_name;
$user = $dein_name;
$pass = "chris";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$dbh = new PDO($dsn, $user, $pass, $options);