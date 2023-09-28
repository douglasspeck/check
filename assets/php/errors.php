<?php

    $error_list = [
        601 => [
            'title' => 'Number of inputs is invalid',
            'body' => 'This activity expects two inputs.'
        ],
        602 => [
            'title' => 'No valid connection worked',
            'body' => 'The database activel refused to connect.'
        ]
    ];

    $errors = array();

    function err($id) {

        if ($error_list[$id]) {
            echo('<script onload="this.remove();">console.log("Error: '.$error_list[$id]['body'].'");</script>');
        } else {
            echo('<script onload="this.remove();">console.log("Unknown Error.");</script>');
        }

    }

?>