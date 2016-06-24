<?php namespace Models;
require_once('Connection.php');
class Perfil//super admin, modificador, visualizador, cliente
{
    private $idPerfil;
    private $tipoPerfil;
    private $descripcion;
    private $conex;

    public function __construct(){
        $this->conex = new Connection();
    }
    
    
}