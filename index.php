<?php

    if(!isset($_SESSION)) {
        session_start();
    }

    if ($_GET['logout'] == true) {
        unset($_SESSION['logged']);
        // We should include a logout function
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
    <a href="login.php">login</a>
</body>
</html>