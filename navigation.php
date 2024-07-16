<?php
$items = [
  [ // key: 0
      'href' => '#',
      'text' => 'Link 1',

  ],
  [ // key: 1
      'href' => '#',
      'text' => 'Link 2',
  ],
];
foreach ($items as $value) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="' . $value["href"] . '">' . $value["text"] .  '</a>';
    echo '</li>';
}
