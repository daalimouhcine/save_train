<?php
    class Client{
        private $db;

        public function __construct() {
            $this->db = new Database;

        }

        public function readClients() {
            $this->db->query('SELECT * FROM clients');
            $clients = $this->db->resultSet();
            $row = $this->db->rowCount();

            if($row > 0) {
                return $clients;
            } else {
                return false;
            }
        }


        public function deleteClient($clientId) {
            $this->db->query('DELETE FROM clients WHERE id = :id');
            $this->db->bind(':id', $clientId);
            // if($this->db->execute()) {
            //     return true;
            // } else {
            //     return false;
            // }
            try{
                $this->db->execute();
                return true;

            } catch(Exception) {
                return false;
            }
        }


    
    }

?>