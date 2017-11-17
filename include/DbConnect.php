<?php

class DbConnect {

    private $conn;

    function __construct() {
        require_once 'Config.php';
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    function connect() {
        return $this->conn;
    }

    function __destruct() {
        $this->conn->close();
    }

}

?>