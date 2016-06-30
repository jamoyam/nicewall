<!doctype html>
<?php
    require 'title.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo;?></title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
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
<div class="container">
    <div class="panel panel-default" style="margin-top: 2%;">
        <div class="panel-heading" style="background-color: #23527c;color: white;">Carrito de Compras</div>
        <?php
        $total = 0;
            if(isset($_SESSION['carrito'])){
                $datos = $_SESSION['carrito'];
                for($i=0;$i<count($datos);$i++){
                    ?>
                        <div class="container-fluid" style="margin-top:-6%">
                            <div class="producto">
                            <img class="thumbnail" style="width:15%; height:120px;margin-top:8%;" src="<?=$datos[$i]['Imagen']?>">
                            <span>Nombre: <?=$datos[$i]['Nombre']?></span>
                            <br>
                            <span>Descripcion: <?=$datos[$i]['Descripcion']?></span>
                            <br>
                            <span>Precio Unitario: $<?=$datos[$i]['Precio']?></span>
                            <br>
                            <span>Cantidad:
							<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
                                   data-precio="<?php echo $datos[$i]['Precio'];?>"
                                   data-id="<?php echo $datos[$i]['Id'];?>"
                                   class="cantidad">
                            <br>
                                <span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
                                <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id'];?>">Eliminar</a>
                            </div>
                        </div><hr style="background-color: black">

                    <?php
                    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
                }
            }else
            {
                echo '<center><h1>El carrito esta vacio</h1></center>';
            }
        if(isset($_SESSION['carrito'])) {
            echo '<center><h2 id="total">Total: $' . $total . '</h2></center>';
            echo '<center><input id="dirEnvio" type="text" placeholder="DIRECCION ENVIO"/></center>';
            echo '<center><a class="btn btn-success" onclick="confirmacion()">Comprar</a></center>';
        }
        ?>
        <center><a href="home.php">Ver Catalogo</a></center>
    </div>
</div>
</body>
<script src="../Resources/js/jquery-1.12.4.min.js"></script>
<script !src="">
    function confirmacion(){
        if($("#dirEnvio").val()==""){
            window.alert("Debe ingresar la direccion de envio");
        }else {
            var respuesta = confirm("Su compra esta completa?");
            if (respuesta == true) {
                var dir = "../Controllers/comprar.php?direccion="+$("#dirEnvio").val();
                window.location = dir;
            } else {
                return 0;
            }
        }
    }
</script>
<script !src="">
    var inicio=function () {
        $("body").animate({ scrollTop: $(document).height()}, 1000);
        $(".cantidad").keyup(function(e){
            if($(this).val()!=''){
                if(e.keyCode==13){
                    var id=$(this).attr('data-id');
                    var precio=$(this).attr('data-precio');
                    var cantidad=$(this).val();
                    $(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: $'+(precio*cantidad));
                    $.post('../Controllers/modificarDatos.php',{
                        Id:id,
                        Precio:precio,
                        Cantidad:cantidad
                    },function(e){
                        $("#total").text('Total: $'+e);
                    });
                }
            }
        });
        $(".eliminar").click(function(e){
            e.preventDefault();//previene la opcion  por defecto (cargar pagina)
            var id = $(this).attr('data-id');//este dentro de clase eliminar del html
            //hasta aqui esta funcionando
            $(this).parentsUntil('.producto').remove();//remueve solo el div
            //ahora el del objeto de sesion
            $.post('../Controllers/eliminarProductoCarro.php',{//esto es lo q envia al controlador
                Id:id //le enviamos el id
            },function(a){//esto es lo que recibe del controlador
                if(a==0){//quiere decir q el carro esta vacio
                    location.href="resumenCarrito.php";
                }
            });
        });
    }
    $(document).on('ready',inicio);
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