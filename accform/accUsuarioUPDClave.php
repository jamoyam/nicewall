<?php
include("../librerias.php");

$newpewd=$_POST['clave'];

session_start();
if (!isset($_SESSION["oUsuario"])){
	?>

<script>
	document.location.href="index.php";
</script>
<?php 
}

$oUsr=$_SESSION["oUsuario"];
var_dump($oUsr);
if($oUsr->ActualizaClave($newpewd)){
    echo "clave actualizada"; 
}else
{echo "ERROR";
}
?>



