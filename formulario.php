<?php

require_once 'assets/php/mysqli/db.php';

if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['logged'] == false) {
  header("Location: login.php");
  exit();
}

// Check if there is data received in JSON format
$data = json_decode(file_get_contents('php://input'), true);

// Manipulations of the answers array and new line in the database
if ($data != null) {
// form_answers table columns
  $columns_db = [
    'student_id_student',
    'teacher_id_teacher',
    'user',
    'birth_year',
    'sex',
    'question_4',
    'question_5',
    'question_6',
    'question_7',
    'question_8',
    'question_9',
    'question_10',
    'question_11',
    'question_12',
    'question_13',
    'question_14',
    'question_15',
    'question_16',
    'question_17',
    'question_18',
    'question_19',
    'question_20',
    'question_21',
    'question_22'
  ];

// Get array of form answers from JS file
  $selectedAnswers = $data['selectedAnswers'];

// Check and add user type and user id in array of answers
  if (isset($_SESSION['id_student'])) {
    $id_user = $_SESSION['id_student'];
    $answers_form = array_merge([$id_user, null], $selectedAnswers);
  } else if (isset($_SESSION['id_teacher'])) {
    $id_user = $_SESSION['id_teacher'];
    $answers_form = array_merge([null, $id_user], $selectedAnswers);
  }

// Ensure array answers have 24 terms to add to all table form_answers columns (except pk which auto increments)
  while (count($answers_form) < 24) {
    $answers_form[] = null;
  }

// Create array $dataset [key, value] where the key is the table column of the database and the value is user answer form
  $dataset = array_map(function ($columns, $answers) {
    return [$columns, $answers];
  }, $columns_db, $answers_form);

// Remove terms [key, value] that are null of $dataset
  foreach ($dataset as $key => $value) {
    if ($value[1] === null) {
      unset($dataset[$key]);
    }
  }

// Make register of answers in the database and return array answers of server for the JS file
  if (newLine($db, 'form_answers', $dataset)) {
    echo json_encode(["success" => true, "redirect" => "painel.php"]);
    exit();
  } else {
    echo json_encode(["success" => false, "message" => "Houve um erro ao adicionar o registro ao banco de dados."]);
    exit();
  }

}

// Query if the user has already answered the form
if (isset($_SESSION['id_student'])) {
  $column = 'student_id_student';
  $user_id = $_SESSION['id_student'];
} else if (isset($_SESSION['id_teacher'])) {
  $column = 'teacher_id_teacher';
  $user_id = $_SESSION['id_teacher'];
}

$alreadyAnswered = checkIfExists($db, 'form_answers', $column, $user_id);

// If user didn't form answered
if (!$alreadyAnswered) {
  ?>

  <!DOCTYPE html>
  <html lang="pt-BR">
    <?php
    $title = 'Check - Formulário de Cadastro';
    $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
    $resources = [];
    include 'assets/php/head.php';
    ?>
    <script>

      // Get the complete form from the database and add it to $form
      <?php $form = getFormQuestion($db);

      // Set $user = [user type (student or teacher), user id]
      $user = isset($_SESSION['id_student']) ? ['Aluno', $_SESSION['id_student']] : (isset($_SESSION['id_teacher']) ? ['Professor'] : null);

      ?>

      // Send the arrays $user and $form to JS file
      const user = <?php echo json_encode($user); ?>;
      const form = <?php echo json_encode($form); ?>;

    </script>

    <body class="form-page" id="form-page">
      <div id="form-question">
        <h2 id="form-question-text"></h2>
        <div id="form-question-options"></div>

        <div id="form-question-button-container">
          <div class="form-question-button-div">
            <button id="form-question-button-after">Anterior</button>
          </div>
          <div class="form-question-button-div">
            <button id="form-question-button-next">Próximo</button>
          </div>
        </div>
      </div>
      <?php include 'assets/php/scripts.php'; ?>
    </body>
  </html>

  <?php
// If user has already form answered
} else {
  ?>

  <!DOCTYPE html>
  <html lang="pt-BR">
    <?php
    $title = 'Check - Formulário de Cadastro';
    $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
    $resources = [];
    include 'assets/php/head.php';
    ?>
    <body class="form-page" id="form-page-after">

      <?php include 'assets/php/header.php'; ?>

      <h2>Você já respondeu</h2>

      <?php include 'assets/php/footer.php'; ?>

    <?php include 'assets/php/scripts.php'; ?>
    </body>
  </html>

  <?php
}
?>