<?php

require_once "config.php";

function connect($db_host, $db_name, $db_user, $db_pass){
    $db = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if($db->connect_error){
        die("<script>console.log('Error connecting to database: \n")
        . $db->connect_error . "\n"
        . $db->connect_errno
        . "');</script>";
    }
    return $db;
}

try {
    $db = connect($db_host, $db_name, $db_user, $db_pass);
} catch (Exception $e) {
    err(602);
    $db = false;
}

// O parâmetro opcional $dataset é um array de elementos na forma ['coluna', $valor] para busca

function fetchAll(mysqli $db, $table, $dataset_and=0, $dataset_or=0){
    $sql = "SELECT * FROM $table";
    if($dataset_and != 0 && $dataset_or === 0) {
        $sql .= " WHERE ";
        for($i = 0; $i < count($dataset_and); $i++) {
            $column = $db->real_escape_string($dataset_and[$i][0]);
            $value = $db->real_escape_string($dataset_and[$i][1]);
            $sql .= "$column = '$value'";
            if ($i < count($dataset_and) - 1) {
                $sql .= " AND ";
            }
        }
    } else if ($dataset_and === 0 && $dataset_or != 0) {
        $sql .= " WHERE ";
        for($i = 0; $i < count($dataset_or); $i++) {
            $column = $db->real_escape_string($dataset_or[$i][0]);
            $value = $db->real_escape_string($dataset_or[$i][1]);
            $sql .= "$column = '$value'";
            if ($i < count($dataset_or) - 1) {
                $sql .= " OR ";
            }
        }
    }
    $results = $db->query($sql);
    return $results;
}

function checkIfExists(mysqli $db, $table, $column, $value) {
    $sql = "SELECT COUNT(*) as count FROM $table WHERE $column = '" . $db->real_escape_string($value) . "'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}

function getFormQuestion(mysqli $db) {
    $data = [];
    $sql = "SELECT `type_question`,`title_question`,`options_question`,`values_question` FROM form_questions";
    $results = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function getSequence(mysqli $db, $notebook, $sequence){
    if (!$db) {return false;}
    $data = [];
    $sql = "SELECT id_activity,parameters FROM activities WHERE notebook = " . $notebook . " AND sequence = " . $sequence;
    $results = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// O parâmetro $dataset é um array de elementos na forma ['coluna', $valor]

function newLine(mysqli $db, $table, $dataset) {
    $columns = [];
    $values = [];
    foreach($dataset as $data) {
        $columns[] = $data[0];
        $values[] = "'" . $db->real_escape_string($data[1]) . "'";
    }
    $column_names = implode(',', $columns);
    $column_values = implode(',', $values);
    $sql = "INSERT INTO $table ($column_names) VALUES ($column_values)";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function update(mysqli $db, $table, $dataset, $id){
    $update = '';
    for($i = 0; $i < count($dataset); $i++) {
        $update = $update . $dataset[$i][0] . " = '" . $dataset[$i][1] . "'";
        if ($i < count($dataset) - 1) {
            $update = $update . ", ";
        }
    }
    $sql = "UPDATE $table SET $update WHERE id = $id";
    $db->query($sql);
}

// essa função precisa ser adaptada
function delete(mysqli $db, $id){
    $sql = "DELETE FROM aula_db.clientes WHERE (`id` = $id)";
    $db->query($sql);
    $sql = "UPDATE aula_db.clientes SET `id` = `id` - 1 WHERE `id` > $id";
    $db->query($sql);
}

?>