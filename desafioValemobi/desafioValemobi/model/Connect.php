<?php

class Connect{
    
    private $mysqli;
    private $host = "mysql.hostinger.com.br";
    private $user = "u414936550_gusta";
    private $password = "81371665";
    private $bd = "u414936550_valem";
    
    public function __construct(){
        $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->bd);
        if ($this->mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    }
    
    public function getConexao(){
        return $this->mysqli;
    }
    
}