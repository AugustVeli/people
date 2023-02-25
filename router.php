<?php 
$path = $_SERVER['REQUEST_URI'];

if ($path = '/') {
        $go_to = ;
}
else {
    throw new Page403Exception();
 }