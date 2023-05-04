<?php

require_once 'mysqli/db.php';

$h = $_GET['h'];

if(!empty($h)) {
    $db->query("UPDATE student SET email_status='1' WHERE MD5(username)='$h'");
    echo 'Confirmação de email realizada com sucesso!';
}

?>