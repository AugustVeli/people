<?php

class direct 
{
    function open_page(string $template){
        global $base_path;
        require $base_path . $template . '.php' ;
    }
}
