<?php
// Einbindung der Datenbankverbindung
include 'pdo.php';

/*
// Optionaler Test-Code für alle Kommentare
echo "<pre>";
$sql = "SELECT K.Betreff, K.Kommentar, K.Datum, KO.Name, KO.Email, KO.Homepage 
        FROM Kommentare K 
        JOIN Kommentierende KO ON KO.KommentierenderID = K.KommentierenderID";
$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
print_r($result);
echo "</pre>";
*/

echo '<br>';

// SQL-Abfrage mit Joins, um Kommentare für einen spezifischen Artikel zu laden
$sql2 = "SELECT K.Betreff, K.Kommentar, K.Datum, KO.Name, KO.Email, KO.Homepage 
         FROM Kommentare K 
         JOIN Kommentierende KO ON KO.KommentierenderID = K.KommentierenderID
         JOIN Kommentare_Artikel KA ON KA.KommentarID = K.KommentarID
         WHERE KA.ArtikelID = ?";

$stmt = $dbh->prepare($sql2);
$stmt->execute([1]); // Ausführen des vorbereiteten Statements mit Parameterbindung

// Korrekte Datenabfrage direkt vom Statement-Objekt
$result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sichere Ausgabe der Kommentare mit HTML-Escape (XSS-Prävention)
if (!empty($result2)) {
    foreach ($result2 as $row) {
        $name    = htmlspecialchars($row['Name'] ?? '');
        $betreff = htmlspecialchars($row['Betreff'] ?? '');
        $kommentar = nl2br(htmlspecialchars($row['Kommentar'] ?? ''));

        echo '<div class="mb-3">';
        echo '<strong>' . $name . '</strong> schrieb zum Thema <em>' . $betreff . '</em>:<br>';
        echo '<p>' . $kommentar . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Keine Kommentare vorhanden.</p>';
}