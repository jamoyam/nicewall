<?php namespace Models;
require_once('Connection.php');
class Cliente
{
    private $rut;
    private $nombre;
    private $apellido;
    private $email;
    private $celular;
    private $idDireccion;
    private $con;

    public function __construct()
    {
        $this->con = new Connection();
    }

    public function create(){
        $sql = "INSERT INTO cliente VALUES('null','{$this->rut}','{$this->nombre}','{$this->apellido}','{$this->email}','{$this->celular}','{$this->idDireccion}');";
        $this->con->simpleQuery($sql);
    }

    public function read(){
        return $this->con->returnQuery("SELECT * FROM cliente");
    }

    public function searchByUser(){
        
    }

    public function delete($id){
        $this->con->simpleQuery("DELETE FROM cliente WHERE idCliente = '{$id}';");
    }

    /**
     * @return mixed
     */
    public function getRut()
    {
        return $this->rut;
    }

    /**
     * @param mixed $rut
     */
    public function setRut($rut)
    {
        $this->rut = $rut;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getIdDireccion()
    {
        return $this->idDireccion;
    }

    /**
     * @param mixed $idDireccion
     */
    public function setIdDireccion($idDireccion)
    {
        $this->idDireccion = $idDireccion;
    }
    
    
}