<?php
        require_once 'assets/php/mysqli/config.php';
        require_once 'assets/php/mysqli/db.php';

        $db = connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

        $data = fetchAll($db);

        echo $data;

?>