<?php namespace Controllers;
require_once('../Models/Producto.php');
use Models\Producto;
$producto = new Producto();
$id=$_GET['id'];
$producto->delete($id);
header('Location: ../Views/adminProductos.php');