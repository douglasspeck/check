<?php

if(!isset($_SESSION)) {
    session_start();
}

if ($_GET['logout'] == true) {
    session_destroy();
    header("Location: /~fracoes");
}

$rl = isset($rl) ? $rl : true;

if($_SESSION['logged'] == false && $rl) {
    header("Location: /~fracoes/login.php");
}

?>