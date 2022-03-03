<?php
    class HomeModel {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        
        public function __call($fun, $arg) {
            if($fun == 'readTrips') {
                switch(count($arg)) {
                    case 2:
                        $this->db->query('SELECT trains.name, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE start_from LIKE :from AND end_in LIKE :to AND available = true');
                        $this->db->bind(':from', $arg[0]);
                        $this->db->bind(':to', $arg[1]);
                        break;
                    
                    case 3: 
                        $this->db->query('SELECT trains.name, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE start_from LIKE :from AND end_in LIKE :to AND trip_date = :date AND available = true');
                        $this->db->bind(':from', $arg[0]);
                        $this->db->bind(':to', $arg[1]);
                        $this->db->bind(':date', $arg[2]);
                        break;
                }

                $trips = $this->db->resultSet();
                if($trips) {
                    die(print_r($trips));
                }
            }
        }

    }