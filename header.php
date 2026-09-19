<?php
// Standard-Titel definieren, falls kein anderer Titel gesetzt wurde
$title = $title ?? 'PageBlog';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
</head>