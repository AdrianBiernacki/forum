<?php

    require_once 'config/config.php';
    //Load libraries
    require_once 'helpers/redirect.php';
    require_once 'libraries/Core.php';
    require_once 'libraries/Database.php';
    require_once 'libraries/Controller.php';

    //Autoloaded core libraries

    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });