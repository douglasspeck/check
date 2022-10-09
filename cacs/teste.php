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

                <article class="figure fill" shape="square" size=100 sections=4 num=1 den=4 show="d"></article>

                <article class="figure fill" shape="rect" size=100 sections=6 num=2 den=6 show="d"></article>

                <article class="figure fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="87px" viewBox="0 0 100 100" version="1.1" id="figure-3">
                        <defs></defs>
                        <g>
                            <path d="M 0 100 L 50 100 L 25 50 Z" class="filled" />
                            <path d="M 50 100 L 100 100 L 75 50 Z" />
                            <path d="M 50 100 L 25 50 L 75 50 Z" />
                            <path d="M 25 50 L 75 50 L 50 0 Z" />
                        </g>
                    </svg>
                    <div class="fraction">
                        <input type="number">
                        <input type="number">
                    </div>
                </article>

                <article class="figure fill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="87px" viewBox="0 0 100 90" version="1.1" id="figure-4">
                        <defs></defs>
                        <g>
                            <path d="M 0 90 L 50 90 L 50 60 Z" class="filled" />
                            <path d="M 0 90 L 25 45 L 50 60 Z" />
                            <path d="M 100 90 L 50 90 L 50 60 Z" />
                            <path d="M 100 90 L 75 45 L 50 60 Z" />
                            <path d="M 25 45 L 50 60 L 50 0 Z" />
                            <path d="M 75 45 L 50 60 L 50 0 Z" />
                        </g>
                    </svg>
                    <div class="fraction">
                        <input type="number">
                        <input type="number">
                    </div>
                </article>

                <article class="figure paint" shape="rect" size=100 sections=6 num=2 den=6></article>

                <article class="figure paint">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="87px" viewBox="0 0 100 90" version="1.1" id="figure-4">
                        <defs></defs>
                        <g paintable>
                            <path d="M 0 90 L 50 90 L 50 60 Z" />
                            <path d="M 0 90 L 25 45 L 50 60 Z" />
                            <path d="M 100 90 L 50 90 L 50 60 Z" />
                            <path d="M 100 90 L 75 45 L 50 60 Z" />
                            <path d="M 25 45 L 50 60 L 50 0 Z" />
                            <path d="M 75 45 L 50 60 L 50 0 Z" />
                        </g>
                    </svg>
                    <div class="fraction">
                        <input type="number" value=2 readonly>
                        <input type="number" value=6 readonly>
                    </div>
                </article>

                <article class="figure paint" shape="square" size=100 sections=2 num=1 den=2></article>

                <article class="figure paint" shape="circle" cy=50 cx=50 r=49 sections=3 num=1 den=3></article>

                <article class="associate" id="assoc-001">

                    <section class="figures-container">
                        <div id="assoc-001-fig1" onclick="associate(this);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 100 100" version="1.1" id="figure-9">
                                <defs></defs>
                                <g>
                                    <path d="M 0 0 L 50 0 L 50 50 L 0 50 Z" />
                                    <path d="M 50 0 L 100 0 L 100 50 L 50 50 Z" />
                                    <path d="M 0 50 L 50 50 L 50 100 L 0 100 Z" class="filled" />
                                    <path d="M 50 50 L 100 50 L 100 100 L 50 100 Z" />
                                </g>
                            </svg>
                        </div>
                        <div id="assoc-001-fig2" onclick="associate(this);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 90 60" version="1.1" id="figure-10">
                                <defs></defs>
                                <g>
                                    <rect width="30" height="30" x="0" y="0" />
                                    <rect width="30" height="30" x="30" y="0" />
                                    <rect width="30" height="30" x="60" y="0" />
                                    <rect width="30" height="30" x="0" y="30" class="filled" />
                                    <rect width="30" height="30" x="30" y="30" class="filled" />
                                    <rect width="30" height="30" x="60" y="30" />
                                </g>
                            </svg>
                        </div>
                        <div id="assoc-001-fig3" onclick="associate(this);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="87px" viewBox="0 0 100 100" version="1.1" id="figure-11">
                                <defs></defs>
                                <g>
                                    <path d="M 0 100 L 50 100 L 25 50 Z" class="filled" />
                                    <path d="M 50 100 L 100 100 L 75 50 Z" />
                                    <path d="M 50 100 L 25 50 L 75 50 Z" />
                                    <path d="M 25 50 L 75 50 L 50 0 Z" />
                                </g>
                            </svg>
                        </div>
                    </section>

                    <section class="fractions-container">
                        <div id="assoc-001-fra1" onclick="associate(this);">
                            <div class="fraction">
                                <input type="number" value=1 readonly>
                                <input type="number" value=4 readonly>
                            </div>
                        </div>
                        <div id="assoc-001-fra2" onclick="associate(this);">
                            <div class="fraction">
                                <input type="number" value=1 readonly>
                                <input type="number" value=3 readonly>
                            </div>
                        </div>
                    </section>

                </article>

            </section>
        </main>
        <?php include '../assets/php/scripts.php' ?>
    </body>
</html>