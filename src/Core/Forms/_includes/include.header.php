<?php

if(basename($_SERVER['PHP_SELF'], '.php') === basename(__FILE__, '.php')) {
    header('HTTP/1.0 404 Not found!');
    die();
}

?>
require_once '../../../vendor/autoload.php';
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TITLE</title>
</head>
<body>

