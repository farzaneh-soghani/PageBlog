<?php
/**
 * articles.php
 * Lädt alle Artikel oder gefilterte Artikel nach Kategorie inklusive der verknüpften Bilder.
 */

// Einbindung der Datenbankverbindung
require_once 'pdo.php';

try {
    // Instanz der Verbindung herstellen
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // Prüfen, ob eine Kategorie über die URL übergeben wurde
    $categoryId = $_GET['kategorie'] ?? null;

    if ($categoryId) {
        // SQL-Abfrage mit Filter für die ausgewählte Kategorie und JOIN für Bilder (Tabellennamen klein geschrieben)
        $sql = "SELECT DISTINCT artikel.*, b.Pfad, b.AltText FROM artikel
                JOIN kategorie_artikel ON artikel.ArtikelID = kategorie_artikel.ArtikelID
                LEFT JOIN bilder b ON artikel.BilderID = b.BilderID
                WHERE kategorie_artikel.KategorieID = ?
                ORDER BY artikel.ArtikelID DESC";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$categoryId]);
    } else {
        // Standard-Abfrage: Alle Artikel inklusive Bilder abrufen
        $sql = "SELECT artikel.*, b.Pfad, b.AltText FROM artikel
                LEFT JOIN bilder b ON artikel.BilderID = b.BilderID
                ORDER BY artikel.ArtikelID DESC";
        $stmt = $pdo->query($sql);
    }

    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $articles = [];
    $errorMessage = $e->getMessage();
}
?>

<?php if (!empty($errorMessage)): ?>
    <div class="alert alert-danger" role="alert">
        Fehler beim Laden der Artikel: <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php elseif (empty($articles)): ?>
    <p class="text-center text-muted mt-5">Keine Artikel in dieser Kategorie gefunden.</p>
<?php else: ?>
    <?php foreach ($articles as $article): ?>
        <?php 
            // Artikel-ID und Text vorbereiten
            $id = htmlspecialchars($article['ArtikelID'] ?? '');
            $text = htmlspecialchars($article['Text'] ?? $article['inhalt'] ?? '');
            
            // Bildpfad absichern: Wenn kein Pfad vorhanden ist, Platzhalter verwenden
            $image = (!empty($article['Pfad'])) ? htmlspecialchars($article['Pfad']) : 'https://picsum.photos/400/250';
            $alt = htmlspecialchars($article['AltText'] ?? 'Bild');
            $link = 'single.php';
        ?>
            <div class="row mt-5 align-items-center">
                <!-- Spalte für das Bild -->
                <div class="col-md-4">
                    <img src="<?= $image ?>" alt="<?= $alt ?>" class="img-fluid rounded">
                </div>
                <!-- Spalte für den Text und Link -->
                <div class="col-md-6">
                    <p class="d-block"><?= $text ?></p>
                    <p class="text-end">
                        <a href="<?= $link ?>?id=<?= $id ?>" class="text-decoration-none">mehr &gt;&gt;</a>
                    </p>
                </div>
                <!-- Leere Spalte für das Layout-Spacing -->
                <div class="col-md-2"></div>
            </div>
    <?php endforeach; ?>
<?php endif; ?>