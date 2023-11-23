<?php

    $to_scan = '../assets/js/';
    
    $js = scandir($to_scan);

    if (count($js) > 0) {echo '<!-- Scripts -->';};

    foreach ($js as $js_file) {

        if (!is_dir($js_file)) {
            echo '<script src="/~fracoes/assets/js/' . $js_file. '?t=' . date('YmdHis') . '"></script>';
        }

    }

?>