<?php
    class Train{
        private $db;

        public function __construct() {
            $this->db = new Database;

        }

        // public function readTrains() {
        //     $this->db->trainMethod->query('SELECT * FROM trains');
        //     $trains = $this->db->trainMethod->execute();
        //     $row = $this->db->rowCount();

        //     if($row) {
        //         return $trains;
        //     } else {
        //         return false;
        //     }
        // }


        public function addTrain($data) {
            $this->db->query("INSERT INTO trains(name, seat_number) VALUES(:name, :seat_number)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':seat_number', $data['seat_number']);
            
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }