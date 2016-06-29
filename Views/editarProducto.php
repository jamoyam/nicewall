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
        <div class="panel-heading" style="background-color: black;color: white">Editar Producto - <a href="adminProductos.php" class="btn btn-default" style="background-color:black;color:white">Volver</a></div>
        <div id="tabs-1" align="center">
            <form enctype="multipart/form-data" action="../Controllers/modificarProducto.php" method="post" role="form" style="width: 50%">
                <div class="form-group">
                    <?php
                    require_once('../Models/Color.php');
                    use Models\Color;
                    require_once('../Models/Categoria.php');
                    use Models\Categoria;
                    require_once('../Models/Producto.php');
                    use Models\Producto;
                    $p = new Producto();
                    $fila = $p->searchById($_GET['id']);
                    $producto = mysqli_fetch_array($fila);
                    if(isset($_SESSION['MSG'])) {
                        echo '<label class="form-control" style="color:red;">' . $_SESSION['MSG'] . '</label>';
                        unset($_SESSION['MSG']);
                    }
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<input name="txtCodigo" type="hidden" value="'.$producto['idProducto'].'" class="form-control" required="required" PLACEHOLDER="CODIGO">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Nombre</label>';
                    echo '<input name="txtNombre" type="text" value="'.$producto['nombre_producto'].'" class="form-control" required="required" PLACEHOLDER="NOMBRE">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Precio</label>';
                    echo '<input name="txtPrecio" type="number" value="'.$producto['precio'].'" class="form-control" required="required" placeholder="PRECIO">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Descripcion</label>';
                    echo '<input name="txtDescripcion" type="text" value="'.$producto['descripcion'].'" class="form-control"required="required" PLACEHOLDER="DESCRIPCION">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Color anterior: '.$producto['id_color'].'</label>';
                    echo '<select name="selectColor" class="form-control">';


                    $color = new Color();
                    $c = $color->read();
                    while($row = mysqli_fetch_array($c)){
                        echo '<option value="'.$row['idColor'].'">'.$row['descripcionColor'].'</option>';
                    }

                    echo '</select>';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Stock</label>';
                    echo '<input name="txtStock" type="number" value="'.$producto['stock'].'" class="form-control" required="required" PLACEHOLDER="STOCK">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Imagen</label>';
                    echo '<input type="file" class="btn btn-primary" name="fileImagen" required="required" PLACEHOLDER="IMAGEN">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label>Categoria anterior: '.$producto['Categoria_idCategoria'].'</label>';
                    echo '<select name="txtIdTipoProducto" class="form-control">';

                    $categoria = new Categoria();
                    $c = $categoria->read();
                    while($row = mysqli_fetch_array($c)){
                        echo '<option value="'.$row['idCategoria'].'">'.$row['descripcion'].'</option>';
                    }
                    echo '</select>';
                    ?>
                </div>
                <button type="submit" class="btn btn-default">Editar</button>
            </form>
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