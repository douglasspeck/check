<?php

require_once "config.php";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "<script>console.log('Failed to connect: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "');</script>";
} else {
    echo "<script>console.log('MySQLi: Succesfully connected!');</script>";
}

function fetchAll(mysqli $db, $table){
    $data = [];
    $sql = "SELECT * FROM " . $table;
    $results = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function getSequence(mysqli $db, $notebook, $sequence){
    $data = [];
    $sql = "SELECT ('id_activities','parameters') FROM 'activities' WHERE 'notebook' = " . $notebook . " AND 'sequence' = " . $sequence;
    $results = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// O parâmetro $dataset é um array de elementos na forma ['coluna', $valor]

function update(mysqli $db, $table, $dataset, $id){
    $update = '';
    for($i = 0; $i < count($dataset); $i++) {
        $update = $update . "`" . $dataset[$i][0] . "` = '" . $dataset[$i][1] . "'";
        if ($i < count($dataset) - 1) {
            $update = $update . ", ";
        }
    }

    $sql = "UPDATE aula_db." . $table . " SET $update WHERE id = $id";

    $db->query($sql);
}

function newLine(mysqli $db, $table, $lastId){
    $lastId++;
    $sql = "INSERT INTO aula_db." . $table . " (`id`) VALUES ($lastId)";
    $db->query($sql);
}

function delete(mysqli $db, $id){
    $sql = "DELETE FROM aula_db.clientes WHERE (`id` = $id)";
    $db->query($sql);
    $sql = "UPDATE aula_db.clientes SET `id` = `id` - 1 WHERE `id` > $id";
    $db->query($sql);
}

?>