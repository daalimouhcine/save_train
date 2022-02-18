<?php
    class Home extends Controller{
        
        public function __construct() {
           
        }
        
        public function index() {
            $data = [
                'title' => 'WELCOME',
            ];

            $this->view('home/index', $data);
        }

        public function about(){
            $data = [
                'content' => 'FIRST ABOUT IN THE WOOORLD'
            ];
            $this->view('home/about', $data);

        }

    }