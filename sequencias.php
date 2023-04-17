<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        include 'assets/php/errors.php';

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

                include 'assets/php/create_activity.php';

                $data = getSequence($db, $notebook, $sequence);

                echo '<h1>Sequência 1</h1>
                <section class="gallery">';

                for ($i = 0; $i < 1; $i++) {

                    $item = json_decode($data[$i]['parameters'],true);

                    create_activity($item);

                }

                echo '</section>';

            ?>
        </main>
        <?php include 'assets/php/scripts.php' ?>
    </body>
</html>