<?php 

    class Database{
        private $database;
        private $host;
        private $user;
        private $password;
        private $type;

        public function __construct(){
            $this->username = 'root';
            $this->password = '';
            $this->database = 'fiscalia';
            $this->host = 'localhost';
            $this->type = 'mysql';
        }

        public function connect(){
            try{
                $string = $this->type.':host='.$this->host.';dbname='.$this->database;
                $conex = new PDO($string, $this->username, $this->password);
                return $conex;
            }catch(PDOException $e){
                exit('Error: '.$e->getMessage());
            }
        }
    }
