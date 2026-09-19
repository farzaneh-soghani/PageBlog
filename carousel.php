<?php
// Einbindung der Datenbankverbindung
require_once 'pdo.php';

try {
    // Instanz der Verbindung herstellen
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // Karussell-Bilder dynamisch aus der Tabelle 'Bilder' abrufen
    $stmt = $pdo->query("SELECT Pfad, AltText FROM Bilder LIMIT 3");
    $carouselItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $carouselItems = [];
}
?>

<?php if (!empty($carouselItems)): ?>
    <?php foreach ($carouselItems as $key => $item): ?>
        <?php 
            // Das erste Element erhält die Klasse 'active' für das Bootstrap-Karussell
            $activeClass = ($key === 0) ? 'active' : '';
            $imageUrl = htmlspecialchars($item['Pfad'] ?? '');
            $altText = htmlspecialchars($item['AltText'] ?? 'Bild');
        ?>
        <div class="carousel-item <?= $activeClass ?>">
            <img src="<?= $imageUrl ?>" class="d-block w-100" alt="<?= $altText ?>">
        </div>
    <?php endforeach; ?>
<?php endif; ?>