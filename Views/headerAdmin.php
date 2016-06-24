<div class="navbar navbar-default" style="background-color: #23527c;"><!--navbar-fixed-top-->
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                <ul class="dropdown-menu" style="padding: 15px;">
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="adminProductos.php">Productos</a>
                    </li>
                    <li>
                        <a href="adminVentas.php">Ventas</a>
                    </li>
                    <li>
                        <a href="adminClientes.php">Clientes</a>
                    </li>
                    <li>
                        <a href="adminUsuarios.php">Usuarios</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li style="margin-top: 5%;">
                <?php
                if(isset($_SESSION['MENSAJE_LOGIN'])){
                    ?>
                    <strong style="color: red"><?php echo $_SESSION['MENSAJE_LOGIN'];?></strong>
                    <?php
                }
                unset($_SESSION['MENSAJE_LOGIN']);
                ?>
            </li>
            <?php
            if(isset($_SESSION['EN_SESION'])){
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['EN_SESION'];?><span class="caret"></span></a>
                    <ul class="dropdown-menu" style="padding: 15px;">
                        <a href="../Controllers/logout.php">Cerrar Sesion</a>
                    </ul>
                </li>
                <?php
            }else{
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Iniciar Sesion<span class="caret"></span></a>
                    <ul class="dropdown-menu" style="padding: 15px;">
                        <form action="../Controllers/login.php" method="post" accept-charset="UTF-8">
                            <input placeholder="Usuario" id="user_username" style="margin-bottom: 15px;" type="text" name="txtUser" size="30" />
                            <input placeholder="Contraseña" id="user_password" style="margin-bottom: 15px;" type="password" name="txtPass" size="30" />
                            <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Entrar" />
                        </form>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<?php
if(!isset($_SESSION['EN_SESION']) || !isset($_SESSION['TIPO_SESION']) ||  $_SESSION['TIPO_SESION']=="CLIENTE"){
    header('Location: home.php');
}
?>