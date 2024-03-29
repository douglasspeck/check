<?php

    include 'url.php';

    echo '
        <head>
            <title>' . $title . '</title>
            
            <!-- META TAGS -->
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

            <!-- SEO -->
            <meta name="author" content="tresdoug">
            <meta name="description" content="Trilha XXXXXX dos Cadernos Auto-corretivos de Frações">
            <meta name="keywords" content="' . $keywords . '">
            <link rel="canonical" href="' . $link . '">

            <!-- Resources -->';

            for($i = 0; $i < count($resources); $i++) {
                if ($resources[$i][0] == 'preload') {
                    echo '
                    <link rel="preload" as="' . $resources[$i][1] . '"';
                    if ($resources[$i][4]) {
                        echo ' href="' . $resources[$i][2] . '_' . $resources[$i][4][count($resources[$i][4]) - 1] . $resources[$i][3] . '"';
                        echo ' imgsrcset="';
                        for ($j = 0; $j < count($resources[$i][4]); $j++) {
                            echo $resources[$i][2].'_'.$resources[$i][4][$j].$resources[$i][3].' '.$resources[$i][4][$j].'w';
                            if ($j < count($resources[$i][4]) - 1) { echo ', '; };
                        }
                        echo '">';
                    }
                } else if ($resources[$i][0] == 'prefetch') {
                echo '<link rel="prefetch" href="' . $resources[$i][1] . '">';
                }
            }    

    echo '
            <!-- Favicons -->

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com"> 
            <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Anybody:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sono:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

            <!-- Stylesheets -->
            <link rel="preload" as="style" onload="this.remove();" href="/~fracoes/assets/php/stylesheets.php?t=' . date('YmdHis') . '" type="text/css">
            <link rel="stylesheet" href="/~fracoes/assets/php/stylesheets.php?t=' . date('YmdHis') . '" type="text/css">';

    echo '</head>';
?>