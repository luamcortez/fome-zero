<?php 
	session_start();
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
		<form name="login" method="POST" action="ope.php">
			<input type="text" placeholder="Usuário" name="nome">
			<input type="password" placeholder="Senha" name="senha">	
			<button style="height: 50px;" type="submit" name="enviar" class="button_login">ENTRAR</button>		
		</form>
	</div> 
 </body>
 </html>