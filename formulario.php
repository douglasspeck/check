<!-- backend -->

<!DOCTYPE html>
<html lang="pt-BR">
  <?php
    $title = 'Questionário do Aluno';
    $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
    $resources = [];
    include 'assets/php/head.php';
  ?>
  <body class="form-page" id="form-page">

    <div id="form-question">

      <h2 id="form-question-text"></h2>

      <div id="form-question-options"></div>
      
      <div id="form-question-button-container">
        <div class="form-question-button-div">
          <button id="form-question-button-after">Anterior</button>
        </div>

        <div class="form-question-button-div">
          <button id="form-question-button-next"></button>
        </div>
      </div>

    </div>

    <?php include 'assets/php/scripts.php'; ?>
  </body>
</html>