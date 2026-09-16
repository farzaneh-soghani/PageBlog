<?php
// Einbindung der Datenbankverbindung
include_once 'pdo.php';

// Artikel-ID dynamisch über URL-Parameter abrufen (Fallback auf ID 1, falls nicht vorhanden)
$artikelId = $_GET['id'] ?? 1;

// SQL-Abfrage mit Joins, um Kommentare samt Autor und Artikel-Zuordnung zu laden
$sql = "SELECT K.Betreff, K.Kommentar, K.Datum, KO.Name, KO.Email, KO.Homepage 
        FROM Kommentare K 
        JOIN Kommentierende KO ON KO.KommentierenderID = K.KommentierenderID
        JOIN Kommentare_Artikel KA ON KA.KommentarID = K.KommentarID
        WHERE KA.ArtikelID = ?";

$stmt = $dbh->prepare($sql);
$stmt->execute([$artikelId]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kommentare ausgeben, falls vorhanden
if (!empty($result)) {
    foreach ($result as $row) {
        // XSS-Prävention durch htmlspecialchars und sichere Ausgabe mit Bootstrap Cards
        $name    = htmlspecialchars($row['Name']);
        $datum   = date('d.m.Y', strtotime($row['Datum']));
        $betreff = htmlspecialchars($row['Betreff']);
        $kommentar = nl2br(htmlspecialchars($row['Kommentar'])); // Erhalt von Zeilenumbrüchen

        echo '<div class="card mt-3">';
        echo '<div class="card-header">' . $name . ' kommentierte am: ' . $datum . '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $betreff . '</h5>';
        echo '<p class="card-text">' . $kommentar . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-muted mt-3">Noch keine Kommentare vorhanden.</p>';
}