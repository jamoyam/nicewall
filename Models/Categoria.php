<?php namespace Models;
require_once('Connection.php');
class Categoria
{
    private $nombre_tipo;
    private $descripcion;
    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function create(){

    }

    public function read(){
        return $this->con->returnQuery("SELECT * FROM categoria");
    }
}