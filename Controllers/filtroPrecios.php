<?php namespace Controllers;
require_once('../Models/Producto.php');
use Models\Producto;
$obj = new Producto();
$filas = $obj->read();


