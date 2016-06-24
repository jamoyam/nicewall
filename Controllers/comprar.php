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
$venta = new Venta();
$venta->setTotalVenta(0);
$venta->setIdCliente();

for($i=0;$i<count($arreglo);$i++){
    $detalle->setNombreProducto($arreglo[$i]['Nombre']);
    $detalle->setPrecio($arreglo[$i]['Precio']);
    $detalle->setCantidad($arreglo[$i]['Cantidad']);
    $detalle->create();
}
unset($_SESSION['carrito']);
header('Location: ../Views/home.php');