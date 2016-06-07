<?php 

class Usuario{
	private $nidUsuario;
	private $snombre;
	private $susuario;
	private $sclave;
        private $stipoUsuario;
	private $smail;
        
	function __construct($snom,$susr,$sclave,$tipoUsuario,$smail){
		$this->snombre=$snom;
		$this->susuario=$susr;
		$this->sclave=md5($sclave);
                $this->stipoUsuario=$stipo;
                $this->smail=$semail;
	}
	public function getNombre(){
		return $this->snombre;
	}

	public function getIdacceso(){
		return $this->nidUsuario;
	}
        
        public function getNidacceso() {
            return $this->nidUsuario;
        }

        public function getSnombre() {
            return $this->snombre;
        }

        public function getSusuario() {
            return $this->susuario;
        }

        public function getSclave() {
            return $this->sclave;
        }

        public function getStipoUsuario() {
            return $this->stipoUsuario;
        }

        public function getSmail() {
            return $this->smail;
        }

        
	function VerificaUsuario(){
		$db=dbconnect();
		$sqlsel="select nombre from acceso
		where nomusuario=:usr";

		$querysel=$db->prepare($sqlsel);


		$querysel->bindParam(':usr',$this->susuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}

	function VerificaAcceso(){
		$db=dbconnect();
		$sqlsel="select idacceso,nombre from acceso
		where nomusuario=:usr and pwdusuario=:pwd";

		$querysel=$db->prepare($sqlsel);

		$querysel->bindParam(':usr',$this->susuario);
		$querysel->bindParam(':pwd',$this->sclave);

		$datos=$querysel->execute();

		if ($querysel->rowcount()==1){
                    
                    $registro = $querysel->fetch();
                    
                    $this->snombre=$registro['nombre'];
                    $this->nidUsuario=$registro['idacceso'];
			return true;
		}
		else{
			return false;
		}


	}
	function ActualizaClave($snewpwd){
		$db=dbconnect();

		$sqlupd="update acceso set pwdusuario=:pwd
					where idacceso=:id";

		$querysel=$db->prepare($sqlupd);

		$querysel->bindParam(':pwd',($snewpwd));
		$querysel->bindParam(':id',$this->nidUsuario);
		

		$valaux=$querysel->execute();
	
		return $valaux;
	}

}
?>