<?php namespace Controllers;
require_once('../Models/Direccion.php');
use Models\Direccion;
$obj = new Direccion();
$obj->delete($_GET['id']);
header('Location: ../Views/adminDirecciones.php');