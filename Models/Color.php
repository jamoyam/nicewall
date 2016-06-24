<?php namespace Models;
require_once('Connection.php');
class Color
{
    private $id;
    private $descripcion;
    private $con;

    public function __construct()
    {
        $this->con=new Connection();
    }

    public function read(){
        return $this->con->returnQuery("SELECT * FROM color;");
    }
}