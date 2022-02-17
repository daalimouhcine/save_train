<?php

    class Core{
        private $currentController = 'Pages';
        private $currentMethod = 'index';
        private $params = [];

        function __construct() {
            // print_r($this->getUrl());

            $url = $this->getUrl();

            if(!empty($url[0])) {
                if(file_exists('../controllers' . ucwords($url[0]) . '.php')) {
                    $this->currentController = ucwords($url[0]);
                }
            }
            
        }

        public function getUrl() {
            if(isset($_GET['url'])) {
                $url = $_GET['url'];
                $url = rtrim($url, '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }