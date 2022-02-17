<?php
    class Pages extends Controller{
        public function __construct() {
            
        }
        
        public function index() {
            $data = [
                'title' => 'WELCOME'
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'content' => 'FIRST ABOUT IN THE WOOORLD'
            ];
            $this->view('pages/about', $data);

        }

    }