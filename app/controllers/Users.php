<?php

    class Users extends Controller{

        public function __construct() {
            if(isset($_SESSION['client_id']) || isset($_SESSION['admin_id'])) {
                redirect('');
            }
            $this->userModel = $this->model('User');

        }


        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'action' => 'register',
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
                    $data['full_name_err'] = 'Pleas enter full name';
                }

                // Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Pleas enter email';
                } else {
                    if($this->userModel->findUserByEmail($data['email'], 'clients') || $this->userModel->findUserByEmail($data['email'], 'admins')) {
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
                        flash('register_success', 'You are registered and can log in');
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
                    'action' => 'login',
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

                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'], 'clients') || $this->userModel->findUserByEmail($data['email'], 'admins')) {
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure that errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validation 
                    // Check and set logged in admin
                    $loggedInAdmin = $this->userModel->login($data['email'], $data['password'], 'admins');

                    if($loggedInAdmin) {
                        // Start session for admin
                        $this->createUserSession($loggedInAdmin, 'admin');

                    } else {
                        // Check and set logged in client
                        $loggedInClient = $this->userModel->login($data['email'], $data['password'], 'clients');

                        if($loggedInClient) {
                            // Start session for client
                            $this->createUserSession($loggedInClient, 'client');

                        } else {
                            $data['password_err'] = 'Password not correct';
                            $this->view('users/login', $data);
                        }
                    }

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


        public function createUserSession($user, $role) {
            // Check if the login person is an admin
            if($role == 'admin') {
                // Session for admin
                $_SESSION['admin_id'] = $user->id;
                $_SESSION['admin_email'] = $user->email;
                $_SESSION['admin_full_name'] = $user->fullName;

            } elseif($role == 'client') {
                // Session for client
                $_SESSION['client_id'] = $user->id;
                $_SESSION['client_email'] = $user->email;
                $_SESSION['client_full_name'] = $user->fullName;
            }

            redirect('pages/index');
        }


        public function logout() {
            if(isset($_SESSION['admin_id'])) {
                unset($_SESSION['client_id']);
                unset($_SESSION['client_email']);
                unset($_SESSION['client_full_name']);

            } elseif(isset($_SESSION['client_id'])) {
                unset($_SESSION['client_id']);
                unset($_SESSION['client_email']);
                unset($_SESSION['client_full_name']);

            }
            session_destroy();

            redirect('users/login');
        }

        
        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }

    }