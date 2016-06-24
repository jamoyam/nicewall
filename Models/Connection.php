<?php namespace Models;

class Connection {
    private $datos = Array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "",
        "db"   => "nicewall"
    );
    private $con;

    public function __construct() {
        $this->con = new \mysqli($this->datos['host'], $this->datos['user'], $this->datos['pass'], $this->datos['db']);
    }

    public function returnQuery($sql){
        return $this->con->query($sql);
    }

    public function simpleQuery($sql){
        $this->con->query($sql);
    }
}
