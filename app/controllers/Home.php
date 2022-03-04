<?php
    class Home extends Controller{
        
        public function __construct() {
            $this->homeModel = $this->model('HomeModel');
           
        }
        
        public function index() {
            // Check if POST request
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'trips' => '',
                    'from' => $_POST['from'],
                    'to' => $_POST['to'],
                    'date' => $_POST['date'],
                    'from_err' => '',
                    'to_err' => '',
                    'date_err' => ''
                ];

                // Validate from
                if(empty($data['from'])) {
                    $data['from_err'] = 'Pleas enter where you want the start';
                }

                // Validate to
                if(empty($data['to'])) {
                    $data['to_err'] = 'Pleas enter where you want to go';
                }

                // Validate date
                if(!empty($data['date'])) {
                    $input_date = explode('-', $data['date']);
                    if($input_date[0] < date('Y')) {
                        $data['date_err'] = "You can't enter this Date chose another one";
                    } elseif($input_date[1] < date('m')) {
                        $data['date_err'] = "You can't enter this Date chose another one";
                    } elseif($input_date[2] < date('d')) {
                        $data['date_err'] = "You can't enter this Date chose another one";
                    }
                }


                // Mack sure all errors arr empty
                if(empty($data['from_err']) && empty($data['to_err']) && empty($data['date_err'])) {
                    if(!empty($data['date'])) {
                        $trips = $this->homeModel->readTrips($data['from'], $data['to'], $data['date']);
                    } else {
                        $trips = $this->homeModel->readTrips($data['from'], $data['to']);
                    }

                    if($trips) {
                        $data['trips'] = $trips;
                        $this->view('home/index', $data);
                        flash('read_trips_success', "Her are the trips available");

                    } else {
                        flash('no_trips', "Sorry but their is no trips with this information's", 'alert alert-danger');
                        $this->view('home/index', $data);
                    }
                    
                } else {
                    $this->view('home/index', $data);
                }


            } else {
                // Init data
                $data = [
                    'trips' => '',
                    'from' => '',
                    'to' => '',
                    'date' => '',
                    'from_err' => '',
                    'to_err' => '',
                    'date_err' => ''
                ];

                $this->view('home/index', $data);
            }

        }


    }