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
    <div class="panel panel-default">
        <div class="panel-heading">Clientes</div>
        <table>
            <tr>
                <td>NOMBRE</td>
                <td>ACCION</td>
            </tr>
        <?php
        require_once('../Models/Cliente.php');
        use Models\Cliente;
        $obj = new Cliente();
        $filas = $obj->read();
        while ($row = mysqli_fetch_array($filas)) {
            echo '<tr>';
                echo '<td>';
                    echo '<label>'.$row['nombre'].'</label>';
                echo '</td>';
                echo '<td>';
                    echo '<a id="delete" href="#" class="btn btn-primary" onclick="confirmacion('.$row['idCliente'].')">Eliminar</a>';
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
        var respuesta = confirm("Esta seguro de eliminar a este usuario?");
        if (respuesta == true) {
            window.location = "../Controllers/deleteClient.php?id=" + $id;
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