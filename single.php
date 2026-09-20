<?php
// Einbindung von Header und Datenbankverbindung
require_once 'header.php';
require_once 'pdo.php';

// Artikel-ID dynamisch über URL-Parameter abrufen (Fallback auf ID 1)
$articleId = $_GET['id'] ?? 1;

try {
    // Instanz der Verbindung herstellen
    $dbConnector = new PDOConnector();
    $pdo = $dbConnector->getConnection();

    // SQL-Abfrage mit kleingeschriebenen Tabellennamen korrigiert
    $sql = "SELECT artikel.ArtikelID, Text, Name, Bezeichnung, Pfad, Datum, AltText 
            FROM artikel
            LEFT JOIN autoren ON artikel.AutorID = autoren.AutorID
            LEFT JOIN kategorie_artikel USING (ArtikelID)
            LEFT JOIN kategorien USING (KategorieID)
            LEFT JOIN bilder USING (BilderID)
            WHERE artikel.ArtikelID = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$articleId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    $result = null;
    $errorMessage = $e->getMessage();
}
?>
<body>
<div class="container">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?= htmlspecialchars($title ?? 'Blog') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php include 'navigation.php'; ?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Suche" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <?php if (!empty($errorMessage)): ?>
        <div class="alert alert-danger mt-4" role="alert">
            Fehler beim Laden des Artikels: <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php elseif (!$result): ?>
        <div class="alert alert-warning mt-4" role="alert">
            Artikel wurde nicht gefunden.
        </div>
    <?php else: ?>
        <!-- Hauptinhalt des Artikels -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-4">Artikel #<?= htmlspecialchars($result['ArtikelID']) ?></h1>
                
                <div class="clearfix mb-4">
                    <!-- Dynamisches Artikelbild -->
                    <?php if (!empty($result['Pfad'])): ?>
                        <img src="<?= htmlspecialchars($result['Pfad']) ?>" alt="<?= htmlspecialchars($result['AltText'] ?? 'Artikelbild') ?>" class="float-start me-3 mb-2 img-fluid rounded" style="max-width: 200px;">
                    <?php endif; ?>

                    <!-- Text des Artikels -->
                    <div class="article-text">
                        <?= $result['Text'] ?? '' ?>
                    </div>
                </div>

                <!-- Meta-Informationen (Datum, Autor, Kategorien) -->
                <div class="card bg-body-tertiary border-0 mb-5">
                    <div class="card-body py-3">
                        <p class="mb-1 fs-6">
                            <strong>Veröffentlichung:</strong> <?= isset($result['Datum']) ? date('d.m.Y', strtotime($result['Datum'])) : '' ?>
                        </p>
                        <p class="mb-1 fs-6">
                            <strong>Autor:</strong> <?= htmlspecialchars($result['Name'] ?? 'Unbekannt') ?>
                        </p>
                        <p class="mb-1 fs-6">
                            <strong>Kategorien:</strong> <span class="badge bg-secondary"><?= htmlspecialchars($result['Bezeichnung'] ?? 'Keine') ?></span>
                        </p>
                        <p class="mb-0 fs-6 text-muted">
                            <small>Tags: #tag1, #tag2, #tag3</small>
                        </p>
                    </div>
                </div>

                <!-- Kommentarbereich -->
                <h3 class="mb-3">Kommentare:</h3>
                <form method="POST" action="formtarget.php" class="mb-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input required="required" type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="Homepage">
                    </div>
                    <div class="mb-3">
                        <label for="betreff" class="form-label">Betreff</label>
                        <input type="text" class="form-control" id="betreff" name="betreff" placeholder="Betreff">
                    </div>
                    <div class="mb-3">
                        <label for="kommentar" class="form-label">Dein Kommentar:</label>
                        <textarea class="form-control" id="kommentar" name="kommentar" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($articleId) ?>">
                        <button type="submit" class="btn btn-primary">Kommentieren</button>
                    </div>
                </form>

                <!-- Einbindung der bestehenden Kommentare -->
                <?php include 'kommentare.php'; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>