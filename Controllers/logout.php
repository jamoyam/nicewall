<?php namespace Controllers;
session_start();
unset($_SESSION['EN_SESION']);
unset($_SESSION['TIPO_SESION']);
unset($_SESSION['carrito']);
header('Location: ../Views/home.php');