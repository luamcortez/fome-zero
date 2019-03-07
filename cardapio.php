<?php
	require_once("config.php");
 ?>

 <!DOCTYPE html>
 <html>
 <head> 	
 	<title>Cardápio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=2.0">

</head>
 <body class="fundo-cardapio">
	<div class="container">
		<div class="logo-cardapio"></div>

		<button class="button-pedidos">
			<img class="icone-recibo" src="documentacao/assets/icone-recibo.png" alt="">
			<a>Pedidos</a>
			<div class="circulo-numero"><p>15</p></div>
		</button>

		<div class="container-categoria">
			<div class="conteudo-categorias">
				<button class="button-categoria">Categoria 1</button>
				<button class="button-categoria">Categoria 2</button>
				<button class="button-categoria">Categoria 3</button>
				<button class="button-categoria">Categoria 4</button>
				<button class="button-categoria">Categoria 5</button>
				<button class="button-categoria">Categoria 6</button>
				<button class="button-categoria">Categoria 7</button>
				<button class="button-categoria">Categoria 8</button>
			</div>
		</div>
		<div class="container-itens">
			<div class="conteudo-itens">

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				<div class="item">
					<img class="item-foto" src="https://source.unsplash.com/featured/?food">
					<button class="item-button">
						<p>R$ 20,00</p>
						<div class="circulo"><a>+</a></div>
					</button>
					<p class="item-titulo">Título</p>
					<div class="item-descricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Sed id ipsum mi. Aliquam in arcu eleifend, venenatis leo fermentum, egestas orci.
						Nunc pulvinar tortor ut enim sodales accumsan.
					</div>
				</div>

				
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script>
	$(document).ready(function() {
		$(".button-categoria").click(function () {
			$(this).addClass("button-categoria-active");
			$(".button-categoria").not(this).removeClass("button-categoria-active");
		});

	});
	</script>
</body>
 </html>