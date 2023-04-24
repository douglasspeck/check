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

// O parâmetro $dataset é opicional e não é fornecido para que seja retornado a tabela com todos os registros
// Por outro lado, $dataset pode ser um array de elementos na forma ['coluna', $valor]
function fetchAll($table, $dataset=0){
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
    echo $sql . "<br>";

    $data = $db->query($sql);
    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }

    print_r($data);

    return $data;
}

$dataset = [
    ['email_student', 'teste@gmail.com'/*$_POST['email_student']*/],
    ['password', '123456789'/*$_POST['password']*/]
];

fetchAll('student', $dataset);

?>