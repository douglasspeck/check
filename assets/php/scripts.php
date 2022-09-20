<?php

    $js = scandir('../assets/js/');

    if (count($js) > 0) {echo '<!-- Scrypts -->';};

    foreach ($js as $js_file) {

        if (!is_dir($js_file)) {
            echo '<script src="../assets/js/' . $js_file . '?t=' . date('YmdHis') . '"></script>';
        }

    }

?>