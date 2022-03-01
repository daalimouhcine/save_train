<?php

    class User{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        // Login User
        public function login($email, $password, $table) {
            $this->db->query('SELECT * FROM ' . $table . ' WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
              return $row;
            } else {
              return false;
            }
        }


        // Register user
        public function register($data) {
            $this->db->query("INSERT INTO clients(fullName, email, password) VALUES(:full_name, :email, :password)");
            // Bind values
            $this->db->bind(':full_name', $data['full_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        
        // Find user by email
        public function findUserByEmail($email, $table) {
            $this->db->query('SELECT * FROM ' . $table . ' WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }  