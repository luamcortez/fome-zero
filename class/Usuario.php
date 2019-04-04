<?php 

class Usuario {
	private $idusuario;
	private $usuario;
	private $senha;

	/* /GET AND SETTERS/ */

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

	/* /GET AND SETTERS/ */

	public function loadById($id){ //METÓDO QUE BUSCA 1 USUARIO BASEADO NO ID

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM login WHERE id = :ID", array(":ID"=>$id));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['id']);
			$this->setLogin($row['usuario']);
			$this->setSenha($row['senha']);

		}

	}

	public static function getList(){  //METÓDO QUE RETORNA TODOS USUARIOS NO BANCO
		$sql = new Sql();
		return $sql->select("SELECT * FROM login ORDER BY id");
	}

	public static function search($login){ //METÓDO QUE BUSCA USUARIOS NO BANCO (BASEADO NA STRING)
		$sql = new Sql();
		return $sql->select("SELECT * FROM login WHERE usuario LIKE :SEARCH ORDER BY id", array(
			':SEARCH'=>"%".$login."%"
		));
	}

	public function auth($login, $senha){ //METÓDO QUE AUTENTICA O USUARIO E A SENHA
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

			//$_SESSION['user_id'] = $this->idusuario; //Se logar, seta a sessao pro ID do usuario
			
			$this->redirect($this->usuario);//chama funcao pra redirecionar

		} else {

			throw new Exception("Login e/ou senha inválidos.");			

		}

	}

	public function __toString (){ //METÓDO QUE PADRONIZA O ECHO DA CLASSE
		return json_encode(
			array(
			"idusuario"=>$this->getIdusuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha()
			)
		);
	}
	
	public function redirect ($login){ //METODO QUE REDIRECIONA O USUARIO PARA A DEVIDA PAGINA
		switch($login){
			case 'admin':
				header("Location: index.php");
				break;
			case 'chef':
				header("Location: tela_pedidos.php");
				break;
			default:
				header("Location: cardapio.php");
				break;
		}
	}

/*	public function verSession (){ //verifica se sessão ja existe
		if ( isset( $_SESSION['user_id'] ) ) {
			echo $_SESSION['user_id'];
		} else {
	   		// Redirect them to the login page
	    	header("Location: login.php");
		}
	}*/

}





?>