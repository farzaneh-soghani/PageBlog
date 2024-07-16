<?php
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
foreach ($items as $key => $value) {
    if ($key === 0) {
        echo '<div class="carousel-item active">';
    }
    else {
        echo '<div class="carousel-item">';
    }
    echo '<img src="' . $value["image"] . '" class="d-block w-100" alt="' . $value["alt"] .  '">';
    echo '</div>';

}
