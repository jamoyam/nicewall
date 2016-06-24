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
    header('Location: home.php');
}else {
    require_once('headerClient.php');
}
?>
<div class="container">
    pagina de registro de clientes
    <div align="center">
        <form action="../Controllers/createClient.php" method="post" role="form" style="width: 50%">
            <div class="form-group">
                <input name="txtRut" type="text" class="form-control" required="required" PLACEHOLDER="RUT">
            </div>
            <div class="form-group">
                <input name="txtNombre" type="text" class="form-control" required="required" PLACEHOLDER="NOMBRE">
            </div>
            <div class="form-group">
                <input name="txtApellido" type="text" class="form-control"required="required" PLACEHOLDER="APELLIDO">
            </div>
            <div class="form-group">
                <input name="txtEmail" type="email" class="form-control" required="required" PLACEHOLDER="EMAIL">
            </div>
            <div class="form-group">
                <input name="txtCelular" type="text" class="form-control" required="required" PLACEHOLDER="CELULAR">
            </div>
            <div class="form-group">
                <select name="selectComuna" class="form-control" required="required">
                    <option>--Seleccione una comuna--</option>
                    <?php
                    require_once('../Models/Direccion.php');
                    use Models\Direccion;
                    $d = new Direccion();
                    $filas = $d->read();
                    while($row = mysqli_fetch_array($filas)){
                        echo '<option value="'.$row['idDireccion'].'">'.$row['descripcion'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input name="txtUser" type="text" class="form-control" required="required" placeholder="NOMBRE DE USUARIO">
            </div>
            <div class="form-group">
                <input id="password" name="txtPass" type="password" class="form-control" required="required" PLACEHOLDER="CONTRASEÑA">
            </div>
            <div class="form-group">
                <input id="confirm_password" type="password" class="form-control" required="required"PLACEHOLDER="CONFIRMAR CONTRASEÑA">
            </div>
            <button type="submit" class="btn btn-default">Registrarse</button>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="../Resources/js/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Las contraseñas no coinciden");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
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
</html>
