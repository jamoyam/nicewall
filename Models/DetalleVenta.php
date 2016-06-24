<?php namespace Models;
require_once('Connection.php');
class DetalleVenta
{
    private $idDetalle;
    private $nombreProducto;
    private $precio;
    private $cantidad;
    private $idVenta;

    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function create(){
        $sql = "INSERT INTO detalle_venta VALUE ('null','{$this->nombreProducto}',{$this->precio},'{$this->cantidad}','{$this->idVenta}');";
        $this->con->simpleQuery($sql);
    }

    /**
     * @return mixed
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * @param mixed $idDetalle
     */
    public function setIdDetalle($idDetalle)
    {
        $this->idDetalle = $idDetalle;
    }

    /**
     * @return mixed
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * @param mixed $nombreProducto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
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
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * @param mixed $idVenta
     */
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }


}