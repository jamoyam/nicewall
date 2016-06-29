<?php namespace Models;
require_once('Connection.php');
class Categoria
{
    private $idCat;
    private $descripcion;
    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function create(){
        $this->idCat = mysqli_fetch_row($this->con->returnQuery("SELECT MAX(idCategoria)FROM categoria;"))[0]+1;
        $sql = "INSERT INTO categoria VALUES('{$this->idCat}','{$this->descripcion}');";
        $this->con->simpleQuery($sql);
    }
    public function delete($id){
        $this->con->simpleQuery("DELETE FROM categoria WHERE idCategoria='{$id}'");
    }

    public function read(){
        return $this->con->returnQuery("SELECT * FROM categoria");
    }

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * @param mixed $idCat
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
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