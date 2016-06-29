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
        $this->idProducto = mysqli_fetch_row($this->conex->returnQuery("SELECT MAX(idProducto)FROM producto;"))[0]+1;
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

    public function searchById($id){
        return $this->conex->returnQuery("SELECT * FROM producto WHERE idProducto='{$id}'");
    }

    public function searchByColor($idColor){
        return $this->conex->returnQuery("SELECT * FROM producto p JOIN color co on p.id_color=co.idColor WHERE co.idColor='{$idColor}'");
    }

    public function searchByCategoria($idCategoria){
        return $this->conex->returnQuery("SELECT * FROM producto p JOIN categoria ca on p.Categoria_idCategoria=ca.idCategoria WHERE ca.idCategoria='{$idCategoria}'");
    }

    public function searchByPrecio($desde,$hasta){
        if($desde=="" && $hasta!=""){
            return $this->conex->returnQuery("SELECT * FROM producto WHERE precio<='{$hasta}'");
        }
        if($hasta=="" && $desde!=""){
            return $this->conex->returnQuery("SELECT * FROM producto WHERE precio>='{$desde}'");
        }
        if($hasta!="" && $desde!=""){
            return $this->conex->returnQuery("SELECT * FROM producto WHERE precio>='{$desde}' AND precio<='{$hasta}'");
        }
        if($hasta=="" && $desde ==""){
            return $this->conex->returnQuery("SELECT * FROM producto");
        }
    }

    public function modificar($name){
        $dir_subida = '../Resources/images/';
        $this->image = $dir_subida . basename($name);
        $sql = "UPDATE producto SET nombre_producto='{$this->nombreProducto}',descripcion='{$this->descripcion}',image='{$this->image}',precio='{$this->precio}',stock='{$this->stock}',id_color='{$this->idColor}',Categoria_idCategoria='{$this->id_categoria}' WHERE idProducto='{$this->idProducto}';";
        $this->conex->simpleQuery($sql);
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