<?php namespace Controllers;
require_once('../Models/Usuario.php');
use Models\Usuario;

session_start();

if($_POST['txtUser']==""){
    $_SESSION['MENSAJE_LOGIN']='Campo usuario Vacío';
    header('Location: ../Views/home.php');
}elseif ($_POST['txtPass']==""){
    $_SESSION['MENSAJE_LOGIN']='Campo Contraseña Vacío';
    header('Location: ../Views/home.php');
}else{
    $objUsuario = new Usuario();
    $objUsuario->setUser($_POST['txtUser']);
    $objUsuario->setPass($_POST['txtPass']);

    $objUsuario->loginCliente();
}

