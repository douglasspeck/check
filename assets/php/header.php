<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    include 'url.php';

    if ($isLocal === 1) {
        $index = "/";
    } else {
        $index = "/~fracoes";
    }

    if (substr_count($link,"/") > 4 - $isLocal) {
        $check = '../assets/img/check.svg';
    } else {
        $check = 'assets/img/check.svg';
    }

    echo '<header id="menu">
        <a id="check" href="' . $index . '">' . file_get_contents($check) . '<p>check</p></a>
        <nav>
            <a class="active" href="' . $index . '">Home</a>
            <a href="#sobre">Sobre</a>
            <a href="#devlog">DevLog</a>
            <a href="#equipe">Equipe</a>
            <details>
                <summary class="button">Trilhas</summary>
                <div>';
    echo $_SESSION['logged'] === true ? '
                    <a href="sequencias.php">Retomar</a>
                    <a href="painel.php">Painel</a>
                    <a href="">Perfil</a>
                    <a href="' . $index . '?logout=true">Logout</a>' : '
                    <a href="login.php">Login</a>';
    echo '</div>
            </details>
        </nav>
    </header>';

?>