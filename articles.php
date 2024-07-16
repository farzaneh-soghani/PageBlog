<?php
$items = [
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 1',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore           et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 2',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore           et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
    [
        'image' => 'https://picsum.photos/400/250',
        'image_alt' => 'Bild 3',
        'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore           et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.',
        'link' => '#',
    ],
];
foreach ($items as $key => $item) {
    ?>
    <div class="row mt-5">
        <div class="col">
            <img src="<?= $item['image'] ?>" alt="<?= $item['image_alt'] ?>">
        </div>
        <div class="col">
            <p class="d-block"><?= $item['text'] ?></p>
            <p class="text-end"><a href="<?= $item['link'] ?>?<?= $key ?>">mehr >></a></p>
        </div>
        <div class="col"></div>
    </div>
    <?php
}
?>