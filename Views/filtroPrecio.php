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

<div class="container">
    <div class="">

        <div class="">
            <div class="album text-muted">
                <div class="container" >
                    <center><div class="row" >
                            <?php
                            require_once('../Models/Producto.php');
                            use Models\Producto;
                            $p = new Producto();
                            $desde = $_POST['txtDesde'];
                            $hasta = $_POST['txtHasta'];

                            $filas = $p->searchByPrecio($desde,$hasta);

                            while ($row = mysqli_fetch_array($filas)){
                                echo '<div class="col-md-3 portfolio-item" style="background-color: #23527c; margin-left: 3.5%;margin-top:2%;margin-right: 3.5%;margin-bottom:2%;border-radius: 8px;">';
                                echo '<a href="#">';
                                echo '<br>';
                                echo '<img style="width:100%; height:200px;margin-top:8%;" class="img-responsive thumbnail" src="'.$row['image'].'" alt="">';
                                echo '</a>';
                                echo '<h3>';
                                echo '<a style="color:white;" href="detalleProducto.php?idProducto='.$row['idProducto'].'">'.$row['nombre_producto'].'</a>';
                                echo '</h3>';
                                echo '<p>Precio: $'.$row['precio'].'</p>';
                                echo '<p>Stock: '.$row['stock'].' Unidades</p>';
                                echo '</div>';
                            }

                            ?>
                        </div></center>
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
