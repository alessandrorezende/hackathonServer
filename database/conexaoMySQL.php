<?php

class Connection {

    private $connection;

    function __construct() {
        $this->connection = mysql_connect("localhost", "root", "admin") or die(mysql_error());
        mysql_select_db("enquete",$this->connection) or die("Não foi possível conectar."); 
    }

    public function closeConnection() {
        $result = mysql_close($this->connection);
        return $result;
    }

    public function Insert($query) {
        $result = mysql_query($query,$this->connection);
        return $result;
    }

    public function Select($query) {
       $result = mysql_query($query,$this->connection);
        return $result;
    }

    public function Update($query) {
        $result = mysql_query($query,$this->connection);
        return $result;
    }

    public function Delete($query) {
        $result = mysql_query($query,$this->connection);
        return $result;
    }

}
?>