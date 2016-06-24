<?php namespace Models;
require_once('Connection.php');

class Venta
{
    private $idVenta;
    private $fechaVenta;
    private $totalVenta;
    private $idCliente;

    private $con;

    public function _construct(){
        $this->con = new Connection();
    }

    public function create(){
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO venta VALUES('null','{$fecha}','{$this->totalVenta}','{$this->idCliente}');";
        $this->con->simpleQuery($sql);
    }

    public function updateTotal(){

    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
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

    /**
     * @return mixed
     */
    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }

    /**
     * @param mixed $fechaVenta
     */
    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;
    }

    /**
     * @return mixed
     */
    public function getTotalVenta()
    {
        return $this->totalVenta;
    }

    /**
     * @param mixed $totalVenta
     */
    public function setTotalVenta($totalVenta)
    {
        $this->totalVenta = $totalVenta;
    }


}