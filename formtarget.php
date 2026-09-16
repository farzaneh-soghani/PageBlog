<?php
include 'pdo.php';

$mysqldate = date('Y-m-d');

// Benutzerdaten in ein assoziatives Array für Prepared Statements verpacken
$dataKommentierender = [
    'name'  => $_POST['name'],
    'email' => $_POST['email'],
    'url'   => $_POST['url']
];

// Prüfen, ob der Kommentierende bereits existiert, um Duplikate zu vermeiden
$sql = "SELECT KommentierenderID FROM Kommentierende WHERE Name = :name AND Email = :email AND Homepage = :url";
$stmt = $dbh->prepare($sql);
$stmt->execute($dataKommentierender);
$result = $stmt->fetchColumn();

if ($result !== false) {
    $kommentierenderId = $result;
} else {
    // Neuen Kommentierenden anlegen, falls noch nicht vorhanden
    $sql = "INSERT INTO Kommentierende (Name, Email, Homepage) VALUES (:name, :email, :url)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($dataKommentierender);
    $kommentierenderId = $dbh->lastInsertId();
}

// Den eigentlichen Kommentar speichern
$kommentarSQL = "INSERT INTO Kommentare (KommentierenderID, Betreff, Kommentar, Datum) 
                 VALUES ($kommentierenderId, :betreff, :kommentar, '$mysqldate')";

$dataKommentar = [
    'betreff'   => $_POST['betreff'],
    'kommentar' => $_POST['kommentar'],
];

$stmt = $dbh->prepare($kommentarSQL);
$stmt->execute($dataKommentar);
$kommentarId = $dbh->lastInsertId();

// WICHTIG: Auch versteckte Felder (Hidden Fields wie ArtikelID) gelten als unsichere 
// Nutzereingaben, da sie im Browser manipuliert werden können. Daher ebenfalls Absicherung via Prepared Statement.
$zwischentabelleSQL = "INSERT INTO Kommentare_Artikel (KommentarID, ArtikelID) VALUES ($kommentarId, ?)";
$stmt = $dbh->prepare($zwischentabelleSQL);
$stmt->execute([$_POST['id']]);