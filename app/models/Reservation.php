<?php
    class Reservation {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function __call($name, $arguments) {
            if($name == 'addReservation') {
                switch(count($arguments)) {
                    case 1:
                        // Add new guest to the table
                        $this->db->query('INSERT INTO guests(fullName, email) VALUES(:full_name, :email)');
                        $this->db->bind(':full_name', $arguments['client_full_name']);
                        $this->db->bind(':email', $arguments['client_email']);
                        $this->db->execute();
                        // Get the id of the guest
                        $this->db->query('SELECT id FROM guests WHERE fullName = :guest_full_name');
                        $this->db->bind(':guest_full_name', $arguments['client_full_name']);
                        $guest_id = $this->db->single();
                        // Add reservation with the id of the trip and the guest
                        $this->db->query('INSERT INTO reservations(id_trip, id_guest, reserve_time) VALUES(:trip_id, :guest_id, :reserve_time)');
                        $this->bind(':trip_id', $arguments['trip']->id);
                        $this->bind(':guest_id', $guest_id);
                        $this->db->bind(':reserve_time',date("Y-m-d h:i:s"));
                        break;

                    case 2:
                        // Add reservation with the id of the trip and the client
                        $this->db->query('INSERT INTO reservations(id_trip, id_client, reserve_time) VALUES(:trip_id, :client_id, :reserve_time)');
                        $this->db->bind(':trip_id', $arguments[0]['trip_id']);
                        $this->db->bind(':client_id',$arguments[1]);
                        $this->db->bind(':reserve_time',date("Y-m-d h:i:s"));
                        break;
                }

                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }

    
        public function readOneReservation($reservation_id) {
            $this->db->query('SELECT trains.*, train_trips.*,clients.fullName, clients.email, reservations.* 
                                FROM train_trips 
                                INNER JOIN trains
                                ON train_trips.train_id = trains.id
                                INNER JOIN reservations 
                                ON reservations.id_trip = train_trips.id 
                                INNER JOIN clients 
                                ON reservations.id_client = clients.id 
                                WHERE reservations.id = :reservation_id');

            $this->db->bind(':reservation_id', $reservation_id);
            
            $trip = $this->db->single();
            if($trip) {
                // die(print_r($trip));
                return $trip;
            } else {
                return false;
            }
        }



        public function readReservations() {
            $this->db->query('SELECT trains.*, train_trips.*,clients.fullName, clients.email, reservations.* 
                                FROM train_trips 
                                INNER JOIN trains
                                ON train_trips.train_id = trains.id
                                INNER JOIN reservations 
                                ON reservations.id_trip = train_trips.id 
                                INNER JOIN clients 
                                ON reservations.id_client = clients.id 
                                WHERE reservations.id_client = :id_client');
                                
            $this->db->bind(':id_client', $_SESSION['client_id']);
            $reservations = $this->db->resultSet();
            if($reservations) {
                return $reservations;
            } else {
                return false;
            }
        }



        public function cancelReservation($reservation_id) {
            $this->db->query('DELETE FROM reservations WHERE id = :reservation_id');
            $this->db->bind(':reservation_id', $reservation_id);
            
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        
    }


?>