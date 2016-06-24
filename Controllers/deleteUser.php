<?php namespace Controllers;
require_once('../Models/Usuario.php');
use Models\Usuario;
$user = new Usuario();
$user->delete($_GET['id']);
header('Location: ../Views/adminUsuarios.php');