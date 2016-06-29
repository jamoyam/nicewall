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

    <div class="panel panel-default" align="center">
        <div class="panel-heading" style="background-color: black;color: white">Direcciones</div>
        <div style="margin-top: 1%">
            <form action="../Controllers/createDireccion.php" method="post" role="form" style="width: 50%">

                <div class="form-group">
                    <input name="txtNombre" type="text" class="form-control" required="required" PLACEHOLDER="NOMBRE DIRECCION">
                </div>

                <button type="submit" class="btn btn-default">Agregar</button>
            </form>
        </div>
        <div align="center" style="margin-top: 2%">
            <table class="table" style="width:65%;border:2px solid black">
                <tr style="background-color: black;color:white;">
                    <td>Codigo Direccion</td>
                    <td>Descripcion</td>
                    <td>Accion</td>
                </tr>
                <?php
                require_once('../Models/Direccion.php');
                use Models\Direccion;
                $obj = new Direccion();
                $filas = $obj->read();
                while ($row = mysqli_fetch_array($filas)) {
                    echo '<tr>';
                    echo '<td>';
                    echo '<label>'.$row['idDireccion'].'</label>';
                    echo '</td>';
                    echo '<td>';
                    echo '<label>'.$row['descripcion'].'</label>';
                    echo '</td>';
                    echo '<td>';
                    echo '<a href="../Controllers/deleteDireccion.php?id='.$row['idDireccion'].'" class="btn btn-default" style="background-color:black;color:white">Eliminar Direccion</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table></div>
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