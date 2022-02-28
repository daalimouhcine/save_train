<?php
    class Trips extends Controller {

        public function __construct() {
            // $this->tripModel = $this->model('Trip');
            $this->trainModel = $this->model('Train');
        }


        public function index() {


        }


        public function add() {
            // Get the trains
            $trains = $this->trainModel->readTrains();
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'trains_available' => $trains,
                    'train' => $_POST['train'],
                    'start_from' => $_POST['start_from'],
                    'end_in' => $_POST['end_in'],
                    'distance' => $_POST['distance'],
                    'trip_date' => $_POST['trip_date'],
                    'depart_hour' => $_POST['depart_hour'],
                    'end_hour' => $_POST['end_hour'],
                    'price' => $_POST['price'],
                    'train_err' => '',
                    'start_from_err' => '',
                    'end_in_err' => '',
                    'distance_err' => '',
                    'trip_date_err' => '',
                    'depart_hour_err' => '',
                    'end_hour_err' => '',
                    'price_err' => ''
                ];

                // Validate train
                if(empty($data['train'])) {
                    $data['train_err'] = 'Pleas select a train';
                }

                // Validate start_from
                if(empty($data['start_from'])) {
                    $data['start_from_err'] = 'Pleas enter where the start is gonna be';
                }

                // Validate end_in
                if(empty($data['end_in'])) {
                    $data['end_in_err'] = 'Pleas enter where the end is gonna be';
                }

                // Validate distance
                if(empty($data['distance'])) {
                    $data['distance_err'] = 'Pleas enter the distance';

                } elseif($data['distance'] <= 0) {
                    $data['distance_err'] = "( $data[distance] ) is not a valid distance";
                }

                // Validate trip_date
                if(empty($data['trip_date'])) {
                    $data['trip_date_err'] = 'Pleas enter the Date of the trip';
                }

                // Validate depart_hour
                if(empty($data['depart_hour'])) {
                    $data['depart_hour_err'] = 'Pleas enter the Hour of the depart';
                }

                // Validate end_hour
                if(empty($data['end_hour'])) {
                    $data['end_hour_err'] = 'Pleas enter the Hour of the end';
                }
                                
                // Validate end_hour
                if(empty($data['price'])) {
                    $data['price_err'] = 'Pleas enter the price';

                } elseif($data['price'] <= 0) {
                    $data['price_err'] = "( $data[price] ) is not a valid price";
                }


                // Mack sure all errors arr empty
                if(empty($data['train_err']) && empty($data['start_from_err']) && empty($data['end_in_err']) && empty($data['distance_err']) && empty($data['trip_date_err']) && empty($data['depart_hour_err']) && empty($data['end_hour_err']) && empty($data['price_err'])) {
                    
                    
                } else {
                    $this->view('trips/add', $data);
                }



            } else {
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
                    'price' => '',
                    'train_err' => '',
                    'start_from_err' => '',
                    'end_in_err' => '',
                    'distance_err' => '',
                    'trip_date_err' => '',
                    'depart_hour_err' => '',
                    'end_hour_err' => '',
                    'price_err' => ''
                ];
                // Load view
                $this->view('trips/add', $data);
            }

        }
    }