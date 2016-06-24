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
<div class="container-fluid">
<!--    <div class="row">
        <div class="col-sm-4 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
            </ul>
        </div>-->
        <div class="">
            <div class="album text-muted">
                <div class="container" >
                    <div class="row" >
                        <?php
                        require_once('../Models/Producto.php');
                        use Models\Producto;
                        $p = new Producto();
                        $filas = $p->read();
                        while ($row = mysqli_fetch_array($filas)){
                            echo '<div class="col-md-3 portfolio-item" style="background-color: #23527c; margin-left: 2%;margin-top:2%;border-radius: 8px;">';
                            echo '<a href="#">';
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
                    </div>
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
