<?php

function connect($db_host, $db_name, $db_user, $db_password){
    $db = new mysqli($db_host, $db_user, $db_password, $db_name);
    if($db->connect_error){
        die("Error connecting to database: \n")
        . $db->connect_error . "\n"
        . $db->connect_errno;
    }
    return $db;
}

function fetchAll(mysqli $db){
    $data = [];
    $sql = "SELECT * FROM `aluno`";
    $results = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

?>