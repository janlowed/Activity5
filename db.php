<?php

class Database{

    public $conn;

    public function init(){
        $this->conn = new mysqli('localhost', 'root', '', 'api_db');
    }
}

?>