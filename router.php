<?php 
$path = $_SERVER['REQUEST_URI'];

if ($path = '/') {
        $go_to = new person();
        $go_to -> insert_person();
}
else {
    throw new Page403Exception();
 }