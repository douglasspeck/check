<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        $title = 'Trilha XXXXXX de Frações';
        $keywords = 'CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include '../assets/php/head.php';
    ?>
    <body>
        <main>

            <?php include '../assets/php/patterns.php'; ?>

            <section id="white-canvas" class="gallery">
                <article class="activity">
                    <set>
                        <minifigure shape="square" amount=4 subset=0></minifigure>
                        <minifigure shape="circle" amount=3 subset=0></minifigure>
                        <minifigure shape="circle" amount=5 subset=1></minifigure>
                        <minifigure shape="triangle" amount=2 subset=1></minifigure>
                        <gap subset=0 value=1></gap>
                        <gap subset=1 value=3></gap>
                    </set>
                </article>
            </section>
            
        </main>

        <?php include '../assets/php/footer.php'; ?>

    </body>
</html>