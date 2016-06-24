<?php namespace Controllers;
require_once('../Models/Producto.php');
use Models\Producto;
session_start();

if(isset($_SESSION['carrito'])){
    $arregloAnterior = $_SESSION['carrito'];
    $encontro = false;
    $numero = 0;
    for($i=0;$i<count($arregloAnterior);$i++){
        if($arregloAnterior[$i]['Id']==$_GET['idProducto']){
            $encontro=true;
            $numero=$i;
        }
    }
    if($encontro==true){
        $arregloAnterior[$numero]['Cantidad']=$arregloAnterior[$numero]['Cantidad']+1;
        $_SESSION['carrito']=$arregloAnterior;
        header('Location: ../Views/resumenCarrito.php');
    }else{
        $producto = new Producto();
        $p = $producto->readOne($_GET['idProducto']);
        while($row = mysqli_fetch_array($p)){
            $nombre=$row['nombre_producto'];
            $descripcion = $row['descripcion'];
            $imagen = $row['image'];
            $precio = $row['precio'];
        }
        $datosNuevos = array('Id' => $_GET['idProducto'],
            'Nombre'      => $nombre,
            'Descripcion' => $descripcion,
            'Imagen'      => $imagen,
            'Precio'      => $precio,
            'Cantidad'    => 1
        );
        array_push($arregloAnterior,$datosNuevos);//agrega otros datos al arreglo
        $_SESSION['carrito']=$arregloAnterior;
        header('Location: ../Views/resumenCarrito.php');
    }
}else{
    if(isset($_GET['idProducto'])){
        $producto = new Producto();
        $p = $producto->readOne($_GET['idProducto']);
        while($row = mysqli_fetch_array($p)){
            $nombre=$row['nombre_producto'];
            $descripcion = $row['descripcion'];
            $imagen = $row['image'];
            $precio = $row['precio'];
        }
        $arreglo[] = array('Id'          => $_GET['idProducto'],
                           'Nombre'      => $nombre,
                           'Descripcion' => $descripcion,
                           'Imagen'      => $imagen,
                           'Precio'      => $precio,
                           'Cantidad'    => 1
                          );
        $_SESSION['carrito']=$arreglo;
        header('Location: ../Views/resumenCarrito.php');
    }
}