<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="buttonsForm">
      <div class="btnColor"></div>
      <button id="btnSignin">Entrar</button>
      <button id="btnSignup">Cadastrar</button>
    </div>

    <form action="" id="signin" method="POST">
      <input type="email" name="email" placeholder="Email" autocomplete="email" required />
      <i class="fa fa-envelope-o iEmailin"></i>
      <input type="password" name="senha" placeholder="Senha" autocomplete="current-password" required minlength="8" />
      <i class="material-icons" id="iPasswordin">lock_outline</i>
      <div class="divCheck">
        <input type="checkbox" />
        <span>Lembrar minha senha</span>
      </div>
      <a class="clear" href=" ">Esqueci minha senha</a>
      <button type="submit">Entrar</button>
    </form>

    <form action="" id="signup" method="POST">
      <input type="text" name="nome_aluno" placeholder="Nome do Aluno" pattern="[A-Za-z'\s+]+" required />
      <i class="fa fa-user-o iNameup"></i>
      <div class="select">
        <i class="fa fa-calendar-o iYear"></i>
        <label for="ano_nasc">Ano de nascimento:</label>
        <select id="selectYear" required>
            <option value="">Selecione</option>
            <script>
              var currentYear = new Date().getFullYear();
              var options = "";
              for (var i = currentYear; i >= 1920; i--) {
                options += "<option value='" + i + "'>" + i + "</option>";
              }
              document.getElementById("selectYear").innerHTML += options;
            </script>
          </select>
      </div>
      <input type="email" name="email_aluno" placeholder="Email" autocomplete="email" required />
      <i class="fa fa-envelope-o iEmailup"></i>
      <input type="password" name="password" id="password" placeholder="Senha" autocomplete="current-password" minlength="8" required />
      <i class="material-icons" id="iPasswordup">lock_outline</i>
      <input type="password" name="confirm" id="confirm" placeholder="Confirmar senha" autocomplete="current-password" required minlength="8" />
      <i class="material-icons" id="iPasswordup2">lock_outline</i>
      <div class="divCheck2">
        <input type="checkbox" required />
        <span>Li e concordo com os termos da <a href="https://privacidade.dados.unicamp.br/" target="_blank">Política de Privacidade</a></span>
      </div>
      <button type="submit" name="cadastrar">Cadastrar-se</button>
    </form>
  </div>

  <script src="../js/login.js"></script>
</body>
</html>