<?php namespace Controllers;
require_once('../Models/Color.php');
use Models\Color;
$obj = new Color();
$color = $_POST['txtNombre'];
$obj->setDescripcion($color);
$obj->create();
header('Location: ../Views/adminColores.php');