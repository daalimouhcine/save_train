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
                        $this->db->query('SELECT * FROM reservations_seats WHERE start_from LIKE :from AND end_in LIKE :to AND available = true');
                        $this->db->bind(':from', '%'.$arg[0].'%');
                        $this->db->bind(':to', '%'.$arg[1].'%');     
                        break;
                    
                    case 3: 
                        $this->db->query('SELECT * FROM reservations_seats WHERE start_from LIKE :from AND end_in LIKE :to AND trip_date = :date AND available = true');
                        $this->db->bind(':from', '%'.$arg[0].'%');
                        $this->db->bind(':to', '%'.$arg[1].'%');
                        $this->db->bind(':date', $arg[2]);
                        break;
                }
                

                try {
                    $trips = $this->db->resultSet();
                    $rowCount = $this->db->rowCount();


                        // // Get number of reservations
                        // $seats = [];
                        // foreach($trips as $trip) {
                        //     $this->db->query('SELECT count(*) FROM reservations WHERE id_trip = :reservation');
                        //     $this->db->bind(':reservation', $trip->id_trip);
                        //     $seats = $this->db->execute();
                        // }
                        // die(print_r($seats));


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

?>