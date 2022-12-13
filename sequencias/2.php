<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $title = 'Frações - Sequência 2';
        $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include '../assets/php/head.php';
    ?>
    <body id="home">
        <?php include '../assets/php/header.php' ?>
        <main>
            <?php

                $json = json_decode(file_get_contents("temp.json"),true);

                echo '<h1>Sequência 1</h1>
                <section class="gallery">';

                for ($i = 0; $i < count($json[0]); $i++) {

                    $item = $json[0][$i];
    
                    echo '<article>';
    
                    if (array_key_exists('figure', $item)) {
    
                        $fig = $item["figure"];
    
                        $figure = '<figure shape=' . $fig['shape'] . ' sections=' . $fig['sections'];
                        
                        if (array_key_exists('fill', $fig)) {$figure .= ' fill=' . $fig['fill'];}
                        if (array_key_exists('paint', $fig)) {$figure .= ' paint';}
                        
                        $figure .= '></figure>';
    
                        echo $figure;
    
                    }
    
                    if (array_key_exists('fraction', $item)) {
    
                        $fra = $item["fraction"];
    
                        $fraction = '<fraction';
                        
                        if (array_key_exists('int', $fra)) {$fraction .= ' int=' . $fra['int'];}
                        
                        if (array_key_exists('num', $fra)) {$fraction .= ' num=' . $fra['num'];}
                        
                        if (array_key_exists('den', $fra)) {$fraction .= ' den=' . $fra['den'];}
    
                        $fraction .= '></fraction>';
    
                        echo $fraction;
                    
                    }
    
                    echo '</article>';

                }

                echo '</section>
                
                <h1>Sequência 2</h1>
                <section class="gallery">';

                for ($i = 0; $i < count($json[1]); $i++) {

                    $item = $json[1][$i];
    
                    echo '<article>';
    
                    if (array_key_exists('figure', $item)) {
    
                        $fig = $item["figure"];
    
                        $figure = '<figure shape=' . $fig['shape'] . ' sections=' . $fig['sections'];
                        
                        if (array_key_exists('fill', $fig)) {$figure .= ' fill=' . $fig['fill'];}
                        if (array_key_exists('paint', $fig)) {$figure .= ' paint';}
                        
                        $figure .= '></figure>';
    
                        echo $figure;
    
                    }
    
                    if (array_key_exists('fraction', $item)) {
    
                        $fra = $item["fraction"];
    
                        $fraction = '<fraction';
                        
                        if (array_key_exists('int', $fra)) {$fraction .= ' int=' . $fra['int'];}
                        
                        if (array_key_exists('num', $fra)) {$fraction .= ' num=' . $fra['num'];}
                        
                        if (array_key_exists('den', $fra)) {$fraction .= ' den=' . $fra['den'];}
    
                        $fraction .= '></fraction>';
    
                        echo $fraction;
                    
                    }
    
                    echo '</article>';

                }

            ?>
            </section>
        </main>
        <?php include '../assets/php/scripts.php' ?>
    </body>
</html>