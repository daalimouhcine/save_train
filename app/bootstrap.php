<?php
    //Load Config
    require_once 'config/config.php';

    // Load libraries
    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });