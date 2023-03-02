<?php

class person
{

    static public $inf_person;
        public function insert_person() {
           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $fields = [];
               $data = $_POST;
               //put data of a person to the function ------------------
                    $inf_person = new data_base;
                    $inf_person -> insert($data);
                    header('location: http://localhost:8080/my_project/ '
                    ,true, 302);
           } 
           else{
                $open = new direct;
                $open->open_page('home');
           }
        }


}




