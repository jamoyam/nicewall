<?php namespace Controllers;
require_once('../Models/Categoria.php');
use Models\Categoria;
$obj = new Categoria();
$categoria = $_POST['txtNombre'];
$obj->setDescripcion($categoria);
$obj->create();
header('Location: ../Views/adminCategorias.php');