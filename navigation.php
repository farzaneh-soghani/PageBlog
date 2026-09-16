<?php
// Menüpunkte als Array definiert (z. B. für die Navigation)
$items = [
    [
        'href' => '#',
        'text' => 'Link 1',
    ],
    [
        'href' => '#',
        'text' => 'Link 2',
    ],
];

// Navigation dynamisch und sicher (mit htmlspecialchars) generieren
foreach ($items as $value) {
    $href = htmlspecialchars($value['href']);
    $text = htmlspecialchars($value['text']);

    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="' . $href . '">' . $text . '</a>';
    echo '</li>';
}