<?php
/**
 * carousel.php
 * Lädt Karussell-Artikel inklusive der verknüpften Bilder dynamisch aus der Datenbank.
 */

// Einbindung der Datenbankverbindung
require_once 'pdo.php';

try {
    // Instanz der Verbindung herstellen
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // Karussell-Artikel zusammen mit den entsprechenden Bildern abrufen
    $stmt = $pdo->query("
        SELECT a.Titel, a.Text, b.Pfad, b.AltText 
        FROM Artikel a 
        LEFT JOIN Bilder b ON a.BilderID = b.BilderID 
        WHERE a.Carousel = 1 
        LIMIT 3
    ");
    $carouselItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    // Bei einem Fehler wird ein leeres Array zurückgegeben
    $carouselItems = [];
}
?>

<?php if (!empty($carouselItems)): ?>
    <?php foreach ($carouselItems as $key => $item): ?>
        <?php 
            // Das erste Element erhält die Klasse 'active' für das Bootstrap-Karussell
            $activeClass = ($key === 0) ? 'active' : '';
            
            // Pfad und Alternativtext für das Bild vorbereiten (mit Fallback)
            $imageUrl = !empty($item['Pfad']) ? htmlspecialchars($item['Pfad']) : 'images/default.jpg';
            $altText = htmlspecialchars($item['AltText'] ?? 'Bild');
            $titel = htmlspecialchars($item['Titel'] ?? '');
        ?>
        <div class="carousel-item <?= $activeClass ?>">
            <img src="<?= $imageUrl ?>" class="d-block w-100" alt="<?= $altText ?>">
            <?php if (!empty($titel)): ?>
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= $titel ?></h5>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>