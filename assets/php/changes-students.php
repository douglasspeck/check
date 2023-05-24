<?php

require_once 'mysqli/db.php';

if(!isset($_SESSION)) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_activity = intval(substr($_POST['inputName'], 13)) + 1;
  $id_student = $_SESSION['id_student'];
  $input_name = $_POST['inputName'];
  $input_value = addslashes($_POST['inputValue']);

  $timezone = new DateTimeZone('America/Sao_Paulo');
  $datetime = new DateTime('now', $timezone);

  $table = 'inputs_temp';
  $dataset = [
    ['id_activity', $id_activity],
    ['id_student', $id_student],
    ['input_name', $input_name],
    ['input_value', $input_value],
    ['register_date', $datetime->format('Y-m-d H:i:s')]
  ];

  newLine($db, $table, $dataset);

  header('Content-Type: application/json');
  echo json_encode(['status' => 'success']);
} else {
  header('HTTP/1.1 403 Forbidden');
}

?>