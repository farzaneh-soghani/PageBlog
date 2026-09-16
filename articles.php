<?php
// Einbindung der Datenbankverbindung (falls Daten später dynamisch geladen werden)
include_once 'pdo.php';

// Artikel- oder Listenelemente als Array definiert
$items = [
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 1',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 2',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 3',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
];

// Schleife zur Ausgabe der Listenelemente im Bootstrap-Grid
foreach ($items as $key => $item):
    $image = htmlspecialchars($item['image']);
    $alt = htmlspecialchars($item['image_alt']);
    $text = htmlspecialchars($item['text']);
    $link = htmlspecialchars($item['link']);
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
                <a href="<?= $link ?>?id=<?= $key ?>" class="text-decoration-none">mehr &gt;&gt;</a>
            </p>
        </div>
        <!-- Leere Spalte für das Layout-Spacing -->
        <div class="col-md-2"></div>
    </div>
<?php endforeach; ?>