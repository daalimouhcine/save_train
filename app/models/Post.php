<?php
    class Post{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getPosts() {
            $this->db->query("SELECT * FROM admins");

            return $this->db->resultSet();
        }
        
    }