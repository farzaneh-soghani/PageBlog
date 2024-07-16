<?php
include 'pdo.php';
// Erstellen des Datums für die Datenbank:
$mysqldate = date('Y-m-d');

// Erstellen des Arrays für den Kommentierenden. Ich verwende
// benannte Parameter - daher muss ich ein assoziatives Array erstellen.
$dataKommentierender = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'url' => $_POST['url']
];

$sql = "SELECT KommentierenderID FROM Kommentierende WHERE Name = :name AND Email = :email AND Homepage = :url";
$stmt = $dbh->prepare($sql);
$stmt->execute($dataKommentierender);
$result = $stmt->fetchColumn();
// Wenn kein Resultat gefunden wurde, ist $stmt->fetchColumn() (bool)false
if ($result !== false){
// Ist das nicht der Fall, steht in $result die KommentierenderID
// (Default Column ist 0 → die erste)
    $kommentierenderId = $result;
} else {
    // Wenn $result auf false war: Lege einen neuen Datensatz an.
    $sql = "INSERT INTO Kommentierende (Name, Email, Homepage)
VALUES (:name, :email, :url)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($dataKommentierender);
    // Über $dbh->lastInsertId() erhalte ich die ID/den letzten Wert des
    // Primärschlüssels des letzten Einfüge-vorgangs:
    $kommentierenderId =  $dbh->lastInsertId();
}
// Ich habe nun in $kommentierenderId die nötige ID, um den Kommentar in der Datenbanktabelle
// Kommentare speichern zu können. Nun brauche ich ein weiteres assoziatives Array mit den
// Daten, die in die Datenbank geschrieben werden sollen:
$kommentarSQL = "INSERT INTO Kommentare (KommentierenderID, Betreff, Kommentar, Datum)
VALUES ($kommentierenderId, :betreff, :kommentar, $mysqldate)";

// Hier verwende ich nur in zwei Spalten die Nutzerdaten - die restlichen Daten kommen
// direkt aus dem Code und werden daher hardcoded ("festgecodet") hinterlegt.

$dataKommentar = [
  'betreff' => $_POST['betreff'],
  'kommentar' => $_POST['kommentar'],
];
$stmt = $dbh->prepare($kommentarSQL);
$stmt->execute($dataKommentar);

// Auch aus diesem Query benötige ich die letzte ID, welche eingefügt worden ist.
$kommentarId = $dbh->lastInsertId();

// Auch in diesem Query benötige ich nicht für alle Spalten Nutzereingaben.
// Selbst wenn die ID des Artikels ein hidden field (<input type="hidden"…) ist:
// Es sind dennoch Nutzerdaten, denen man nicht vertraut: Das Value-Feld lässt sich über
// die Entwickleransicht manipulieren. Da es sich hier allerdings nur um eine Spalte
// handelt, verzichte ich auch ein assoziatives Array.
$zwischentabelleSQL = "INSERT INTO Kommentare_Artikel (KommentarID, ArtikelID) VALUES ($kommentarId, ?)";
$stmt = $dbh->prepare($zwischentabelleSQL);
$stmt->execute($_POST['id']);