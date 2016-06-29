<?php namespace Controllers;
require_once('../Models/Direccion.php');
use Models\Direccion;
$obj = new Direccion();
$direccion = $_POST['txtNombre'];
$obj->setDescripcion($direccion);
$obj->create();
header('Location: ../Views/adminDirecciones.php');