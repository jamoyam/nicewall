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
        $this->idDireccion = mysqli_fetch_row($this->con->returnQuery("SELECT MAX(idDireccion)FROM direccion;"))[0]+1;
        $sql = "INSERT INTO direccion VALUES('{$this->idDireccion}','{$this->descripcion}');";
        $this->con->simpleQuery($sql);
    }

    public function delete($id){
        $this->con->simpleQuery("DELETE FROM direccion WHERE idDireccion='{$id}'");
    }


    public function read(){
        return $this->con->returnQuery("SELECT * FROM direccion;");
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

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


}