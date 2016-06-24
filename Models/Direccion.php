<?php namespace Models;
require_once('Connection.php');
class Direccion
{
    private $idDireccion;
    private $descripcion;
    private $con;

    public function __construct()
    {
        $this->con = new Connection();
    }

    public function create(){
        $this->con->simpleQuery("INSERT INTO direccion VALUES('{$this->idDireccion}','{$this->descripcion}');");
    }

    public function read(){
        return $this->con->returnQuery("SELECT * FROM direccion;");
    }
}