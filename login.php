<?php 

	require_once("config.php");

	//$sql = new Sql();
	//$usuarios = $sql->select("SELECT * FROM login");
	//echo json_encode($usuarios);	

	//$user = new Usuario();
	//$user->loadById(2);	
	//echo $user;

	//$lista = Usuario::getList();
	//echo json_encode($lista);

	//$search = Usuario::search("a");
	//echo json_encode($search);

	//$usuario = new Usuario();
	//$usuario->auth("lucas", "1234");
	//echo $usuario;

?>

 <!DOCTYPE html>
 <html>
 <head> 	
 	<title>Tela de Login</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">

 </head>
 <body>
	<div class="retangulo">
		<img src="images/logo.png" class="logo_login"/>
		<form name="login" method="POST" action="">
			<input type="text" placeholder="Usuário" name="login">
			<input type="password" placeholder="Senha" name="senha">	
			<button style="height: 50px;" type="submit" name="enviar" class="button_login">ENTRAR</button>		
		</form>
	</div> 
 </body>
 </html>