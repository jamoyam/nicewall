<?php namespace Models;
require_once('Connection.php');
class Producto
{
    private $idProducto;
    private $nombreProducto;
    private $descripcion;
    private $image;
    private $precio;
    private $stock;
    private $idColor;
    private $id_categoria;
    private $conex;

    public function __construct(){
        $this->conex = new Connection();
    }

    public function create($name){
        $dir_subida = '../Resources/images/';
        $this->image = $dir_subida . basename($name);
        $sql = "INSERT INTO producto VALUES('{$this->idProducto}','{$this->nombreProducto}','{$this->descripcion}','{$this->image}','{$this->precio}','{$this->stock}','{$this->idColor}','{$this->id_categoria}');";
        $this->conex->simpleQuery($sql);
    }

    public function existe($id){
        $fila=$this->conex->returnQuery("SELECT * FROM producto WHERE idProducto = '{$id}';");
        if(mysqli_num_rows($fila)==1) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function delete($id){
        $this->conex->simpleQuery("DELETE FROM producto WHERE idProducto = '{$id}';");
    }

    public function read(){
        return $this->conex->returnQuery("SELECT * FROM producto");
    }

    public function readOne($id){
        return $this->conex->returnQuery("SELECT * FROM producto WHERE idProducto='{$id}';");
    }
    
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getIdColor()
    {
        return $this->idColor;
    }

    public function setIdColor($idColor)
    {
        $this->idColor = $idColor;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }


}