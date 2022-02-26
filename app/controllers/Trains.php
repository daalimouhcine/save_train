<?php
    class Trains extends Controller {

        public function __construct() {
            $this->trainModel = $this->model('Train');
        }


        public function index() {
            $trains = $this->trainModel->readTrains();
            if($trains) {
                $this->view('trains/index', $trains);
                // die(print_r($trains));

            } else {
                $this->view('trains/index');
                flash('no_trains', 'Their is no trains pleas add some one', 'alert alert-danger');
                
            }

        }


        public function add() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => $_POST['name'],
                    'seat_number' => $_POST['seat_number'],
                    'name_err' => '',
                    'seat_number_err' => ''
                ];

                // VAlidate name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Pleas enter name';
                }

                // Validate seat_number
                if(empty($data['seat_number'])) {
                    $data['seat_number_err'] = 'Pleas enter seats number';

                } elseif($data['seat_number'] <= 0) {
                    $data['seat_number_err'] = "( $data[seat_number] ) is not a valid number";
                }


                // Make sure that errors are empty
                if(empty($data['name_err']) && empty($data['seat_number_err'])) {
                    if($this->trainModel->addTrain($data)) {
                        flash('train_add_success', 'Train add successfully');
                        redirect('trains/index');
                    }

                } else {
                    $this->view('trains/add', $data);
                }

            } else {
                // Init data
                $data = [
                    'name' => '',
                    'seat_number' => '',
                    'name_err' => '',
                    'seat_number_err' => ''
                ];
                // Load View
                $this->view('trains/add', $data);
            }           
        }


        public function edit($trainId) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => $_POST['name'],
                    'seat_number' => $_POST['seat_number'],
                    'name_err' => '',
                    'seat_number_err' => ''
                ];

                // Validate name
                if(empty($_POST['name'])) {
                    $data['name_err'] = 'Pleas enter a name';
                }

                // Validate seat_number
                if(empty($_POST['seat_number'])) {
                    $data['seat_number'] = 'Pleas enter seats number';

                } elseif($data['seat_number'] <= 0) {
                    $data['seat_number_err'] = "( $data[seat_number] ) is not a valid number";
                }
                

                // Make sure that errors are empty
                if(empty($_POST['name_err']) && empty($_POST['seat_number_err'])) {
                    if($this->trainMethod->modifyTrain($trainId, $data['name'], $data['seat_number'])) {
                        flash('modify_train', 'the train is modified successfully');
                        redirect('trains/index');                    

                    } else {
                        flash('err', 'their is an error pleas try again');
                        redirect('trains/index'); 
                    }

                } else {
                    $this->view('trains/modify', $data);
                }


            } else {
                $row = $this->trainModel->getOneTrain($trainId);
                
                $data = [
                    'name' => $row->name,
                    'seat_number' => $row->seat_number,
                    'name_err' => '',
                    'seat_number_err' => ''
                ];
                
                $this->view("trains/modify", $data);
                
            }
        }


        public function delete($trainId) {
            if($this->trainModel->deleteTrain($trainId)) {
                flash('train_delete_success', 'Train deleted successfully');
                redirect("trains/index");
            } else {
                flash('delete_prob', 'Their is some problem pleas try again', 'alert alert-danger');
                redirect("trains/index");
            }
        }


    }