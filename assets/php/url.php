<?php

    /* URL Methods */

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') { $url = "https://"; }  
    else {$url = "http://"; }  
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    
    $link = basename(__FILE__, '.php');
    if ($link = 'index') {
        $link = '';
    }
    
    $isLocal = 1;
    
    if (strpos($url, 'localhost') > 0) {
        $isLocal = 1;
    }

    $link = $url;

?>