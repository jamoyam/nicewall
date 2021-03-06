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
    <div class="panel panel-default" align="center" >
        <div class="panel-heading" style="background-color: black;color: white">Ventas</div>
        <table class="table">
            <tr style="background-color: black;color:white;">
                <td>Nro Venta</td>
                <td>Fecha Venta</td>
                <td>Direccion envio</td>
                <td>Monto Total</td>
                <td>Rut Cliente</td>
                <td>Nombre Cliente</td>
                <td>Correo Cliente</td>
                <td></td>
                <td></td>
            </tr>
            <?php
            require_once('../Models/Venta.php');
            use Models\Venta;
            $obj = new Venta();
            $filas = $obj->verVenta();
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
                echo '<td>';
                echo '<a href="detalleVenta.php?idVenta='.$row['idventa'].'" class="btn btn-default" style="background-color:black;color:white">Ver</a>';
                echo '</td>';
                echo '<td>';
                echo '<a onclick="confirmacion('.$row['idventa'].')" class="btn btn-default" style="background-color:black;color:white">Eliminar</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
</body>
<script src="../Resources/js/jquery-1.12.4.min.js"></script>
<script !src="">
    function confirmacion($id){
        var respuesta = confirm("Esta seguro de eliminar a esta venta?");
        if (respuesta == true) {
            window.location = "../Controllers/eliminarVenta.php?idVenta="+$id;
        } else {
            return 0;
        }
    }
</script>
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