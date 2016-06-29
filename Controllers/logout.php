<?php namespace Controllers;
session_start();
unset($_SESSION['EN_SESION']);
unset($_SESSION['TIPO_SESION']);
unset($_SESSION['carrito']);
unset($_SESSION['ID_USUARIO']);
header('Location: ../Views/home.php');