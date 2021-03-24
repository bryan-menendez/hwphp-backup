<?php
    include 'stdlib.php';

    $site = new csite();

    initialise_site($site);

    $page = new cpage("Welcome to uganda");
    $site -> setPage($page);

    $content = "WELCOMSEO";
    $page -> setContent($content);

    $site -> render();
?>