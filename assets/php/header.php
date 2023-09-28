<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    $current_file=  explode('/', $_SERVER['SCRIPT_NAME']);
    $current_file=  end($current_file);

    $check = './assets/img/check.svg';

    echo '<header id="menu">
        <a id="check" href="/~fracoes/">' . file_get_contents($check) . '<p>check</p></a>
        <span id="sandwich" aria-hidden="true" onclick="toggleMenu();"></span>
        <nav>';
    if ($current_file=='index.php') {
        echo '<a class="active" href="/~fracoes/#banner">Home</a>
            <a href="/~fracoes/#sobre">Sobre</a>
            <a href="/~fracoes/#devlog">DevLog</a>
            <a href="/~fracoes/#equipe">Equipe</a>
            <details>
                <summary class="button">Trilhas</summary>
                <ul>';
                echo $_SESSION['logged'] === true ? '
                                <li><a href="sequencias.php">Retomar</a></li>
                                <li><a href="painel.php">Painel</a></li>
                                <li><a href="">Perfil</a></li>
                                <li><a href="/~fracoes/?logout=true">Logout</a></li>' : '
                                <li><a href="login.php">Login</a></li>
                            </ul>
                        </details>';
    } else {
        echo '<a href="sequencias.php">Retomar</a>
        <a href="painel.php">Painel</a>
        <a href="">Perfil</a>
        <a class="button" href="/~fracoes/?logout=true">Logout</a>';
    }
    echo '</nav>
    </header>';

?>