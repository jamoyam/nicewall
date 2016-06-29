<?php namespace Models;
require_once('Connection.php');

class Venta
{
    private $idVenta;
    private $fechaVenta;
    private $direccionEnvio;
    private $totalVenta;
    private $idCliente;

    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function create(){
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO venta(fechaVenta,direccion_envio,totalVenta,Cliente_idCliente) VALUES('{$fecha}','{$this->direccionEnvio}','{$this->totalVenta}','{$this->idCliente}');";

        $this->con->simpleQuery($sql);
    }

    public function maxId(){
        return mysqli_fetch_row($this->con->returnQuery("SELECT MAX(idventa)FROM venta;"))[0];
    }

    public function updateTotal($total,$id){
        $sql="UPDATE venta SET totalVenta='$total' WHERE idventa=$id";
        $this->con->simpleQuery($sql);
    }

    public function buscarVenta($id){
        return $this->con->returnQuery("SELECT * FROM venta v JOIN cliente cli on v.Cliente_idCliente=cli.idCliente WHERE idventa='{$id}';");
    }

    public function verVenta(){
        $sql="SELECT * FROM venta v JOIN cliente cli on cli.idCliente = v.Cliente_idCliente;";
        return $this->con->returnQuery($sql);
    }

    public function ventaCompleta(){
        return $this->con->returnQuery("SELECT * FROM venta v JOIN cliente cli on v.Cliente_idCliente=cli.idCliente JOIN detalle_venta det on det.id_venta = v.idventa");
    }

    public function delete($id){
        $this->con->simpleQuery("DELETE FROM venta WHERE idventa='{$id}'");
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
    public function getDireccionEnvio()
    {
        return $this->direccionEnvio;
    }

    /**
     * @param mixed $direccionEnvio
     */
    public function setDireccionEnvio($direccionEnvio)
    {
        $this->direccionEnvio = $direccionEnvio;
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