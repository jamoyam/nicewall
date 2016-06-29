<?php namespace Controllers;
require_once('../Models/DetalleVenta.php');
require_once('../Models/Venta.php');
require_once('../Models/Cliente.php');
use Models\Cliente;
use Models\DetalleVenta;
use Models\Venta;
session_start();
$arreglo = $_SESSION['carrito'];
$detalle = new DetalleVenta();
$cliente = new Cliente();
$fila = $cliente->searchByUser($_SESSION['ID_USUARIO']);
$cli = mysqli_fetch_array($fila);
$venta = new Venta();
$direccionEnvio = $_GET['direccion'];
$venta->setTotalVenta(0);
$venta->setDireccionEnvio($direccionEnvio);
$venta->setIdCliente($cli['idCliente']);
$venta->create();
$total=0;
for($i=0;$i<count($arreglo);$i++){
    $detalle->setNombreProducto($arreglo[$i]['Nombre']);
    $detalle->setPrecio($arreglo[$i]['Precio']);
    $detalle->setCantidad($arreglo[$i]['Cantidad']);
    $detalle->setSubtotal($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
    $detalle->setIdVenta($venta->maxId());
    $detalle->create();
    $total=($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])+$total;
}

$venta->updateTotal($total,$venta->maxId());
unset($_SESSION['carrito']);

header('Location: ../Views/home.php');