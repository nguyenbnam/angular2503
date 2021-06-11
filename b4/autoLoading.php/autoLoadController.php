<?php
$my_autoload = function ($class){
    // echo $class; 
    $file = $class. '.php';
        include_once  CONTROLLER_FOLDER .'/'.$file ;
};
spl_autoload_register($my_autoload);