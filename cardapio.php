<?php
	require_once("config.php");
	$item_qtd = 0;
	
 ?>

<!DOCTYPE html>
 <html>
 <head> 	
 	<title>Cardápio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/csCs?family=Crimson+Text" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=2.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
 <body class="fundo-cardapio">
	<div class="container">
		<div class="logo-cardapio"></div>

		<button class="button-pedidos">
			<img class="icone-recibo" src="documentacao/assets/icone-recibo.png" alt="">
			<a href="#openModal">Pedidos</a>
			<div class="circulo-numero"><p><?php echo $item_qtd ?></p></div>
		</button>

		<div class="container-categoria">
			<div class="conteudo-categorias">
				<button type=button class="button-categoria button-categoria-active" data-src="especialidades.php">Especialidades</button>
				<button type=button class="button-categoria" data-src="carnes.php">Carnes</button>
				<button type=button class="button-categoria" data-src="massas.php">Massas</button>
				<button type=button class="button-categoria" data-src="acompanhamentos.php">Acompanhamentos</button>
				<button type=button class="button-categoria" data-src="frutos_do_mar.php"> Frutos do Mar</button>
				<button type=button class="button-categoria" data-src="sobremesas.php">Sobremesas</button>
				<button type=button class="button-categoria" data-src="bebidas.php">Bebidas</button>
			</div>
		</div>

		<iframe class="container-itens" src="especialidades.php" name="ifrm" id="ifrm">
		</iframe>

	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script>
	$(document).ready(function() {
		$(".button-categoria").click(function () {
			$(this).addClass("button-categoria-active");
			$("#ifrm").attr("src", $(this).data('src'));
			$(".button-categoria").not(this).removeClass("button-categoria-active");
		});


	});
	</script>

	<div id="openModal" class="modalDialog">
		<div>
			<div></div>		
			<a href="" title="Voltar" class="voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
			<p class="valortotal">Total: R$ 89.90 <?php ?></p>
			<a href="" title="Finalizar" class="finalizar"><i class="fa fa-cutlery" aria-hidden="true"></i>Finalizar Pedido</a>
		</div>
		
	</div>

</body>
 </html>