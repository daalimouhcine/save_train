<?php

    class Reservations extends Controller {
        
        public function __construct() {
            $this->reservationModel = $this->model('Reservation');
            $this->userModel = $this->model('User');
            $this->tripModel = $this->model('Trip');

        }

        public function index() {
            $reservations = $this->reservationModel->readReservations();
            $this->view('reservations/');
            if($reservations) {
                $this->view('reservations/index', $reservations);

            } else {
                $this->view('reservations/');
                flash('no_reservations', 'Their is no reservations', 'alert alert-danger');
                
            }


        }

        public function add($trip_id, $client_id = null) {
            // Get trip and client information's
            $trip = $this->tripModel->getOnTrip($trip_id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // Init data
                $data = [
                    'trip' => $trip,
                    'client_full_name' => $_POST['client_full_name'],
                    'client_email' => $_POST['client_email'],
                    'client_full_name_err' => '',
                    'client_email_err' => '' 
                ];

                // VAlidate full name
                if(empty($data['client_full_name'])) {
                    $data['client_full_name_err'] = 'Pleas enter your full name';
                }

                // VAlidate email
                if(empty($data['client_email'])) {
                    $data['client_email_err'] = 'Pleas enter your email';
                }


                // Make sure that errors are empty
                if(empty($data['client_full_name_err']) && empty($data['client_email_err'])) {
                    if($client_id != null) {
                        if($this->reservationModel->addReservation($data, $client_id)) {
                            pdfReservation($data);
                            flash('add_reservation_success', 'Reservation added successfully');
                            redirect('reservations/');
                        }
                    } else {
                        if($this->reservationModel->addReservation($data)) {
                            pdfReservation($data);
                            redirect('home/');
                        }
                    }

                } else {
                    $this->view('reservations/add', $data);
                }


            } else {
                // Init data
                if(isset($_SESSION['client_id'])) {
                    $data = [
                        'trip' => $trip,
                        'client_full_name' => $_SESSION['client_full_name'],
                        'client_email' => $_SESSION['client_email']
                    ];

                } else {
                    $data = [
                        'trip' => $trip,
                        'client_full_name' => '',
                        'client_email' => '',
                        'client_full_name_err' => '',
                        'client_email_err' => '' 
                    ];
                }

                $this->view('reservations/add', $data);
            }
            
            
        }
    }

?>