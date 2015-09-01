<?php

spl_autoload_register(function ($class) {
    $class = ucfirst($class);
    
    if (file_exists("Controller/$class.php")) {
        include "Controller/$class.php";
    }
});