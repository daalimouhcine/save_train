<?php
    class Trip {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        public function addTrip($data) {
            // Prepare the query
            $this->db->query("INSERT INTO train_trips(train_id, start_from, end_in, distance, trip_date, depart_hour, end_hour, price) VALUES(:train_id, :start_from, :end_in, :distance, :trip_date, :depart_hour, :end_hour, :price)");
            // Bind values
            $this->db->bind(":train_id", $data['train_id']);
            $this->db->bind(":start_from", $data['start_from']);
            $this->db->bind(":end_in", $data['end_in']);
            $this->db->bind(":distance", $data['distance']);
            $this->db->bind(":trip_date", $data['trip_date']);
            $this->db->bind(":depart_hour", $data['depart_hour']);
            $this->db->bind(":end_hour", $data['end_hour']);
            $this->db->bind(":price", $data['price']);
            // Execute the query
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }



    }