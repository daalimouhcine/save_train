<?php
    class Trains extends Controller {

        public function __construct() {
            // Mack sure that the admin is logged in
            if(isset($_SESSION['admin_id'])) {
                $this->trainModel = $this->model('Train');

            } else {
                redirect('home');
            }
        }


        public function index() {
            $trains = $this->trainModel->readTrains();
            if($trains) {
                $this->view('trains/index', $trains);

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
                        flash('train_add_success', 'Train added successfully');
                        redirect('trains/');
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
                if(empty($data['name'])) {
                    $data['name_err'] = 'Pleas enter a name';
                }

                // Validate seat_number
                if(empty($data['seat_number'])) {
                    $data['seat_number_err'] = 'Pleas enter seats number';

                } elseif($data['seat_number'] <= 0) {
                    $data['seat_number_err'] = "( $data[seat_number] ) is not a valid number";
                }
                

                // Make sure that errors are empty
                if(empty($data['name_err']) && empty($data['seat_number_err'])) {
                    if($this->trainModel->modifyTrain($trainId, $data['name'], $data['seat_number'])) {
                        flash('modify_train', 'the train is modified successfully');
                        redirect('trains/');                    

                    } else {
                        flash('err', 'their is an error pleas try again');
                        redirect('trains/'); 
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
                redirect("trains/");
            } else {
                flash('delete_prob', "You can't delete this train their is a trip related with it", 'alert alert-danger');
                redirect("trains/");
            }
        }

    }

?>