<?php
    class Trip {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        
        public function readTrips() {
            $this->db->query("SELECT trains.name, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE available = true");
            $trips = $this->db->resultSet();
            $row = $this->db->rowCount();

            if($row > 0) {
                return $trips;
            } else {
                return false;
            }
        }


        public function readArchiveTrips() {
            $this->db->query("SELECT trains.name, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE available = false");
            $trips = $this->db->resultSet();
            $row = $this->db->rowCount();

            if($row > 0) {
                return $trips;
            } else {
                return false;
            }
        }


        public function getOnTrip($trip_id) {
            $this->db->query("SELECT * FROM train_trips WHERE id = :trip_id");
            // $this->db->query("SELECT trains.name, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE id = :trip_id");

            $this->db->bind(':trip_id', $trip_id);
            $trip = $this->db->single();

            if($trip) {
                return $trip;
            } else {
                return false;
            }
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


        public function edit($data, $trip_id) {
            $this->db->query('UPDATE train_trips SET train_id = :train_id, start_from = :start_from, end_in = :end_in, distance = :distance, trip_date = :trip_date, depart_hour = :depart_hour, end_hour = :end_hour, price = :price WHERE id = :id');
            // Bind values
            $this->db->bind(":train_id", $data['train_id']);
            $this->db->bind(":start_from", $data['start_from']);
            $this->db->bind(":end_in", $data['end_in']);
            $this->db->bind(":distance", $data['distance']);
            $this->db->bind(":trip_date", $data['trip_date']);
            $this->db->bind(":depart_hour", $data['depart_hour']);
            $this->db->bind(":end_hour", $data['end_hour']);
            $this->db->bind(":price", $data['price']);
            $this->db->bind(":id", $trip_id);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function archiveTrip($trip_id) {
            $this->db->query('UPDATE train_trips SET available = :available WHERE id = :id');
            $this->db->bind(":available", false);
            $this->db->bind(":id", $trip_id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }


        public function unarchiveTrip($trip_id) {
            $this->db->query('UPDATE train_trips SET available = :available WHERE id = :id');
            $this->db->bind(":available", true);
            $this->db->bind(":id", $trip_id);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }



    }