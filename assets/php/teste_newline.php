<?php

function newLine($table, $dataset) {
    $columns = [];
    $values = [];
    foreach($dataset as $data) {
      $columns[] = $data[0];
      if (strpos($data[1], 'mysql_function:') !== false) {
        $values[] = str_replace('mysql_function:', '', $data[1]);
      } else {
        $values[] = "'" . $data[1] . "'";
      }
    }
    $column_names = implode(',', $columns);
    $column_values = implode(',', $values);
    $sql = "INSERT INTO $table ($column_names) VALUES ($column_values)";
    echo $sql;
}

$table = 'student';
$dataset = [
  ['student_name', 'guilherme'],
  ['username', 'guirafael'],
  ['email_student', 'teste@gmail.com'],
  ['password', 'password123'],
  ['registration_date', 'mysql_function:CURRENT_DATE']
];

newLine($table, $dataset);