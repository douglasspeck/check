<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if ($_GET['logout'] == true) {
        session_destroy();
        header("Location: /~fracoes");
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
            <div aria-hidden="true" id="top-of-site-pixel-anchor"></div>
            <section id="banner">
                <section class="img-container">
                    <!-- <span></span>
                    <div id="square-fraction">
                        <?php //for ($i=0;$i<100;$i++) {echo '<span class="little-square"></span>';} ?>
                    </div> -->
                    <img src="assets/img/ty-3d-hash.gif" alt="">
                </section>
                <section>
                    <h1>Cadernos Autocorretivos <span class="full-line">Digitais</span></h1>
                    <p><strong>Check</strong> é uma plataforma digital interativa para o ensino de matemática baseada em sequências didáticas e inspirada nos <em>Cadernos Auto-corretivos: Frações</em> desenvolvidos pela equipe de residência pedagógica da Licenciatura em Matemática da Unicamp.</p>
                </section>
            </section>
            <section id="sobre">
                <h2>sobre o projeto</h2>
                <p>Os <em>cadernos auto-corretivos</em> são parte da metodologia implementada por Célestin Freinet no século XX e consistem em sequências didáticas com exemplos, atividades, correções e testes.</p>
                <figure class="quote">
                    <blockquote><p>O objetivo é que os alunos compreendam as atividades a partir dos exemplos e usufruam de sua independência, corrigindo suas próprias soluções com as correções presentes e finalizando as sequências com o teste.</p></blockquote>
                    <figcaption>
                        <p><span class="author">Carvalho</span> <i lang="la">et al</i>, 2021</p>
                    </figcaption>
                </figure>
                <p>A partir da obra original de Freinet, o projeto de Residência Pedagógica desenvolveu os chamados <a href="exit.php?url=https%3A%2F%2Fproceedings.science%2Funicamp-pibic%2Fpibic-2021%2Ftrabalhos%2Fresidencia-pedagogica-cadernos-autocorretivos-como-ferramenta-de-aprendizagem-no%3Flang%3Dpt-br" target="_blank"><cite>Cadernos Auto-corretivos: Frações</cite></a>, nos quais este projeto é baseado. Sua proposta final é revelar a inteligibilidade dos conceitos e operações.</p>
                <!-- <section class="carousel">
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Análise dos cadernos auto-corretivos</p></figcaption>
                    </figure>
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Parametrização das atividades</p></figcaption>
                    </figure>
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Geração procedural dos elementos</p></figcaption>
                    </figure>
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Criação das trilhas de aprendizagem digitais</p></figcaption>
                    </figure>
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Aplicação das trilhas com alunos da Educação Básica</p></figcaption>
                    </figure>
                    <figure class="horse">
                        <img src="" alt="">
                        <figcaption><p>Coleta e análise dos dados</p></figcaption>
                    </figure>
                </section> -->
                <section class="timeline">
                    <h3>Linha do tempo do projeto</h3>
                    <ul>
                        <li>Análise dos cadernos auto-corretivos</li>
                        <li>Parametrização das atividades</li>
                        <li>Geração procedural dos elementos</li>
                        <li>Criação das trilhas de aprendizagem digitais</li>
                        <li>Aplicação das trilhas com<br>alunos da Educação Básica</li>
                        <li>Coleta e análise dos dados</li>
                    </ul>
                </section>
            </section>
            <section id="devlog" lang="en">
                <h2>devlog</h2>
                <p>baseado no projeto <a href="https://keepachangelog.com/pt-BR/1.0.0/">Keep a Changelog</a></p>
                <section class="devlog-container">
                    <section class="devlog-content">
                        <?php 
                            $dir = scandir("devlog");
                            for ($i = 1; $i <= 6; $i++) {
                                $file = file_get_contents("devlog/" . $dir[count($dir)-$i]);
                                echo $file;
                            }
                        ?>
                    </section>
                    <a href="devlog.php">versão completa</a>
                </section>
            </section>
            <section id="equipe">
                <h2>equipe</h2>
                <section class="people">
                    <section class="person">
                        <img src="assets/img/speck.jpeg" alt="Fotografia do Douglas">
                        <div class="person-info">
                            <h3 class="person-name">Douglas Speck</h3>
                            <p class="person-role">Front-End</p>
                            <a href="mailto:d260138@dac.unicamp.br" class="person-contact">d260138@dac.unicamp.br</a>
                        </div>
                    </section>
                    <section class="person">
                        <img src="assets/img/guilherme.jpeg" alt="Fotografia do Guilherme.">
                        <div class="person-info">
                            <h3 class="person-name">Guilherme Rafael de Oliveira</h3>
                            <p class="person-role">Back-End</p>
                            <p><a href="mailto:g221050@dac.unicamp.br" class="person-contact">g221050@dac.unicamp.br</a></p>
                        </div>
                    </section>
                    <section class="person">
                        <img src="assets/img/mfirer.jpeg" alt="Fotografia do Marcelo">
                        <div class="person-info">
                            <h3 class="person-name">Prof. Dr. Marcelo Firer</h3>
                            <p class="person-role">Orientador</p>
                            <p><a href="mailto:mfirer@ime.unicamp.br" class="person-contact">mfirer@ime.unicamp.br</a></p>
                        </div>
                    </section>
                </section>
            </section>
        </main>
        <?php include 'assets/php/scripts.php' ?>
        <footer>
            <p>® Check 2023 | <a href="exit.php?https%3A%2F%2Fprivacidade.dados.unicamp.br%2F">Política de Privacidade</a> | <a href="exit.php?https%3A%2F%2Fgithub.com%2Fdouglasspeck%2Fcheck">GitHub</a></p>
        </footer>
    </body>
</html>