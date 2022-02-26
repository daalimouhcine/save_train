<?php
    class Train{
        private $db;

        public function __construct() {
            $this->db = new Database;

        }

        public function readTrains() {
            $this->db->query('SELECT * FROM trains');
            $trains = $this->db->resultSet();
            $row = $this->db->rowCount();

            if($row > 0) {
                return $trains;
            } else {
                return false;
            }
        }


        public function getOneTrain($trainId) {
            $this->db->query('SELECT * FROM trains WHERE id = :id');
            $this->db->bind(':id', $trainId);
            $row = $this->db->single();

            if($this->db->rowCount() > 0) {
                return $row;
            } else {
                return false;
            }
        }


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


        public function deleteTrain($trainId) {
            $this->db->query('DELETE FROM trains WHERE id = :id');
            $this->db->bind(':id', $trainId);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function modifyTrain($trainId, $inputName, $inputSeatNumber) {
            $this->db->query('UPDATE trains SET name = :name, seatNumber = :seatNumber WHERE id = :id');
            $this->db->bind(':name', $inputName);
            $this->db->bind(':seatNumber', $inputSeatNumber);
            $this->db->bind(':id', $trainId);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }