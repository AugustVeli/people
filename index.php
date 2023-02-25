<?php

$base_path = __DIR__ . '//';

function my_autoloader(string $class_name){
    global $base_path;
    require_once $base_path . $class_name . '.php'; ;
}

spl_autoload_register('my_autoloader');





