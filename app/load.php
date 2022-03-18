<?php
    //Load Config
    require_once 'config/config.php';
    // Load helpers
    require_once 'helpers/url_helper.php';
    // Load session helper
    require_once 'helpers/session_helper.php';
    // Load pdf creator
    require_once 'helpers/pdf_creator.php';

    // Load libraries
    // Autoload Core Libraries
    spl_autoload_register(function($className) {
        require_once 'libraries/' . $className . '.php';
    });
    

?>