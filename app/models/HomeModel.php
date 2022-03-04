<?php
    class HomeModel {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        
        public function __call($fun, $arg) {
            if($fun == 'readTrips') {
                $argCount = count($arg);
                switch($argCount) {
                    case 2:
                        $this->db->query('SELECT trains.*, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE start_from LIKE :from AND end_in LIKE :to AND available = true');
                        $this->db->bind(':from', $arg[0]);
                        $this->db->bind(':to', $arg[1]);     
                        break;
                    
                    case 3: 
                        $this->db->query('SELECT trains.*, train_trips.* FROM train_trips INNER JOIN trains ON train_trips.train_id = trains.id WHERE start_from LIKE :from AND end_in LIKE :to AND trip_date = :date AND available = true');
                        $this->db->bind(':from', $arg[0]);
                        $this->db->bind(':to', $arg[1]);
                        $this->db->bind(':date', $arg[2]);
                        break;
                }

                try {
                    $trips = $this->db->resultSet();
                    $rowCount = $this->db->rowCount();
                    if($rowCount <= 0) {
                        return false;
                    } 
                    return $trips;
                    
                } catch(Exception) {
                    return false;
                }
                
            }
        }


        

    }