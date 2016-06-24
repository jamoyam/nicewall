<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Resources/css/jquery-ui.css"><!--estilo de tabla-->
    <script src="../Resources/js/jquery-1.12.4.min.js"></script>
    <script src="../Resources/js/jquery-ui.js"></script>
    <script !src="">

        $(document).ready(function(){
            $(function() {
                $( "#tabs" ).tabs();
            });
        });
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
</head>
<body>
<?php
session_start();
require_once('headerAdmin.php');
?>
<div class="container">

    <div id="tabs" >
        <ul style="background-color: #23527c;color: white;">
            <li><a href="#tabs-1">Ingresar</a></li>
            <li><a href="#tabs-2">Listado</a></li>
        </ul>
        <div id="tabs-1" align="center">
            <form enctype="multipart/form-data" action="../Controllers/createProducts.php" method="post" role="form" style="width: 50%">
                <div class="form-group">
                    <?php
                        if(isset($_SESSION['MSG'])) {
                            echo '<label class="form-control" style="color:red;">' . $_SESSION['MSG'] . '</label>';
                            unset($_SESSION['MSG']);
                        }
                    ?>
                </div>
                <div class="form-group">
                    <input name="txtCodigo" type="number" class="form-control" required="required" PLACEHOLDER="CODIGO">
                </div>
                <div class="form-group">
                    <input name="txtNombre" type="text" class="form-control" required="required" PLACEHOLDER="NOMBRE">
                </div>
                <div class="form-group">
                    <input name="txtPrecio" type="number" class="form-control" required="required" placeholder="PRECIO">
                </div>
                <div class="form-group">
                    <input name="txtDescripcion" type="text" class="form-control"required="required" PLACEHOLDER="DESCRIPCION">
                </div>
                <div class="form-group">
                    <select name="selectColor" class="form-control">
                        <option>--SELECCIONE UN COLOR--</option>
                        <?php
                        require_once('../Models/Color.php');
                        use Models\Color;
                        $color = new Color();
                        $c = $color->read();
                        while($row = mysqli_fetch_array($c)){
                            echo '<option value="'.$row['idColor'].'">'.$row['descripcionColor'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input name="txtStock" type="number" class="form-control" required="required" PLACEHOLDER="STOCK">
                </div>
                <div class="form-group">
                    <input type="file" class="btn btn-primary" name="fileImagen" required="required" PLACEHOLDER="IMAGEN">
                </div>
                <div class="form-group">
                    <select name="txtIdTipoProducto" class="form-control">
                        <option>--SELECCIONE CATEGORIA--</option>
                        <?php
                        require_once('../Models/Categoria.php');
                        use Models\Categoria;
                        $categoria = new Categoria();
                        $c = $categoria->read();
                        while($row = mysqli_fetch_array($c)){
                            echo '<option value="'.$row['idCategoria'].'">'.$row['descripcion'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Agregar</button>
            </form>
        </div>
        <div id="tabs-2">
            <table style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <td>Nombre</td>
                    <td>Imagen</td>
                    <td>Valor</td>
                    <td>Stock</td>
                    <td colspan="2" align="center">Accion</td>
                </tr>
                <?php
                require_once('../Models/Producto.php');
                use Models\Producto;
                $obj = new Producto();
                $filas = $obj->read();
                while ($row = mysqli_fetch_array($filas)) {
                    echo '<tr>';
                    echo '<td><label>'.$row['nombre_producto'].'</label></td>';
                    echo '<td><img class="img-responsive thumbnail" style="width: 100px;height: 100px;" src="'.$row['image'].'"/></td>';
                    echo '<td><label>'.$row['nombre_producto'].'</label></td>';
                    echo '<td><label>'.$row['nombre_producto'].'</label></td>';
                    echo '<td><a href="#" class="btn btn-primary">Editar</a></td>';
                    echo '<td><a href="../Controllers/deleteProduct.php?id='.$row['idProducto'].'" class="btn btn-primary">Eliminar</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>

    </div>

</div>
</body>

</html>