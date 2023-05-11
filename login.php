<?php

require_once 'assets/php/mysqli/db.php';

if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION['logged']) && $_SESSION['logged']) {
    header("Location: home.php");
}

if(isset($_POST['signin'])) {
    $dataset_student = [
        ['email_student', addslashes($_POST['username_or_email'])],
        ['username', addslashes($_POST['username_or_email'])]
    ];

    $dataset_teacher = [
        ['email_teacher', addslashes($_POST['username_or_email'])],
        ['username', addslashes($_POST['username_or_email'])]
    ];

    $student = fetchAll($db, 'student', 0, $dataset_student)->fetch_assoc();
    $teacher = fetchAll($db, 'teacher', 0, $dataset_teacher)->fetch_assoc();
    
    if($student || $teacher) {

        if($student && password_verify(addslashes($_POST['password']), $student['password'])) {

            $_SESSION['id_student'] = $student['id_student'];
            $_SESSION['student_name'] = $student['student_name'];
            $_SESSION['username'] = $student['username'];
            $_SESSION['email_student'] = $student['email_student'];
            $_SESSION['registration_date'] = $student['registration_date'];

            $_SESSION['logged'] = true;
            header("Location: home.php");

        } else if ($teacher && password_verify(addslashes($_POST['password']), $teacher['password'])) {
            $_SESSION['id_teacher'] = $teacher['id_teacher'];
            $_SESSION['teacher_name'] = $teacher['teacher_name'];
            $_SESSION['username'] = $teacher['username'];
            $_SESSION['email_teacher'] = $teacher['email_teacher'];
            $_SESSION['registration_date'] = $teacher['registration_date'];
            
            $_SESSION['logged'] = true;
            header("Location: home-teacher.php");

        } else {
            echo '<script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const messageError = "Senha incorreta";
                alertErrorLogin(messageError);
            });
            </script>';
        }
    } else {
        echo '<script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const messageError = "Usuário ou Email não encontrado";
            alertErrorLogin(messageError);
        });
        </script>';
    }
}

if(isset($_POST['signup-student'])) {
    $table = 'student';
    $dataset = [
        ['student_name', addslashes($_POST['student_name'])],
        ['username', addslashes($_POST['username'])],
        ['email_student', addslashes($_POST['email_student'])],
        ['password', password_hash($_POST['password'], PASSWORD_DEFAULT)],
        ['registration_date', date('Y-m-d')]
    ];
    
    echo (newLine($db, $table, $dataset));
    
    $user = (fetchAll($db, $table, $dataset))->fetch_assoc();
    
    $_SESSION['id_student'] = $user['id_student'];
    $_SESSION['student_name'] = $user['student_name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email_student'] = $user['email_student'];
    $_SESSION['registration_date'] = $user['registration_date'];
    
    $_SESSION['logged'] = true;
    header("Location: home.php");

    $md5 = md5($_SESSION['id_student']);

    $subject = 'Confirmação de Email Pendente';
    $link = 'http://ime.unicamp.br/~fracoes/emailconfirm.php?h=' . $md5;
    $message = 'Olá, ' . $_SESSION['student_name'] . '

    Seja muito bem-vindo(a)!
    Sua conta ' . $_SESSION['username'] . ' foi criada com sucesso.

    Clique no link abaixo para confirmar seu endereço de email.' .
    $link;
    $header = 'From: Check Frações noreply@check.com';

    mail($_SESSION['email_student'], $subject, $message, $header);

}

if(isset($_POST['signup-teacher'])) {
    $table = 'teacher';
    $dataset = [
        ['teacher_name', addslashes($_POST['teacher_name'])],
        ['surname', addslashes($_POST['surname'])],
        ['username', addslashes($_POST['username'])],
        ['id_teacher', addslashes($_POST['id_teacher'])],
        ['email_teacher', addslashes($_POST['email_teacher'])],
        ['password', password_hash($_POST['password'], PASSWORD_DEFAULT)],
        ['registration_date', date('Y-m-d')]
    ];

    newLine($db, $table, $dataset);
    
    $user = (fetchAll($db, $table, $dataset))->fetch_assoc();

    $_SESSION['id_teacher'] = $user['id_teacher'];
    $_SESSION['teacher_name'] = $user['teacher_name'];
    $_SESSION['surname'] = $user['surname'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email_teacher'] = $user['email_teacher'];
    $_SESSION['registration_date'] = $user['registration_date'];

    $_SESSION['logged'] = true;
    header("Location: home-teacher.php");

    /*$md5 = md5($_SESSION['id_teacher']);

    $subject = 'Confirmação de Email Pendente';
    $link = 'http://ime.unicamp.br/~fracoes/emailconfirm.php?h=' . $md5;
    $message = 'Olá, ' . $_SESSION['teacher_name'] . '

    Seja muito bem-vindo(a)!
    Sua conta ' . $_SESSION['username'] . ' foi criada com sucesso.

    Clique no link abaixo para confirmar seu endereço de email.' .
    $link;
    $header = 'From: Check Frações noreply@check.com';

    mail($_SESSION['email_teacher'], $subject, $message, $header);*/

}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre ou Cadastre-se</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<body class="login-page" id="login-page">
    <div class="form-container">  
        <form action="login.php" id="signin" method="POST">
            <h2>Entrar</h2>
            <div>      
                <input
                    type="text"
                    name="username_or_email"
                    placeholder="Usuário ou Email"
                    autocomplete="email"
                    maxlength=50
                    required
                    tabindex="-1"
                />
                <span class="material-icons">mail</span>
            </div>
            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Senha"

                    <?php
                    if(isset($_POST['signin']) && isset($_POST['remember-password'])) {
                        echo "autocomplete=\"current-password\"";
                    }
                    ?>

                    required
                    tabindex="-1"
                />
                <span class="material-icons">lock</span>
            </div>
            <div class="checkbox">
                <input
                    type="checkbox"
                    name="remember-password"
                    tabindex="-1"
                />
                <span>Lembrar minha senha</span>
            </div>
            <button type="submit" tabindex="-1" name="signin">Entrar</button>
            <a id="forgotpass-link" tabindex="-1" href="forgotpass.php">Esqueci minha senha</a>
            <div class="signup-link">
                <p>Não tem uma conta?&nbsp;<div class="other-form" id="create-account">Cadastre-se</div></p>
            </div>
        </form>

        <div class="form-buttons">
            <div class="btn-color"></div>
            <button id="btn-student" tabindex="-1">Aluno</button>
            <button id="btn-teacher" tabindex="-1">Professor</button>
        </div>

        <form action="login.php" id="signup-student" method="POST">
            <div>  
                <input 
                    type="text"
                    name="student_name"
                    placeholder="Nome do Aluno"
                    pattern="[A-Za-z'\s+]+"
                    maxlength=35
                    required
                    tabindex="-1"
                />
                <span class="material-icons">person</span>
            </div>
            <div>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Nome de Usuário"
                    pattern="^[a-zA-Z0-9_]+$"
                    maxlength=20
                    required
                    tabindex="-1"
                />
                <span class="material-icons">alternate_email</span> 
            </div>
            <div>
                <input
                    type="email"
                    name="email_student"
                    placeholder="Email"
                    autocomplete="email"
                    maxlength=50
                    required
                    tabindex="-1"
                />
                <span class="material-icons">mail</span>
            <div>
            </div>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Senha"
                    minlength="8"
                    required
                    tabindex="-1"
                />
                <span class="material-icons">lock</span>
            </div>
            <div>
                <input
                    type="password"
                    name="password_confirm"
                    id="confirm"
                    placeholder="Confirmar senha"
                    minlength="8"
                    required
                    tabindex="-1"
                />
                <span class="material-icons">lock</span>
            </div>  
            <div class="checkbox-terms">
                <input
                    type="checkbox"
                    required
                    tabindex="-1"
                />
                <span>Li e concordo com os termos da <a href="https://privacidade.dados.unicamp.br/" tabindex="-1" target="_blank">Política de Privacidade</a></span>
            </div>
            <button type="submit" tabindex="-1" name="signup-student">Cadastrar-se</button>
            <div class="signin-link">
                <p>Já é cadastrado?&nbsp;<div class="other-form" id="enter-account1">Fazer Login</div></p>
            </div>
        </form>

        <form action="login.php" id="signup-teacher" method="POST">
        <div id="form-column1">
        <div>
            <input 
                type="text"
                name="teacher_name"
                placeholder="Nome do Professor"
                pattern="[A-Za-z'\s+]+"
                maxlength=35
                required
                tabindex="-1"
            />
            <span class="material-icons" id="person1-signup-teacher">person_4</span>
        </div>
        <div>
            <input
                type="text"
                id="surname"
                name="surname"
                placeholder="Apelido (opcional)"
                pattern="[A-Za-z'\s+]+"
                maxlength=20
                tabindex="-1"
            />
            <span class="material-icons" id="person2-signup-teacher">person_4</span>
        </div>
        <div>
            <input
                type="text"
                id="username"
                name="username"
                placeholder="Nome de Usuário"
                pattern="^[a-zA-Z0-9_]+$"
                maxlength=20
                required
                tabindex="-1"
            />
            <span class="material-icons">alternate_email</span>
        </div>
        <div>
            <input
                type="text"
                id="id_teacher"
                name="id_teacher"
                placeholder="Registro do Professor"
                pattern="[0-9]{10}"
                maxlength=10
                required
                tabindex="-1"
            />
            <span class="material-icons">pin</span>
        </div>
        <div>
            <input
                type="email"
                name="email_teacher"
                placeholder="Email"
                autocomplete="email"
                maxlength=50
                required
                tabindex="-1"
            />
            <span class="material-icons">mail</span>
        </div>
        </div>
        <div id="form-column2">
        <div>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Senha"
                minlength="8"
                required
                tabindex="-1"
            />
            <span class="material-icons">lock</span>
        </div>
        <div>
            <input
                type="password"
                name="password_confirm"
                id="confirm"
                placeholder="Confirmar senha"
                minlength="8"
                required
                tabindex="-1"
            />
            <span class="material-icons">lock</span>
        <div class="checkbox-terms">
            <input
                type="checkbox"
                required
                tabindex="-1"
            />
            <span>Li e concordo com os termos da <a href="https://privacidade.dados.unicamp.br/" tabindex="-1" target="_blank">Política de Privacidade</a></span>
        </div>
        <button type="submit" tabindex="-1" name="signup-teacher">Cadastrar-se</button>
        <div class="signin-link">
            <p>Já é cadastrado?&nbsp;<div class="other-form" id="enter-account2">Fazer Login</div></p>
        </div>
        </div>
        </form>
    </div>
    <script src="assets/js/login.js"></script>
</body>
</html>