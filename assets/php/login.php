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

    <form action="" id="signin" method="POST">
      <input
        type="email"
        name="email"
        placeholder="Email"
        autocomplete="email"
        maxlength=50
        required />
        <span class="material-icons" id="mail-signin">mail</span>
      <input
        type="password"
        name="senha"
        placeholder="Senha"
        autocomplete="current-password"
        minlength="8"
        required />
        <span class="material-icons" id="lock-signin">lock</span>
      <div class="divCheckbox">
        <input
          type="checkbox" />
          <span>Lembrar minha senha</span>
      </div>
      <a class="clear" href=" ">Esqueci minha senha</a>
      <button type="submit">Entrar</button>
    </form>

    <form action="" id="signup" method="POST">
      <input 
        type="text"
        name="nome_aluno"
        placeholder="Nome do Aluno"
        pattern="[A-Za-z'\s+]+"
        maxlength=35
        required />
        <span class="material-icons" id="person-signup">person</span>
      <input
        type="text"
        id="username"
        name="nome_usuario"
        placeholder="Nome de Usuário"
        pattern="^[a-zA-Z0-9_]+$"
        maxlength=20
        required />
        <span class="material-icons" id="alternate-signup">alternate_email</span>
      <input
        type="email"
        name="email_aluno"
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
        name="confirm"
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
      <button type="submit" name="cadastrar">Cadastrar-se</button>
    </form>
  </div>

  <script src="../js/login.js"></script>
</body>
</html>