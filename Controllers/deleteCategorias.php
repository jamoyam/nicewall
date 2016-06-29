<?php namespace Controllers;
require_once('../Models/Categoria.php');
use Models\Categoria;
$obj = new Categoria();
$obj->delete($_GET['id']);
header('Location: ../Views/adminCategorias.php');