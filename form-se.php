<?php

require_once 'assets/php/mysqli/db.php';

if(!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['send-form'])) {
  $table = 'profile_se';
  $dataset = [
    ['id_student', $_SESSION['id_student']],
    ['birth_year', $_POST['select-year']],
    ['sex', $_POST['radio-sex']],
    ['ethnicity', $_POST['radio-ethnicity']],
    ['institution_type', $_POST['radio-institution-type'] . (isset($_POST['radio-institution-options']) ? " " . $_POST['radio-institution-options'] : '')],
    ['school_year', $_POST['school-year']],
    ['performance_opinion', $_POST['performance-opinion']]
  ];
  
  newLine($db, $table, $dataset);
  
}

$fetch = fetchAll($db, 'profile_se', [['id_student', $_SESSION['id_student']]], 0)->fetch_assoc();

if($_SESSION['logged'] == false) {
  header("Location: login.php");
} else if (isset($_SESSION['id_student']) && !$fetch) {

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <?php
    $title = 'Questionário do Aluno';
    $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
    $resources = [];
    include 'assets/php/head.php';
  ?>
<body>
  <?php include 'assets/php/header.php'?>
  <main class="formse-page" id="formse-page">
    <form action="form-se.php" id="form-se" method="POST">
    <h1>Questionário do Aluno</h1>

    <div class="form-question-select">
      <label for="select-year" class="form-text">Ano de nascimento: <strong>*</strong></label>
        <select id="select-year" name="select-year" required>
          <option value="">Selecione</option>
        </select>
    </div>

    <div class="form-question-radio">
      <label class="form-text">Sexo: <strong>*</strong></label>
      <div class="sex">
        <label for="sex-female" class="form-option">
          <input type="radio" id="sex-female" name="radio-sex" value="Feminino" required>
          Feminino
        </label>
        <label for="sex-male" class="form-option">
          <input type="radio" id="sex-male" name="radio-sex" value="Masculino" required>
          Masculino
        </label>
        <label for="sex-nonbinary" class="form-option">
          <input type="radio" id="sex-nonbinary" name="radio-sex" value="Não-binário" required>
          Não-binário
        </label>
        <label for="sex-none" class="form-option">
          <input type="radio" id="sex-none" name="radio-sex" value="Prefiro não informar" required>
          Prefiro não informar
        </label>
      </div>
    </div>    
      
    <div class="form-question-radio">
      <label class="form-text">Etnia: <strong>*</strong></label>
      <div class="ethnicity">
        <label for="ethnicity-white" class="form-option">
          <input type="radio" id="ethnicity-white" name="radio-ethnicity" value="Branco" required>
          Branco
        </label>
        <label for="ethnicity-black" class="form-option">
          <input type="radio" id="ethnicity-black" name="radio-ethnicity" value="Preto" required>
          Preto
        </label>
        <label for="ethnicity-brown" class="form-option">
          <input type="radio" id="ethnicity-brown" name="radio-ethnicity" value="Pardo" required>
          Pardo
        </label>
        <label for="ethnicity-yellow" class="form-option">
          <input type="radio" id="ethnicity-yellow" name="radio-ethnicity" value="Amarelo" required>
          Amarelo
        </label>
        <label for="ethnicity-indian" class="form-option">
          <input type="radio" id="ethnicity-indian" name="radio-ethnicity" value="Indígena" required>
          Indígena
        </label>
      </div>
    </div>

    <div class="form-question-radio">
      <label class="form-text">Tipo de instituição: <strong>*</strong></label>
      <div class="institution-type">
      <label for="institution-public" class="form-option">
        <input type="radio" id="institution-public" name="radio-institution-type" value="Pública" required>
        Pública
      </label>
      <label for="institution-private" class="form-option">
        <input type="radio" id="institution-private" name="radio-institution-type" value="Privada" required>
        Privada
      </label>
      </div>
    </div>

      <div class="institution-options form-question-radio">
        <label for="institution-municipal" class="form-option">
          <input type="radio" id="institution-municipal" name="radio-institution-options" value="Municipal">
          Municipal
        </label>
        <label for="institution-state" class="form-option">
          <input type="radio" id="institution-state" name="radio-institution-options" value="Estadual">
          Estadual
        </label>
        <label for="institution-federal" class="form-option">
          <input type="radio" id="institution-federal" name="radio-institution-options" value="Federal">
          Federal
        </label>
      </div>
    
    <div class="form-question-select">
      <label for="school-year" class="form-text">Ano escolar: <strong>*</strong></label>
      <select id="school-year" name="school-year" required>
        <option value="">Selecione</option>
        <option value="1º EF">1º ano do Ensino Fundamental</option>
        <option value="2º EF">2º ano do Ensino Fundamental</option>
        <option value="3º EF">3º ano do Ensino Fundamental</option>
        <option value="4º EF">4º ano do Ensino Fundamental</option>
        <option value="5º EF">5º ano do Ensino Fundamental</option>
        <option value="6º EF">6º ano do Ensino Fundamental</option>
        <option value="7º EF">7º ano do Ensino Fundamental</option>
        <option value="8º EF">8º ano do Ensino Fundamental</option>
        <option value="9º EF">9º ano do Ensino Fundamental</option>
        <option value="1º EM">1º ano do Ensino Médio</option>
        <option value="2º EM">2º ano do Ensino Médio</option>
        <option value="3º EM">3º ano do Ensino Médio</option>
        <option value="EJA">EJA</option>
      </select>
    </div>

    <div class="form-question-radio">
      <label for="performance-opinion-input" class="form-text">Você se considera bom em matemática? Responda de 1 a 5: <strong>*</strong></label>
      <div class="performance-opinion">
        <input type="range" id="performance-opinion-input" name="performance-opinion" min="1" max="5" step="1" value="3">
        <div class="performance-opinion-spans">
          <span>1</span>
          <span>2</span>
          <span>3</span>
          <span>4</span>
          <span>5</span>
        </div>
      </div>
    </div>

    <div class="send-button">
      <button type="submit" name="send-form">Enviar</button>
    </div>

  </form>
  </main>
  <?php include 'assets/php/scripts.php' ?>
</body>
</html>

<?php
} else if (isset($_SESSION['id_student']) && $fetch) {
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <?php
    $title = 'Questionário do Aluno';
    $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
    $resources = [];
    include 'assets/php/head.php';
  ?>
<body>
  <?php include 'assets/php/header.php'?>
  <main class="formse-page" id="formse-page-after">
    <h1>Obrigado pelo envio das respostas!</h1>
    <a href="painel.php">Voltar ao Painel</a>
  </main>
</body>
</html>

<?php
} else {
  header("Location: painel.php");
}
?>