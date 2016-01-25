<?php
include('../tcpdf/tcpdf.php'); 
$string = get_include_contents('application.php');

function get_include_contents($filename) {
    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}

echo $string;



?>