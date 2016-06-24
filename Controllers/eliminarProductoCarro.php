<?php
session_start();
$arreglo = $_SESSION['carrito'];
for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['Id']!=$_POST['Id']){//este post es lo que se envia por jquery
        $datosNuevos[]=array(//se crea un nuevo arreglo con las filas, si hay una fila con el id igual al enviado por post, no la va a tomar y no se añadira al arreglo
            'Id' => $arreglo[$i]['Id'],
            'Nombre' => $arreglo[$i]['Nombre'],
            'Precio' => $arreglo[$i]['Precio'],
            'Descripcion' => $arreglo[$i]['Descripcion'],
            'Imagen' => $arreglo[$i]['Imagen'],
            'Cantidad' => $arreglo[$i]['Cantidad'],
        );
    }
}
if(isset($datosNuevos)){
    $_SESSION['carrito']=$datosNuevos;
}else{
    unset($_SESSION['carrito']);
    echo '0';//con esto se sabe si el arreglo esta vacio en el script
}