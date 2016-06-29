<?php namespace Models;
require_once('Connection.php');
class Usuario
{
    private $nombreUsuario;
    private $user;
    private $pass;
    private $idPerfil;
    private $conex;

    public function __construct(){
        $this->conex = new Connection();
    }

    public function create(){
        $sql = "INSERT INTO usuario(nombreUsuario, users, pass, Perfil_idPerfil) VALUES('{$this->nombreUsuario}','{$this->user}','{$this->pass}','{$this->idPerfil}');";
        $this->conex->simpleQuery($sql);
    }

    public function maxId(){
        return mysqli_fetch_row($this->conex->returnQuery("SELECT MAX(idUsuario)FROM usuario;"))[0];
    }

    public function loginCliente(){
        $fila = $this->conex->returnQuery("SELECT * FROM usuario u JOIN perfil p ON u.Perfil_idPerfil=p.idPerfil WHERE u.users = '{$this->user}';");
        session_start();
        if(mysqli_num_rows($fila)==1) {
            $array = mysqli_fetch_array($fila);
            if ($array['tipoPerfil'] == "Administrador") {
                $_SESSION['MENSAJE_LOGIN']='USUARIO INEXISTENTE';
                header('Location: ../Views/home.php');
            } else {
                if ($array['pass'] != $this->pass) {
                    $_SESSION['MENSAJE_LOGIN'] = 'CONTRASEÑA INCORRECTA';
                    header('Location: ../Views/home.php');
                } else {
                    $_SESSION['EN_SESION'] = $array['nombreUsuario'];
                    $_SESSION['TIPO_SESION'] = "CLIENTE";
                    $_SESSION['ID_USUARIO']= $array['idUsuario'];
                    header('Location: ../Views/home.php');
                }
            }
        }else{
            $_SESSION['MENSAJE_LOGIN']='USUARIO INEXISTENTE';
            header('Location: ../Views/home.php');
        }
    }

    public function delete($id){
        $this->conex->simpleQuery("DELETE FROM usuario WHERE idUsuario = '{$id}';");
    }

    public function loginAdministradores(){
        $fila = $this->conex->returnQuery("SELECT * FROM usuario u JOIN perfil p ON u.Perfil_idPerfil=p.idPerfil WHERE u.users = '{$this->user}';");
        session_start();
        if(mysqli_num_rows($fila)==1) {
            $array = mysqli_fetch_array($fila);
            if ($array['tipoPerfil'] == "Cliente") {
                $_SESSION['MENSAJE_LOGIN']='USUARIO INEXISTENTE';
                header('Location: ../Views/manager.php');
            } else {
                if ($array['pass'] != $this->pass) {
                    $_SESSION['MENSAJE_LOGIN'] = 'CONTRASEÑA INCORRECTA';
                    header('Location: ../Views/manager.php');
                } else {
                    $_SESSION['EN_SESION'] = $array['nombreUsuario'];
                    $_SESSION['TIPO_SESION'] = "ADMIN";
                    header('Location: ../Views/Maintenance.php');
                }
            }
        }else{
            $_SESSION['MENSAJE_LOGIN']='USUARIO INEXISTENTE';
            header('Location: ../Views/manager.php');
        }
    }

    public function read(){
        $sql = "SELECT * FROM usuario WHERE nombreUsuario != 'Administrador';";
        return $this->conex->returnQuery($sql);
    }

    /**
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param mixed $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }

    /**
     * @param mixed $idPerfil
     */
    public function setIdPerfil($idPerfil)
    {
        $this->idPerfil = $idPerfil;
    }

    /**
     * @return Connection
     */
    public function getConex()
    {
        return $this->conex;
    }

    /**
     * @param Connection $conex
     */
    public function setConex($conex)
    {
        $this->conex = $conex;
    }
    
    
}