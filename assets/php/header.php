<?php

    $pages = [
        ['Página inicial', 'teste', 'Teste dos CACs']
    ];

    $active_page = str_replace('.php', '', $_SERVER['REQUEST_URI']);
    $active_page = str_replace('/', '', $active_page);

    echo '
        <div id="menu-tag" onclick="toggleMenu()">
            <span class="h-bar"></span>
            <span class="h-bar"></span>
            <span class="h-bar"></span>
        </div>
        <header id="menu">
        <nav>';
    
            for ($i = 0; $i < count($pages); $i++) {
                
                echo '<a href="../cacs/' . $pages[$i][1];

                if ($isLocal == true && $pages[$i][1] !== './' && $pages[$i][1] !== '') {
                    echo '.php';
                }

                echo '" class="menu';

                if ($pages[$i][1] == $active_page || $pages[$i][1] == '/' && $active_page == '') { echo ' active'; }

                echo '"';

                if ($pages[$i][2] !== '') { echo ' title="' . $pages[$i][2] . '"'; }

                echo '>' . $pages[$i][0] . '</a>';

            };
    
    echo '</nav>
    </header>';

?>