<?php 

class Usuario {

	private $id_usuario;
	private $login;
	private $senha;
	private $dtcadastro;
	
	public function getId_usuario(){
		return $this->id_usuario;		
	}
	public function setId_usuario($value){
		$this->id_usuario = $value;		
	}
	//--------------------------------------
	public function getLogin(){
		return $this->login;		
	}
	public function setLogin($value){
		$this->login = $value;		
	}
	//--------------------------------------
	public function getSenha(){
		return $this->senha;		
	}
	public function setSenha($value){
		$this->senha = $value;		
	}
	//--------------------------------------
	public function getDtcadastro(){
		return $this->dtcadastro;		
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;		
	}

	public function loadById($id){

		$sql = new SQL();

		$results = $sql->select("SELECT * FROM usuarios WHERE id_usuario = :ID", array(":ID"=>$id));
		if(count($results) > 0){

			$row = $results[0];

			$this->setId_usuario($row['id_usuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['data_cadastro']));
		}
	}

	public function login($login, $password){
		$sql = new SQL();

		$results = $sql->select("SELECT * FROM usuarios WHERE login = :LOGIN AND senha = :PASSWORD", array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password
			));

		if(count($results) > 0){

			$row = $results[0];

			$this->setId_usuario($row['id_usuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setDtcadastro(new DateTime($row['data_cadastro']));

		} else {

			throw new Exception("Login e/ou senha inváidos.");
		}	//echo "erro";
	}

	public static function listaUsuarios(){

		$sql = new SQL();

		return $sql->select("SELECT * FROM usuarios ORDER BY id_usuario;");
	}

	public static function pesquisa($login){
		$sql = new SQL();

		return $sql->select("SELECT * FROM usuarios WHERE login LIKE :SEARCH ORDER BY login", array(':SEARCH'=>"%".$login."%"
		));
	}
	
	public function __toString(){
		return json_encode(array(
			"id_usuario"=>$this->getId_usuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"data_cadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}
?>