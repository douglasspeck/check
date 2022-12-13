<?php

    include 'url.php';

    $pages = [
        ['Página inicial', 'teste', 'Teste dos CACs']
    ];

    $active_page = str_replace('.php', '', $_SERVER['REQUEST_URI']);
    $active_page = str_replace('/', '', $active_page);

    echo '<header id="menu">
        <a id="check" href="/">' . file_get_contents('/assets/img/check.svg') . 'check</a>
        <nav>
            <a class="active" href="">Home</a>
            <a href="">Trilhas</a>
            <a href="">Perfil</a>
        </nav>
    </header>';

?>