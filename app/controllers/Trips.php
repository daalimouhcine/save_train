<?php
    class Trips extends Controller {

        public function __construct() {
            $this->tripModel = $this->model('Trip');
            $this->trainModel = $this->model('Train');
        }


        public function index() {
            $trips = $this->tripModel->readTrips();

            if($trips) {
                $this->view('trips/index', $trips);
            } else {
                flash('no_trips', 'Their is no trips pleas add some one', 'alert alert-danger');
                $this->view('trips/index');
            }

        }


        public function add() {
            // Get the trains
            $trains = $this->trainModel->readTrains();
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $row = $this->trainModel->getOneTrain($_POST['train']);
                // Init data
                $data = [
                    'trains_available' => $trains,
                    'train_name' => $row->name,
                    'train_id' => $_POST['train'],
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
                if(empty($data['train_name']) || empty($data['train_id'])) {
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
                //  elseif($data['trip_date'] < date('Y-M-D')) {
                //     $data['trip_date_err'] = "You can't enter this Date chose another one";
                // }

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
                    if($this->tripModel->addTrip($data)) {
                        flash('trip_add_success', 'Trip added successfully');
                        redirect('trips/');
                    }
                    
                } else {
                    $this->view('trips/add', $data);
                }



            } else {
                // Init data
                $data = [
                    'trains_available' => $trains,
                    'train_name' => '',
                    'train_id' => '',
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


        public function edit($trip_id) {
            // Get the trains
            $trains = $this->trainModel->readTrains();
            // Check for POST request
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $row = $this->trainModel->getOneTrain($_POST['train']);
                // Init data
                $data = [
                    'trains_available' => $trains,
                    'train_name' => $row->name,
                    'train_id' => $_POST['train'],
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
                if(empty($data['train_name']) || empty($data['train_id'])) {
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
                    if($this->tripModel->edit($data, $trip_id)) {
                        flash('modify_trip', 'Trip modified successfully');
                        redirect('trips/');
                    }
                    
                } else {
                    $this->view('trips/modify', $data);
                }


            } else {
                $trip = $this->tripModel->getOnTrip($trip_id);
                $data = [
                    'trains_available' => $trains,
                    'train_name' => '',
                    'train_id' => $trip->train_id,
                    'start_from' => $trip->start_from,
                    'end_in' => $trip->end_in,
                    'distance' => $trip->distance,
                    'trip_date' => $trip->trip_date,
                    'depart_hour' => $trip->depart_hour,
                    'end_hour' => $trip->end_hour,
                    'price' => $trip->price,
                    'train_err' => '',
                    'start_from_err' => '',
                    'end_in_err' => '',
                    'distance_err' => '',
                    'trip_date_err' => '',
                    'depart_hour_err' => '',
                    'end_hour_err' => '',
                    'price_err' => ''
                ];

                $this->view('trips/modify', $data);

            }
        }


        public function archived() {
            $archivedTrips = $this->tripModel->readArchiveTrips();

            if($archivedTrips) {
                $this->view('trips/archive', $archivedTrips);
            } else {
                flash('no_archived_trips', 'Their is no archived trips', 'alert alert-danger');
                $this->view('trips/archive');
            }
        }


        public function archiveTrip($trip_id) {
            if($this->tripModel->archiveTrip($trip_id)) {
                flash('archive_trip', 'the trip is archived');
                redirect('trips/');
            }
        }
        
        
        public function unarchiveTrip($trip_id) {
            if($this->tripModel->unarchiveTrip($trip_id)) {
                flash('unarchive_trip', 'the trip is unarchived');
                redirect('trips/archived');
            }
        }

    }