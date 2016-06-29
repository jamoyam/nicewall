<?php namespace Controllers;
require_once('../Models/Cliente.php');
require_once('../Models/Usuario.php');
use Models\Cliente;
use Models\Usuario;
$rut = $_POST['txtRut'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$email = $_POST['txtEmail'];
$celular = $_POST['txtCelular'];
$idDireccion = $_POST['selectComuna'];
$user = $_POST['txtUser'];
$pass = $_POST['txtPass'];

$c = new Cliente();
$u = new Usuario();
$c->setRut($rut);
$c->setNombre($nombre);
$c->setApellido($apellido);
$c->setEmail($email);
$c->setCelular($celular);
$c->setIdDireccion($idDireccion);
$u->setNombreUsuario($nombre);
$u->setUser($user);
$u->setPass($pass);
$u->setIdPerfil(2);
$u->create();
$c->setIdUsuario($u->maxId());
echo $c->getRut();echo'<br>';
echo $c->getNombre();echo'<br>';
echo $c->getApellido();echo'<br>';
echo $c->getEmail();echo'<br>';
echo $c->getCelular();echo'<br>';
echo $c->getIdUsuario();echo'<br>';


$c->create();
$u->loginCliente();
