<?php

if(basename($_SERVER['PHP_SELF'], '.php') === basename(__FILE__, '.php')) {
    header('HTTP/1.0 404 Not found!');
    die();
}

require_once BASE_ROOT . '/vendor/autoload.php';

?>

<h1>Form</h1>
