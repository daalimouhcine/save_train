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
                        $this->db->bind(':trip_id', $arguments[0]['trip']->id);
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

    
        public function readReservations() {
            // $this->db->query('SELECT train_trips.*, client.*, reservations.* FROM train_trips, clients INNER JOIN reservations ON reservations.id_trip = train_trips.id AND reservations.id_client = clients.id WHERE reservations.id_client = :id_client');
            // $this->db->bind(':id_client', $_SESSION['client_id']);
            // $reservations = $this->db->resultSet();
            // if($reservations) {
            //     die($reservations);
            //     // return $reservations;
            // } else {
            //     return false;
            // }

        }
        
        
    }