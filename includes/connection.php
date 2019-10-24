<?php
/**
 * Encapsulates a connection to the database 
 * 
 * @author Arturo Mora-Rioja, (edit: clbo)
 * @date   September 2019
 */
    class DB {

        /**
         * Opens a connection to the database
         * 
         * @returns a connection object
         */
        public function connect() {
            $server = 'localhost';
            $db = 'kea_students';
            $user = 'root';
            $pwd = '';

            $DSN = 'mysql:host=' . $server . ';dbname=' . $db . ';charset=utf8';
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $connections_to_db = @new PDO($DSN, $user, $pwd, $options); 
            } catch (\PDOException $oException) {
                echo 'Connection unsuccessful';
                die('Connection unsuccessful: ' . $cnDB->connect_error());
                exit();
            }
            
            return($connections_to_db);   
        }

        /**
         * Closes a connection to the database
         * 
         * @param the connection object to disconnect
         */
        public function disconnect($conobj) {
            $conobj = null;
        }
    }
?>
