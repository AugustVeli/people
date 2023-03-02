<?php

$base_path = __DIR__ . '\\';

function my_autoloader(string $class_name){
    global $base_path;
    require_once $base_path . 'classes\\' . $class_name. '.class' . '.php'; 
}

spl_autoload_register('my_autoloader');

require $base_path . 'router.php';