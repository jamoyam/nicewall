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

    public function create(){
        $this->id = mysqli_fetch_row($this->con->returnQuery("SELECT MAX(idColor)FROM color;"))[0]+1;
        $sql = "INSERT INTO color VALUES('{$this->id}','{$this->descripcion}');";
        $this->con->simpleQuery($sql);
    }
    public function delete($id){
        $this->con->simpleQuery("DELETE FROM color WHERE idColor='{$id}'");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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