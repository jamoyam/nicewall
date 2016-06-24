<?php namespace Controllers;
require_once('../Models/Producto.php');
use Models\Producto;
$p = new Producto();

$imagen = $_FILES['fileImagen']['name'];
$codigo = $_POST['txtCodigo'];
$nombre = $_POST['txtNombre'];
$precio = $_POST['txtPrecio'];
$descripcion = $_POST['txtDescripcion'];
$idColor = $_POST['selectColor'];
$stock = $_POST['txtStock'];
$idTipo = $_POST['txtIdTipoProducto'];

$p->setIdProducto($codigo);
$p->setNombreProducto($nombre);
$p->setDescripcion($descripcion);
$p->setImage($imagen);
$p->setPrecio($precio);
$p->setStock($stock);
$p->setIdColor($idColor);
$p->setIdCategoria($idTipo);
if($p->existe($p->getIdProducto())){
    session_start();
    $_SESSION['MSG']='CODIGO INGRESADO YA EXISTE';
    header('Location: ../Views/adminProductos.php');
}else {
    $p->create($_FILES['fileImagen']['name']);
    move_uploaded_file($_FILES['fileImagen']['tmp_name'], '../Resources/images/' . basename($_FILES['fileImagen']['name']));
    header('Location: ../Views/adminProductos.php');
}
