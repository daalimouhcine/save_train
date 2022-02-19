<?php

    class Users extends Controller{

        public function __construct() {

        }

        public function register() {
            $data = [
                'title' => 'register'
            ];
            $this->view('user/register', $data);
        }

        public function login() {
            $data = [
                'title' => 'login'
            ];
            $this->view('user/login', $data);
        }

    }