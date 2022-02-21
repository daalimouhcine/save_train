<?php

    class Users extends Controller{

        public function __construct() {
            $this->userModel = $this->model('User');

        }

        public function register() {
            
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'full_name' => $_POST['full_name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'confirm_password' => $_POST['confirm_password'],
                    'full_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate name
                if(empty($data['full_name'])) {
                    $data['full_name_err'] = 'Pleas enter full_name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Pleas enter email';
                } else {
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'email is all ready taken';
                    }
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Pleas enter password';

                } else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password needs to be more than 6 characters';
                }

                // Validate confirmation password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Pleas confirm your password';

                } else {
                    if($data['confirm_password'] != $data['password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }


                // Make sure that errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->register($data)) {
                        redirect('users/login');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/register', $data);

                }



            } else {
                // Init data
                $data = [
                    'full_name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'full_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
            
        }

        public function login() {

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validate email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Pleas enter your email';
                }

                // Validate password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Pleas enter your password';
                }


                // Make sure that errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    echo 'SUCCESS';

                } else {
                    // Load view with errors
                    $this->view('users/login', $data);

                }


            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }

    }