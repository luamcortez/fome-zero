<?php

	require_once("config.php");
/*	session_start();

	$usuario = new Usuario();
	$usuario->verSession();*/

 ?>
 
  <!DOCTYPE html>
 <html>
 <head> 	
 	<title>Menu</title>
 	<link rel="stylesheet" type="text/css" href="css/reseter.css">
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 </head>
 <body>
	<div class="retangulo">
		<img src="images/logo.png" class="logo_login"/>
		<form id="menu" name="login" method="GET">
			<a class="button_login" href="tela_pedidos.php">FILA DE PEDIDOS</a>
			<a class="button_login" href="cardapio.php">CARDÁPIO</a>	
			<a class="button_login" href="editar_cardapio.php">EDITAR CARDAPIO</a>		
		</form>
	</div> 
 </body>
 </html>
