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
        <?php include '../assets/php/header.php' ?>
        <main>
            <h1>Caderno Autocorretivo: Frações</h1>
            <section class="gallery">

                <set figures='{"circles":5}'>
                    <subset figures='{"circles":2}'></subset>
                </set>

                <associate>
                    <first>
                        <figure fill=1 shape="square" sections=4></figure>
                        <figure fill=1 shape="triangle" sections=3></figure>
                        <figure paint shape="circle" sections=3></figure>
                    </first>
                    <second>
                        <fraction den=3></fraction>
                        <fraction num=1 den=4></fraction>
                    </second>
                </associate>

            </section>


            <section class="input">
                <h2>Nova figura</h2>
                <label for="type">Tipo de Atividade</label>
                <select name="type" id="type">
                    <option value="fill">Preencher</option>
                    <option value="paint">Pintar</option>
                </select>
                <label for="shape">Figura</label>
                <select name="shape" id="shape">
                    <option value="square">Quadrado</option>
                    <option value="rect">Retângulo</option>
                    <option value="triangle">Triângulo</option>
                    <option value="circle">Círculo</option>
                </select>
                <label for="size">Tamanho</label>
                <input name="size" id="size" type="number">
                <label for="sections">Número de seções</label>
                <input name="sections" id="sections" type="number">
                <label for="num">Numerador</label>
                <input name="num" id="num" type="number">
                <label for="den">Denominador</label>
                <input name="den" id="den" type="number">
                <label for="vis-num">Visibilidade do Num</label>
                <input name="vis-num" id="vis-num" type="checkbox">
                <label for="vis-den">Visibilidade do Den</label>
                <input name="vis-den" id="vis-den" type="checkbox">
                <button onclick="inputFigure()">Gerar</button>
            </section>

            <section id="white-canvas" class="gallery"></section>
        </main>
        <?php include '../assets/php/scripts.php' ?>
    </body>
</html>