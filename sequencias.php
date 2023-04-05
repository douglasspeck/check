<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        require_once 'assets/php/mysqli/db.php';

        $notebook = isset($_GET['notebook']) ? $_GET['notebook'] : 1;
        $sequence = isset($_GET['sequence']) ? $_GET['sequence'] : 1;

        $title = 'Frações - Sequência ' . $sequence;
        $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include 'assets/php/head.php';
    ?>
    <body id="home">
        <?php include 'assets/php/header.php' ?>
        <main>
            <?php

                $data = getSequence($db, $notebook, $sequence);

                echo $data

                /*echo '<h1>Sequência 1</h1>
                <section class="gallery">';

                for ($i =0; $i < count($data); $i++) {

                    $item = json_decode($data[$i]['parameters'],true);
    
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

                echo '</section>';*/

            ?>
        </main>
        <?php include 'assets/php/scripts.php' ?>
    </body>
</html>