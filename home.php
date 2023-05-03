<?php

if(!isset($_SESSION)) {
    session_start();
}

if($_SESSION['logged'] == false) {
    header("Location: login.php");
}

$date = $_SESSION['registration_date'];
//$formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
//$formatter->setPattern("MMMM 'de' y");

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        $title = 'Check - Cadernos Autocorretivos';
        $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include 'assets/php/head.php';
    ?>
    <body id="home">
        <?php include 'assets/php/header.php' ?>
        <main>
            <section id="profile-section">
                <section>
                    <h2><?php echo "Olá, " . ($_SESSION['student_name']) . "!"?></h2>
                    <p><?php echo "@" . ($_SESSION['username']) . " - Aluno desde " . $date . "."?></p>
                </section>
                <section id="statistics">
                    <article>
                        <h3>atividades concluídas</h3>
                        <p>14</p>
                        <span class="chart"></span>
                    </article>
                    <article>
                        <h3>sequências finalizadas</h3>
                        <p>3</p>
                        <span class="chart"></span>
                    </article>
                    <article>
                        <h3>constância</h3>
                        <p>2 dias</p>
                    </article>
                </section>
            </section>
            <section id="resume-section">
                <h2>Continue de onde parou <seta r=0/></h2>
                <article id="frequence-chart">
                    <p>Você completou</p>
                    <figure shape="square" sections=100 fill=37 size=150></figure>
                    <p><fraction num=37 den=100></fraction> da Sequência.</p>
                </article>
                <article id="prev-sequence">
                    <p class="sequence">Sequência 2</p>
                    <h3>Pintando Figuras</h3>
                    <p class="description">A partir das frações dadas, pinte a figura clicando sobre suas partes.</p>
                    <button id="home-resume-button">Retomar atividade</button>
                    <span class="progress-bar"></span>
                </article>
            </section>
            <section id="resume-all-section">
                <h2>Suas trilhas já percorridas</h2>
                <article>
                    <span class="pseudo-img"></span>
                    <p class="sequence">Sequência 4</p>
                    <h3>Contornando figuras</h3>
                </article>
                <article>
                    <span class="pseudo-img"></span>
                    <p class="sequence">Sequência 6</p>
                    <h3>Dividindo retas</h3>
                </article>
            </section>
        </main>
        <?php include 'assets/php/scripts.php' ?>
    </body>
</html>