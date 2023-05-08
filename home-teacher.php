<?php

if(!isset($_SESSION)) {
    session_start();
}

if($_SESSION['logged'] == false) {
    header("Location: login/login.php");
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
    <body id="home">
        <?php include 'assets/php/header.php' ?>
        <main>
            <section id="profile-section">
                <section>
                    <h2>Olá, <?php echo ($_SESSION['teacher_name'])?>!</h2>
                    <script>
                        var jsDate = new Date("<?php echo $_SESSION['registration_date']; ?>");
                        var formattedDate = jsDate.toLocaleDateString('pt-BR', { year: 'numeric', month: 'long'});
                        document.write("@<?php echo $_SESSION['username']?> - Por aqui desde " + formattedDate + ".");
                    </script>
                </section>
                <section id="statistics">
                    <article>
                        <h3>------- -------</h3>
                        <p>--</p>
                        <span class="chart"></span>
                    </article>
                    <article>
                        <h3>--------- ---------</h3>
                        <p>-</p>
                        <span class="chart"></span>
                    </article>
                    <article>
                        <h3>-------------</h3>
                        <p>- ----</p>
                    </article>
                </section>
            </section>
        </main>
        <?php include 'assets/php/scripts.php' ?>
    </body>
</html>