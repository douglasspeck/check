<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if ($_GET['logout'] == true) {
        session_destroy();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="login/login.php">login</a>
</body>
</html>