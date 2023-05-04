<?php

require_once 'assets/php/mysqli/db.php';

if(!isset($_SESSION)) {
  session_start();
}

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true) {
  header("Location: home.php");
}

if(isset($_POST['signin']))
{
  $table = 'student';
  $dataset = [
    ['email_student', $_POST['email_student']],
    ['password', $_POST['password']]
  ];
  
  $quant = fetchAll($db, $table, $dataset)->num_rows;
  
  if($quant == 1) {
    $user = (fetchAll($db, $table, $dataset))->fetch_assoc();
    
    if(!isset($_SESSION)) {
      session_start();
    }
    
    $_SESSION['student_name'] = $user['student_name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['registration_date'] = $user['registration_date'];
    
    $_SESSION['logged'] = true;
    header("Location: home.php");
    
  } else {
    echo "<a class=\"incorrect\">Falha ao logar! Email ou senha incorretos.</a>";
  }
  
}

if(isset($_POST['signup']))
{
  $table = 'student';
  $dataset = [
    ['student_name',$_POST['student_name']],
    ['username', $_POST['username']],
    ['email_student', $_POST['email_student']],
    ['password', $_POST['password']],
    ['registration_date', 'mysql_function:CURRENT_DATE']
  ];
  
  newLine($db, $table, $dataset);
  
  $last_element = array_pop($dataset);
  
  $user = (fetchAll($db, $table, $dataset))->fetch_assoc();
  
  if(!isset($_SESSION)) {
    session_start();
  }
  
  $_SESSION['student_name'] = $user['student_name'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['registration_date'] = $user['registration_date'];
  $_SESSION['email_student'] = $user['email_student'];
  
  $_SESSION['logged'] = true;
  header("Location: home.php");

  $md5 = md5($_SESSION['username']);

  $assunto = 'Confirmação de Email Pendente';
  $link = 'http://ime.unicamp.br/~fracoes/assets/php/emailconfirm.php?h=' . $md5;
  $mensagem = 'Olá, ' . $_SESSION['student_name'] . '</br>
    Seja muito bem vindo(a)!</br>
    Clique no link para confirmar seu cadastro: ' . $link;
  $header = 'Email enviado por Check';

  mail($_SESSION['email_student'], $assunto, $mensagem, $header);

}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet" />
</head>
<body class="page-login" id="page-login">
  <div class="container">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Entrar</button>
      <button id="btnSignup">Cadastrar</button>
    </div>

    <form action="login.php" id="signin" method="POST">
      <input
        type="email"
        name="email_student"
        placeholder="Email"
        autocomplete="email"
        maxlength=50
        required
        tabindex="-1"/>
        <span class="material-icons" id="mail-signin">mail</span>
      <input
        type="password"
        name="password"
        placeholder="Senha"
        autocomplete="current-password"
        required
        tabindex="-1"/>
        <span class="material-icons" id="lock-signin">lock</span>
      <div class="divCheckbox">
        <input
          type="checkbox"
          tabindex="-1"/>
          <span>Lembrar minha senha</span>
      </div>
      <a class="clear" tabindex="-1" href=" ">Esqueci minha senha</a>
      <button type="submit" tabindex="-1" name="signin">Entrar</button>
    </form>

    <form action="login.php" id="signup" method="POST">
      <input 
        type="text"
        name="student_name"
        placeholder="Nome do Aluno"
        pattern="[A-Za-z'\s+]+"
        maxlength=35
        required
        tabindex="-1"/>
        <span class="material-icons" id="person-signup">person</span>
      <input
        type="text"
        id="username"
        name="username"
        placeholder="Nome de Usuário"
        pattern="^[a-zA-Z0-9_]+$"
        maxlength=20
        required
        tabindex="-1"/>
        <span class="material-icons" id="alternate-signup">alternate_email</span>
      <input
        type="email"
        name="email_student"
        placeholder="Email"
        autocomplete="email"
        maxlength=50
        required
        tabindex="-1"/>
        <span class="material-icons" id="mail-signup">mail</span>
      <input
        type="password"
        name="password"
        id="password"
        placeholder="Senha"
        autocomplete="current-password"
        minlength="8"
        required
        tabindex="-1"/>
        <span class="material-icons" id="lock-signup">lock</span>
      <input
        type="password"
        name="password_confirm"
        id="confirm"
        placeholder="Confirmar senha"
        autocomplete="current-password"
        minlength="8"
        required
        tabindex="-1"/>
        <span class="material-icons" id="lockconfirm-signup">lock</span>
      <div class="divCheckbox2">
        <input
          type="checkbox"
          required
          tabindex="-1"/>
          <span>Li e concordo com os termos da <a href="https://privacidade.dados.unicamp.br/" tabindex="-1" target="_blank">Política de Privacidade</a></span>
      </div>
      <button type="submit" tabindex="-1" name="signup">Cadastrar-se</button>
    </form>
  </div>

  <script src="assets/js/login.js"></script>
</body>
</html>