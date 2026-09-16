<?php
// Einbindung von Header und Datenbankverbindung
require_once 'header.php';
include_once 'pdo.php';

// Artikel-ID dynamisch über URL-Parameter abrufen (Fallback auf ID 1)
$articleId = $_GET['id'] ?? 1;

// SQL-Abfrage mit Joins, um Artikel, Autor, Kategorie und Bilddaten zu laden
$sql = "SELECT Artikel.ArtikelID, Titel, Text, Name, Bezeichnung, Pfad, Datum, AltText 
        FROM Artikel
        JOIN Autoren ON Artikel.AutorID = Autoren.AutorID
        JOIN Kategorie_Artikel USING (ArtikelID)
        JOIN Kategorien USING (KategorieID)
        JOIN Bilder USING (BilderID)
        WHERE Artikel.ArtikelID = ?";

$stmt = $dbh->prepare($sql);
$stmt->execute([$articleId]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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

    <!-- Hauptinhalt des Artikels -->
    <div class="row mt-5">
        <div class="col-8">
            <h1><?= htmlspecialchars($result['Titel'] ?? '') ?></h1>
            
            <!-- Dynamisches Artikelbild -->
            <?php if (!empty($result['Pfad'])): ?>
                <img src="<?= htmlspecialchars($result['Pfad']) ?>" alt="<?= htmlspecialchars($result['AltText'] ?? 'Artikelbild') ?>" class="float-start me-2 mb-2 mt-2 img-fluid" style="max-width: 150px;">
            <?php endif; ?>

            <div><?= $result['Text'] ?? '' ?></div>

            <hr class="mb-0">
            <p class="p-2 mb-0 fs-6 fw-lighter bg-dark-subtle">
                Veröffentlichung: <?= isset($result['Datum']) ? date('d.m.Y', strtotime($result['Datum'])) : '' ?>
                <br>Autor: <?= htmlspecialchars($result['Name'] ?? '') ?>
                <br>Kategorien: <?= htmlspecialchars($result['Bezeichnung'] ?? '') ?>
                <br>Tags: #tag1, #tag2, #tag3
            </p>
            <hr class="mt-0">

            <!-- Kommentarbereich -->
            <h3>Kommentare:</h3>
            <form method="POST" action="formtarget.php">
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
</div>
</body>
</html>