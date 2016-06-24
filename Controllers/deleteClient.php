<?php namespace Controllers;
require_once('../Models/Cliente.php');
use Models\Cliente;
$cliente = new Cliente();
$cliente->delete($_GET['id']);
header('Location: ../Views/adminClientes.php');