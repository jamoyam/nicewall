<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../Resources/css/style.css">
</head>
<body>
<center>
    <div id = "loginform">
        <form method = "post" action = "../Controllers/loginAdmin.php">
            <p>Mantenimiento</p>
            <input type = "text" id = "login" placeholder = "Usuario" name = "txtUser">
            <input type = "password" id = "password" name = "txtPass" placeholder = "Contraseña">
            <input type = "submit" id = "dologin" value = "Iniciar Sesion">
            </br>
            <label>
                <?php
                session_start();
                if(isset($_SESSION['TIPO_SESION'])){
                    if($_SESSION['TIPO_SESION']=="CLIENTE"){
                        header('Location: home.php');
                    }elseif ($_SESSION['TIPO_SESION']=="ADMIN"){
                        header('Location: maintenance.php');
                    }
                }
                if(isset($_SESSION['MENSAJE_LOGIN'])){
                    ?>
                    <strong style="color: red"><?php echo $_SESSION['MENSAJE_LOGIN'];?></strong>
                    <?php
                }
                unset($_SESSION['MENSAJE_LOGIN']);
                ?>
            </label>
        </form>
    </div>
</center>
</body>
<script src="../Resources/js/jquery-1.12.4.min.js"></script>
<script !src="">
    $(document).ready(function(){

        //$("#show_login").click(function(){
            showpopup();
        //});
        /*$("#close_login").click(function(){
            hidepopup();
        });
        */
    });

    function showpopup()
    {
        $("#loginform").fadeIn();
        $("#loginform").css({"visibility":"visible","display":"block"});
    }

    function hidepopup()
    {
        $("#loginform").fadeOut();
        $("#loginform").css({"visibility":"hidden","display":"none"});
    }
</script>
</html>