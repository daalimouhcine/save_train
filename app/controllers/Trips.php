<?php
    class Trips extends Controller {

        public function __construct() {
            // $this->tripModel = $this->model('Trip');
            $this->trainModel = $this->model('Train');
        }


        public function index() {


        }


        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {


            } else {
                // Get the trains
                $trains = $this->trainModel->readTrains();
                // Init data
                $data = [
                    'trains_available' => $trains,
                    'train' => '',
                    'start_from' => '',
                    'end_in' => '',
                    'distance' => '',
                    'trip_date' => '',
                    'depart_hour' => '',
                    'end_hour' => '',
                    'class' => '',
                    'price' => '',
                    'train_err' => '',
                    'start_from_err' => '',
                    'end_in_err' => '',
                    'distance_err' => '',
                    'trip_date_err' => '',
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