<?php
    class Train extends Controller {

        public function __construct() {
            $this->trainModel = $this->model('Train');
        }

        public function index() {
            

        }

        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {


            } else {
                // Init data
                $data = [
                    'name' => '',
                    'seat_number' => ''
                ];

                // Load View
                $this->view('trains/add', $data);
            }
        }


    }