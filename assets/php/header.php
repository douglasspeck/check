<?php

    $pages = [
        ['Página inicial', 'teste', 'Teste dos CACs']
    ];

    $active_page = str_replace('.php', '', $_SERVER['REQUEST_URI']);
    $active_page = str_replace('/', '', $active_page);

    echo '
        <div id="menu-tag">
            <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="0 0 100 100" version="1.1" onclick="toggleMenu()">
                <g style="fill: var(--g0)">
                    <path d="M 0 0 L 100 0 L 100 20 L 0 20 Z"/>
                    <path d="M 0 40 L 100 40 L 100 60 L 0 60 Z"/>
                    <path d="M 0 80 L 100 80 L 100 100 L 0 100 Z""/>
                </g>
            </svg>
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