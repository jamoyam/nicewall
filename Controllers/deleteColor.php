<?php namespace Controllers;
require_once('../Models/Color.php');
use Models\Color;
$obj = new Color();
$obj->delete($_GET['id']);
header('Location: ../Views/adminColores.php');