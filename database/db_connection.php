<?php
    class DB{
        //declaring the properties || variablees of the class
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;

        //creating a constructor for the properties
        public function __construct($host, $username ,$password,$database){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        //connecting to the database
        public function connect(){
           $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database); 
           if(!$this->connection){
                die("connection failed" .$this->connection->error);
           }
        }

        //disconnecting the database connection
        public function disconnect(){
           if( $this->connection->close()){
                echo "connection has been closed";
           }
        }

        //query method
        public function query($sql){
            $query = $this->connection->query($sql);
            if(!$query){
                die("query failed" .$this->connection->error);
            }
            return $query;
        }

        //fetching the query in a form of array
        public function fetchArray($query){
            return $query->fetch_array(MYSQLI_ASSOC);
        }

        //storing values in escape string
        public function escapeString($value){
            return $this->connection->real_escape_string($value);
        }
       
    }

?>