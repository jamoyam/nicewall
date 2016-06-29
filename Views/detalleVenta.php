<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
require_once('headerAdmin.php');
?>
<div class="container" style="margin-top: 4%;">
    <div class="panel panel-default" >
        <div class="panel-heading" style="background-color: black;color: white">Ventas - <a href="adminVentas.php" class="btn btn-default" style="background-color:black;color:white">Volver</a></div>
        <table class="table">
            <tr style="background-color: black;color:white;">
                <td>Nro Venta</td>
                <td>Fecha Venta</td>
                <td>Direccion Envio</td>
                <td>Monto Total</td>
                <td>Rut Cliente</td>
                <td>Nombre Cliente</td>
                <td>Correo Cliente</td>
            </tr>
            <?php
            require_once('../Models/Venta.php');
            use Models\Venta;
            $obj = new Venta();
            $filas = $obj->buscarVenta($_GET['idVenta']);
            while ($row = mysqli_fetch_array($filas)) {
                echo '<tr>';
                echo '<td>';
                echo '<label>'.$row['idventa'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>'.$row['fechaVenta'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>'.$row['direccion_envio'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>$'.$row['totalVenta'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>'.$row['rut'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>'.$row['nombre'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>'.$row['email'].'</label>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <hr style="background-color: black">
        <table class="table">
            <tr style="background-color: black;color:white;">
                <td>Producto</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Subtotal</td>
            </tr>
            <?php

            $obj = new Venta();
            $filas = $obj->ventaCompleta();
            while ($row = mysqli_fetch_array($filas)) {
                echo '<tr>';
                echo '<td>';
                echo '<label>'.$row['nombreProducto'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>$'.$row['precio'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>x'.$row['cantidad'].'</label>';
                echo '</td>';
                echo '<td>';
                echo '<label>$'.$row['subtotal'].'</label>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>


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