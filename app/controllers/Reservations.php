<?php

    class Reservations extends Controller {
        
        public function __construct() {
            $this->reservationModel = $this->model('Reservation');
            $this->userModel = $this->model('User');
            $this->tripModel = $this->model('Trip');
        }

        public function index() {
            $reservations = $this->reservationModel->readReservations();
            if($reservations) {
                $this->view('reservations/index', $reservations);

            } else {
                $this->view('reservations/index', $reservations);
                flash('no_reservations', 'Their is no reservations', 'alert alert-danger');
            }
        }


        public function ticket($reservation_id) {
            $reservation = $this->reservationModel->readOneReservation($reservation_id);
            if($reservation) {
                // Init data
                $data = [
                    'train_id' => $reservation->train_id,
                    'trip_id' => $reservation->id,
                    'train_name' => $reservation->name,
                    'start_from' => $reservation->start_from,
                    'end_in' => $reservation->end_in,
                    'distance' => $reservation->distance,
                    'trip_date' => $reservation->trip_date,
                    'depart_time' => $reservation->depart_hour,
                    'end_time' => $reservation->end_hour,
                    'price' => $reservation->price,
                    'reservation_date' => $reservation->reserve_time,
                    'client_full_name' => $reservation->fullName,
                    'client_email' => $reservation->email
                ];
                pdfReservation($data, 'reservations');
                // redirect('reservations');
            }
        }

        public function add($trip_id, $client_id = null) {
            // Get trip and client information's
            $trip = $this->tripModel->getOneTrip($trip_id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'train_id' => $trip->train_id,
                    'trip_id' => $trip->id,
                    'train_name' => $trip->name,
                    'start_from' => $trip->start_from,
                    'end_in' => $trip->end_in,
                    'distance' => $trip->distance,
                    'trip_date' => $trip->trip_date,
                    'depart_time' => $trip->depart_hour,
                    'end_time' => $trip->end_hour,
                    'price' => $trip->price,
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
                            flash('add_reservation_success', 'Reservation added successfully');
                            pdfReservation($data, 'reservations/index');
                        }
                    } else {
                        if($this->reservationModel->addReservation($data)) {
                            pdfReservation($data, 'home');
                        }
                    }

                } else {
                    $this->view('reservations/add', $data);
                }


            } else {
                // Init data
                if(isset($_SESSION['client_id'])) {
                    $data = [
                        'train_id' => $trip->train_id,
                        'trip_id' => $trip->id,
                        'train_name' => $trip->name,
                        'start_from' => $trip->start_from,
                        'end_in' => $trip->end_in,
                        'distance' => $trip->distance,
                        'trip_date' => $trip->trip_date,
                        'depart_time' => $trip->depart_hour,
                        'end_time' => $trip->end_hour,
                        'price' => $trip->price,
                        'client_full_name' => $_SESSION['client_full_name'],
                        'client_email' => $_SESSION['client_email'],
                        'client_full_name_err' => '',
                        'client_email_err' => '' 
                    ];

                } else {
                    $data = [
                        'train_id' => $trip->train_id,
                        'trip_id' => $trip->id,
                        'train_name' => $trip->name,
                        'start_from' => $trip->start_from,
                        'end_in' => $trip->end_in,
                        'distance' => $trip->distance,
                        'trip_date' => $trip->trip_date,
                        'depart_time' => $trip->depart_hour,
                        'end_time' => $trip->end_hour,
                        'price' => $trip->price,
                        'client_full_name' => '',
                        'client_email' => '',
                        'client_full_name_err' => '',
                        'client_email_err' => '' 
                    ];
                }

                $this->view('reservations/add', $data);
            }   
        }


        public function cancel($trip_id) {
            if($this->reservationModel->cancelReservation($trip_id)) {
                flash('reservation_cancel_success', 'Reservation canceled successfully');
                redirect('reservations');
            }
        }





    }

?>