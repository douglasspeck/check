<?php

    include 'url.php';
    
    $js = scandir('/~fracoes/assets/js/');

    if (count($js) > 0) {echo '<!-- Scripts -->';};

    foreach ($js as $js_file) {

        if (!is_dir($js_file)) {
            echo '<script src="/~fracoes/assets/js/?t=' . date('YmdHis') . '"></script>';
        }

    }

?>