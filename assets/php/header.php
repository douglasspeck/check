<?php

    include 'url.php';

    if (substr_count($link,"/")>4) {
        $check = '../assets/img/check.svg';
    } else {
        $check = 'assets/img/check.svg';
    }

    $pages = [
        ['Página inicial', 'teste', 'Teste dos CACs']
    ];

    $active_page = str_replace('.php', '', $_SERVER['REQUEST_URI']);
    $active_page = str_replace('/', '', $active_page);

    echo '<header id="menu">
        <a id="check" href="/">' . file_get_contents($check) . 'check</a>
        <nav>
            <a class="active" href="">Home</a>
            <a href="">Trilhas</a>
            <a href="">Perfil</a>
        </nav>
    </header>';

?>