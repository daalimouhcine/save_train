<?php
    class Clients extends Controller {

        public function __construct() {
            // Mack sure that the admin is logged in
            if(isset($_SESSION['admin_id'])) {
                $this->clientModel = $this->model('Client');

            } else {
                redirect('');
            }
        }


        public function index() {
            $clients = $this->clientModel->readClients();
            if($clients) {
                $this->view('clients/index', $clients);

            } else {
                $this->view('clients/index');
                flash('no_trains', 'Their is no clients', 'alert alert-danger');
                
            }

        }


        public function delete($clientId) {
            if($this->clientModel->deleteClient($clientId)) {
                flash('client_delete_success', 'Train deleted successfully');
                redirect("clients/");
            } else {
                flash('delete_prob', "You can't delete this train their is a trip related with it", 'alert alert-danger');
                redirect("clients/");
            }
        }

    }

?>