<?php
require_once 'header.php';
?>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?= $title ?></a>
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
    <div class="row mt-5">
        <div class="col-8">
            <h1>Titel</h1>
            <img src="https://picsum.photos/150/125" alt="Titelbild" class="float-start me-2 mb-2 mt-2">
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
            vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet.

            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
            feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
            delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet.
            <hr class="mb-0">
            <p class="p-2 mb-0 fs-6 fw-lighter bg-dark-subtle">Veröffentlichtung: xx.xx.xx xx:xx - Autor: Autor
                <br>Kategorien: Kat 1, Kat2
                <br>Tags: #tag1, #tag2, #tag3
            </p>
            <hr class="mt-0">
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
                    <input type="hidden" name="id" value="1">
                    <button type="submit" class="btn btn-primary">Kommentieren</button>
        </form>
    </div>
</div>


</div>
</body>
</html>