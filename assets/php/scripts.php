<?php

    include 'url.php';

    if ($isLocal === 0) {
        $to_scan = '/~fracoes/assets/js/';
        $to_src = '/~fracoes/assets/js/';
    } else {
        $to_scan = 'assets/js/';
        $to_src = '/assets/js/';
    }
    
    $js = scandir($to_scan);

    if (count($js) > 0) {echo '<!-- Scripts -->';};

    foreach ($js as $js_file) {

        if (!is_dir($js_file)) {
            echo '<script src="' . $to_src . $js_file. '?t=' . date('YmdHis') . '"></script>';
        }

    }

?>