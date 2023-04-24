<?php

require_once 'mysqli/db.php';

if(isset($_POST['signin']))
{
  $table = 'student';
  $dataset = [
      ['email_student', $_POST['email_student1']],
      ['password', $_POST['password1']]
  ];

  $sql_query = $mysqli->query(fetchAll(/*$db, */$table, $dataset));
  $data = $sql_query->fetch_all(MYSQLI_ASSOC);
  $quant = count($data);
    

  if($quant >= 1) {

    echo "Encontrado no banco de dados.";
    /*$usuario = $sql_query->fetch_assoc();

    if(!isset($_SESSION)) {
      session_start();
    }

    $_SESSION['id_student'] = $usuario['id_student'];
    $_SESSION['student_name'] = $usuario['student_name'];*/

    header("Location: ../../home.php");

  } else {
    echo "Falha ao logar! Email ou senha incorretos.";
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
  ];

  newLine($db, $table, $dataset);
}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
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
        name="email_student1"
        placeholder="Email"
        autocomplete="email"
        maxlength=50
        required />
        <span class="material-icons" id="mail-signin">mail</span>
      <input
        type="password"
        name="password1"
        placeholder="Senha"
        autocomplete="current-password"
        required />
        <span class="material-icons" id="lock-signin">lock</span>
      <div class="divCheckbox">
        <input
          type="checkbox" />
          <span>Lembrar minha senha</span>
      </div>
      <a class="clear" href=" ">Esqueci minha senha</a>
      <button type="submit" name="signin">Entrar</button>
    </form>

    <form action="login.php" id="signup" method="POST">
      <input 
        type="text"
        name="student_name"
        placeholder="Nome do Aluno"
        pattern="[A-Za-z'\s+]+"
        maxlength=35
        required />
        <span class="material-icons" id="person-signup">person</span>
      <input
        type="text"
        id="username"
        name="username"
        placeholder="Nome de Usuário"
        pattern="^[a-zA-Z0-9_]+$"
        maxlength=20
        required />
        <span class="material-icons" id="alternate-signup">alternate_email</span>
      <input
        type="email"
        name="email_student"
        placeholder="Email"
        autocomplete="email"
        maxlength=50
        required />
        <span class="material-icons" id="mail-signup">mail</span>
      <input
        type="password"
        name="password"
        id="password"
        placeholder="Senha"
        autocomplete="current-password"
        minlength="8"
        required />
        <span class="material-icons" id="lock-signup">lock</span>
      <input
        type="password"
        name="password_confirm"
        id="confirm"
        placeholder="Confirmar senha"
        autocomplete="current-password"
        minlength="8"
        required />
        <span class="material-icons" id="lockconfirm-signup">lock</span>
      <div class="divCheckbox2">
        <input
          type="checkbox"
          required />
          <span>Li e concordo com os termos da <a href="https://privacidade.dados.unicamp.br/" target="_blank">Política de Privacidade</a></span>
      </div>
      <button type="submit" name="signup">Cadastrar-se</button>
    </form>
  </div>

  <script src="../js/login.js"></script>
</body>
</html>