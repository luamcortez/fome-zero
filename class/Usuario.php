<?php 

class Usuario {
	private $idusuario;
	private $usuario;
	private $senha;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getLogin(){
		return $this->usuario;
	}

	public function setLogin($usuario){
		$this->usuario = $usuario;
	}
	
	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM login WHERE id = :ID", array(":ID"=>$id));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['id']);
			$this->setLogin($row['usuario']);
			$this->setSenha($row['senha']);

		}

	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM login ORDER BY id");
	}

	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM login WHERE usuario LIKE :SEARCH ORDER BY id", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function auth($login, $senha){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM login WHERE usuario = :LOGIN AND senha = :SENHA", 
			array(
				":LOGIN"=>$login,
				":SENHA"=>$senha
		));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['id']);
			$this->setLogin($row['usuario']);
			$this->setSenha($row['senha']);

		} else {

			throw new Exception("Login e/ou senha inválidos.");			

		}

	}

	public function __toString (){
		return json_encode(
			array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha()
			)
		);
	}
	


}


?>