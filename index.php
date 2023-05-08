<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if ($_GET['logout'] == true) {
        session_destroy();
        header("Location: /");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        $title = 'Check - Cadernos Autocorretivos';
        $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include 'assets/php/head.php';
    ?>
    <body id="landing">
        <?php include 'assets/php/header.php' ?>
        <main>
            <section>
                <h1>cadernos autocorretivos digitais</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit inventore tempora est officiis omnis nam dolorem nemo aliquam sed voluptatem. Voluptate iste provident dolores animi vel pariatur rem dolorum accusantium.</p>
            </section>
            <section>
                <h2>sobre o projeto</h2>
            </section>
            <section>
                <h2>devlog</h2>
            </section>
            <section>
                <h2>contato</h2>
            </section>
        </main>
        <?php include 'assets/php/scripts.php' ?>
        <footer></footer>
    </body>
</html>