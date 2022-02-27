<?php
    class Trips extends Controller {

        public function __construct() {
            // $this->tripModel = $this->model('Trip');
        }


        public function index() {


        }


        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {


            } else {
                // Init data
                $data = [
                    'train' => '',
                    'start_from' => '',
                    'end_in' => '',
                    'distance' => '',
                    'trip_date' => '',
                    'trip_time' => '',
                    'depart_hour' => '',
                    'end_hour' => '',
                    'class' => '',
                    'price' => '',
                    'train_err' => '',
                    'start_from_err' => '',
                    'end_in_err' => '',
                    'distance_err' => '',
                    'trip_date_err' => '',
                    'trip_time_err' => '',
                    'depart_hour_err' => '',
                    'end_hour_err' => '',
                    'class_err' => '',
                    'price_err' => ''
                ];
                // Load view
                $this->view('trips/add', $data);
            }

        }
    }