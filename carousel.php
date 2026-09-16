<?php
// Karussell-Elemente (Bilder und Alternativtexte) als Array definiert
$items = [
    [
        'image' => 'https://picsum.photos/500/150',
        'alt' => 'Bild 1'
    ],
    [
        'image' => 'https://picsum.photos/500/150',
        'alt' => 'Bild 2'
    ],
    [
        'image' => 'https://picsum.photos/500/150',
        'alt' => 'Bild 3'
    ]
];

// Schleife zum dynamischen Generieren der Karussell-Einträge
foreach ($items as $key => $value) {
    // Das erste Element erhält die Klasse 'active'
    $activeClass = ($key === 0) ? 'active' : '';
    $imageUrl = htmlspecialchars($value['image']);
    $altText = htmlspecialchars($value['alt']);

    echo '<div class="carousel-item ' . $activeClass . '">';
    echo '<img src="' . $imageUrl . '" class="d-block w-100" alt="' . $altText . '">';
    echo '</div>';
}