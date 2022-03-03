<?php
    class Reservations extends Controller {
        
        public function __construct() {
            $this->reservationModel = $this->model('Reservation');
            $this->userModel = $this->model('User');
            $this->tripModel = $this->model('Trip');

        }

        public function index() {


        }

        public function add($trip_id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {


            } else {
                // Get trip and client information's
                $trip = $this->tripModel->getOnTrip($trip_id);

                // Init data
                $data = [
                    'trip' => $trip,
                    'client_full_name' => $_SESSION['client_full_name'],
                    'client_email' => $_SESSION['client_email'],
                    'client_full_name_err' => '',
                    'client_email_err' => '' 
                ];

                $this->view('reservations/add', $data);
            }
            
            
        }
    }