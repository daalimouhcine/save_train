<?php
    class Trips extends Controller{

        public function __construct() {
            $this->tripModel = $this->model('Trip');
        }


        public function index() {


        }


        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {


            } else {
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
                ]
            }

        }
    }