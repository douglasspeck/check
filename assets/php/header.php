<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    $check = './assets/img/check.svg';

    echo '<header id="menu">
        <a id="check" href="/~fracoes/">' . file_get_contents($check) . '<p>check</p></a>
        <span id="sandwich" aria-hidden="true" onclick="toggleMenu();"></span>
        <nav>
            <a class="active" href="/~fracoes/#banner">Home</a>
            <a href="/~fracoes/#sobre">Sobre</a>
            <a href="/~fracoes/#devlog">DevLog</a>
            <a href="/~fracoes/#equipe">Equipe</a>
            <details>
                <summary class="button">Trilhas</summary>
                <div>';
    echo $_SESSION['logged'] === true ? '
                    <a href="sequencias.php">Retomar</a>
                    <a href="painel.php">Painel</a>
                    <a href="">Perfil</a>
                    <a href="/~fracoes/?logout=true">Logout</a>' : '
                    <a href="login.php">Login</a>';
    echo '</div>
            </details>
        </nav>
    </header>';

?>