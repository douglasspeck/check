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

$db = connect($db_host, $db_name, $db_user, $db_pass);

// Em fetchAll() o parâmetro $dataset é opicional e não é fornecido para que seja retornado todos os registros
// Por outro lado, $dataset pode ser um array de elementos na forma ['coluna', $valor] para filtrá-los
function fetchAll(mysqli $db, $table, $dataset=0){
    $data = [];
    $sql = "SELECT * FROM $table";
    if($dataset ==! 0) {
        $sql = $sql . " WHERE ";
        for($i = 0; $i < count($dataset); $i++) {
            $sql = $sql . $dataset[$i][0] . " = '" . $dataset[$i][1] . "'";
            if ($i < count($dataset) - 1) {
                $sql = $sql . " AND ";
            }
        }
    }
    $data = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $sql;
}

function getSequence(mysqli $db, $notebook, $sequence){
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
      $values[] = "'" . $data[1] . "'";
    }
    $column_names = implode(',', $columns);
    $column_values = implode(',', $values);
    $sql = "INSERT INTO $table ($column_names) VALUES ($column_values)";
    $db->query($sql);
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

// need update function
function delete(mysqli $db, $id){
    $sql = "DELETE FROM aula_db.clientes WHERE (`id` = $id)";
    $db->query($sql);
    $sql = "UPDATE aula_db.clientes SET `id` = `id` - 1 WHERE `id` > $id";
    $db->query($sql);
}

?>