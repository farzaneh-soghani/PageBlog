<?php
// Einbindung der Datenbankverbindung
require_once 'pdo.php';

try {
    // Instanz der Verbindung herstellen
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // Kategorien dynamisch aus der Datenbank abrufen
    $stmt = $pdo->query("SELECT KategorieID, Bezeichnung FROM Kategorien");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $categories = [];
}
?>

<!-- Dropdown-Menü für Kategorien -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Kategorien
    </a>
    <ul class="dropdown-menu">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <?php 
                    $href = 'index.php?kategorie=' . htmlspecialchars($category['KategorieID']);
                    $text = htmlspecialchars($category['Bezeichnung']);
                ?>
                <li><a class="dropdown-item" href="<?= $href ?>"><?= $text ?></a></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li><span class="dropdown-item text-muted">Keine Kategorien</span></li>
        <?php endif; ?>
    </ul>
</li>