<?php

require_once __DIR__ . '/vendor/autoload.php';

use Pimple\Container;
use WBGenerateForm\Source\Core\Initialize;
use WBGenerateForm\Source\Providers\ServiceProvider;

$container = new Container();
$container->register((new ServiceProvider()));

$commander = new Initialize();

$ar = array (
    0 => 'generate',
    1 => '--create-template-crud2',
    2 => '--path=customers',
    3 => '--fields=name:text,age:number,birthDate:date',
);

$commander->run($ar);