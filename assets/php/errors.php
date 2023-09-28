<?php

    function err($id) {

        if ($error_list[$id]) {
            echo('<script onload="this.remove();">newError('.$id.');</script>');
        } else {
            echo('<script onload="this.remove();">console.log("Unknown Error.");</script>');
        }

    }

?>