<?php

    include 'url.php';

    if ($isLocal === 1) {
        $home = "/";
    } else {
        $home = "/~fracoes";
    }

    if (substr_count($link,"/") > 4 - $isLocal) {
        $check = '../assets/img/check.svg';
    } else {
        $check = 'assets/img/check.svg';
    }

    echo '<header id="menu">
        <a id="check" href="' . $home . '">' . file_get_contents($check) . 'check</a>
        <nav>
            <a class="active" href="' . $home . '">Home</a>
            <a href="">Trilhas</a>
            <a href="">Perfil</a>
        </nav>
    </header>';

?>