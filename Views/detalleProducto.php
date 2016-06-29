<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../Resources/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['EN_SESION'])){
    if($_SESSION['TIPO_SESION']=="CLIENTE"){
        require_once('headerClient.php');
    }else{
        require_once('headerAdmin.php');
    }
}else{
    require_once('headerClient.php');
}
?>

    <?php
    require_once('layoutFiltro.php');
    ?>

<div class="container-fluid">
    <div class="row">
        <div class=""><!--style="background-color: red"-->
            <div class="album text-muted">
                <div class="container-fluid" >
                    <?php
                    require_once('../Models/Producto.php');
                    use Models\Producto;
                    $pds = new Producto();
                    $p = $pds->readOne($_GET['idProducto']);
                    $array = mysqli_fetch_array($p);
                    echo '<div class="panel panel-default" style="margin-top: 2%;">';
                    echo '<div class="panel-heading" style="background-color: #23527c;color: white;"><label>'.$array['nombre_producto'].'</label>';
                    if(isset($_SESSION['EN_SESION'])){
                        if(isset($_SESSION['TIPO_SESION'])){
                            if($_SESSION['TIPO_SESION']=='CLIENTE'){
                                echo '<hr><a style="color:white;" href="../Controllers/agregarCarrito.php?idProducto='.$array['idProducto'].'">+Agregar al carro</a>';
                            }
                        }
                    }
                    echo '</div>';
                    echo '<center><img style="width:35%; height:8cm;margin-top:8%;" class="img-responsive thumbnail" src="'.$array['image'].'"/></center>';
                    echo '</h3>';
                    echo '<p>Descripcion: '.$array['descripcion'].'</p>';
                    echo '<p>Precio: $'.$array['precio'].'</p>';
                    echo '<p>Stock: '.$array['stock'].' Unidades</p>';
                    echo '</div>';
                    echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../Resources/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../Resources/js/bootstrap.min.js">
    $(function() {
        // Setup drop down menu
        $('.dropdown-toggle').dropdown();

        // Fix input element click problem
        $('.dropdown input, .dropdown label').click(function(e) {
            e.stopPropagation();
        });
    });
</script>
</html>
