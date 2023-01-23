<?php

if(basename($_SERVER['PHP_SELF'], '.php') === basename(__FILE__, '.php')) {
    header('HTTP/1.0 404 Not found!');
    die();
}

require_once '../../../../vendor/autoload.php';
