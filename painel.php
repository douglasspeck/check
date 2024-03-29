<?php

require_once('assets/php/session.php');

if (isset($_SESSION['id_student'])) {     

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
                            <h2>Olá, <?php echo ($_SESSION['student_name'])?>!</h2>
                            <script>
                                var jsDate = new Date("<?php echo $_SESSION['registration_date']; ?>");
                                var formattedDate = jsDate.toLocaleDateString('pt-BR', { year: 'numeric', month: 'long'});
                                document.write("@<?php echo $_SESSION['username']?> - Aluno desde " + formattedDate + ".");
                            </script>
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
                <?php include 'assets/php/footer.php' ?>
            </body>
        </html>

<?php

    } else if (isset($_SESSION['id_teacher'])) {
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
                            <h2>Olá, <?php echo ($_SESSION['teacher_name'])?>!</h2>
                            <script>
                                var jsDate = new Date("<?php echo $_SESSION['registration_date']; ?>");
                                var formattedDate = jsDate.toLocaleDateString('pt-BR', { year: 'numeric', month: 'long'});
                                document.write("@<?php echo $_SESSION['username']?> - Inscrito desde " + formattedDate + ".");
                            </script>
                        </section>
                    </section>
                </main>
                <?php include 'assets/php/footer.php' ?>
            </body>
        </html>

<?php

    };

?>