<?php
require_once 'pdo.php';

try {
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    $mysqldate = date('Y-m-d');

    $dataKommentierender = [
        'name'  => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'url'   => $_POST['url'] ?? ''
    ];

    $sql = "SELECT KommentierendeID FROM kommentierende WHERE Name = :name AND Email = :email AND URL = :url";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($dataKommentierender);
    $result = $stmt->fetchColumn();

    if ($result !== false) {
        $kommentierendeId = $result;
    } else {
        $sql = "INSERT INTO kommentierende (Name, Email, URL) VALUES (:name, :email, :url)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($dataKommentierender);
        $kommentierendeId = $pdo->lastInsertId();
    }

    $kommentarSQL = "INSERT INTO Kommentare (KommentierendeID, Betreff, Kommentar, Datum) 
                     VALUES (:kommentierendeId, :betreff, :kommentar, :mysqldate)";

    $dataKommentar = [
        'kommentierendeId' => $kommentierendeId,
        'betreff'           => $_POST['betreff'] ?? '',
        'kommentar'         => $_POST['kommentar'] ?? '',
        'mysqldate'         => $mysqldate
    ];

    $stmt = $pdo->prepare($kommentarSQL);
    $stmt->execute($dataKommentar);
    $kommentarId = $pdo->lastInsertId();

    $zwischentabelleSQL = "INSERT INTO Kommentare_Artikel (KommentarID, ArtikelID) VALUES (?, ?)";
    $stmt = $pdo->prepare($zwischentabelleSQL);
    $stmt->execute([$kommentarId, $_POST['id'] ?? 1]);

    header("Location: single.php?id=" . ($_POST['id'] ?? 1));
    exit;

} catch (Exception $e) {
    echo "Fehler beim Speichern des Kommentars: " . htmlspecialchars($e->getMessage());
}