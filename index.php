<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if ($_GET['logout'] == true) {
        session_destroy();
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
        <header id="menu">
            <a id="check" href="/">
                <svg width="100" height="96.160553" viewBox="0 0 26.458333 25.442478" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                    <g transform="translate(-68.462448,-110.37804)">
                        <g transform="matrix(0.34771879,0,0,0.34771879,44.500439,71.989417)">
                        <path d="m 105.49688,110.40134 a 36.584942,36.584942 0 0 0 -36.584847,36.58485 36.584942,36.584942 0 0 0 36.584847,36.58485 36.584942,36.584942 0 0 0 36.58485,-36.58485 36.584942,36.584942 0 0 0 -2.94246,-14.31334 c -1.47058,1.59733 -2.98859,3.2337 -4.53926,4.89376 a 30.607187,30.607187 0 0 1 1.50379,9.41958 30.607187,30.607187 0 0 1 -30.60692,30.60743 30.607187,30.607187 0 0 1 -30.607434,-30.60743 30.607187,30.607187 0 0 1 30.607434,-30.60692 30.607187,30.607187 0 0 1 20.64887,8.0207 c 1.41677,-1.46712 2.82865,-2.92925 4.15427,-4.30154 a 36.584942,36.584942 0 0 0 -24.80314,-9.69709 z"></path>
                        <path d="m 103.85705,150.92784 c 0,0 32.19062,-33.3685 33.25414,-34.42047 3.08619,-3.05265 9.02419,0.65961 7.70331,4.96113 -0.43612,1.42026 -32.84675,37.88972 -38.75512,40.471 -1.36628,0.59691 -3.34207,0.5702 -4.71928,0 -5.038427,-2.08602 -17.852757,-16.62028 -18.247885,-17.93327 -1.103802,-3.66787 2.552478,-6.99666 6.017082,-6.25304 1.451657,0.31157 14.747753,13.17465 14.747753,13.17465 z"></path>
                        </g>
                    </g>
                </svg>
                check
            </a>
            <nav>
                <a class="active" href="/">Home</a>
                <a href="#sobre">Sobre</a>
                <a href="#devlog">DevLog</a>
                <a href="#contato">Contato</a>
                <a class="button" href="login.php">Log Out</a>
            </nav>
        </header>
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