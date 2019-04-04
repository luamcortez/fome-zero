 <?php

	include 'dbh.php';
	require_once("config.php");
		
 ?>

<!DOCTYPE html>
 <html>
 <head> 	
	<title>Editar Cardápio</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=2.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
 <body class="fundo-cardapio">

	 
 

	<script>
		var tipo_idtipo = '1';
		function puxa_dados(tipo_idetipo){
			var id = tipo_idtipo;
			$.post("carregar_itens.php",{ tipo_idtipo: id })
				.done(function(dadosJSON){
					var dados = JSON.parse(dadosJSON);
					var html = '';
					for(var i = 0; i < dados.length; i++) {
						var nome = dados[i].nome;
						var descricao = dados[i].descricao;
						var valor = dados[i].valor;
						var url_img = dados[i].url_img;
						html += '<div class="item">';
						html += '<img class="item-foto" src="' + url_img + '">';
						html += '<div class="item-preco"><p>R$ ' + valor + '</p></div>';
						html += '<p class="item-titulo">' + nome + '</p>';
						html += '<div class="item-descricao">' + descricao + '</div></div>';
					}
					$('#itens').html(html);
					console.log(dados);
				})
		}
		
		$(document).ready(function() {
			puxa_dados(tipo_idtipo);
			$(".button-categoria").click(function (event) {
				console.log(event);
				//deixa o botão clicado amarelo
				$(this).addClass("button-categoria-active");

				//Salva o id do botão clicado em tipo_idtipo
				tipo_idtipo = event.target.id;

				puxa_dados(tipo_idtipo);
				
				//Remove o amarelo ao clicar em outro botão
				$(".button-categoria").not(this).removeClass("button-categoria-active");
			});
		});
	</script>

	<div class="container">

		<div class="logo-cardapio"></div>

		<button type=button class="button-add-item">
			<a class="circulo-mais circulo-mais-extra" id="add-item">+</a>
			Adicionar Item
		</button>
		<a href="#openModalItem" class="button-add-item" style="background-color: transparent; padding: 0; border: 0"></a>
		
		<button type=button class="button-add-categoria">
			<a class="circulo-mais circulo-mais-extra" id="add-categoria">+</a>
			Adicionar Categoria
		</button>
		<a href="#openModalCategoria" class="button-add-categoria" style="background-color: transparent; padding: 0; border: 0"></a>

		<div class="container-categoria-edit">
			<div class="conteudo-categorias" id="categorias">

				<!-- EXEMPLO DE BOTÃO DE CATEGORIA -->
				<!-- <button type=button class="button-categoria">Carnes<span class="circulo-menos-extra"><a>-</a></span></button>	 -->

				<?php
	
					$sql = "SELECT * FROM tipo";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)) {		//Varre a tabela tipo e carrega as categorias nos botões
						if ($row['idtipo'] == 1) {
							echo '<button class="button-categoria button-categoria-active" id="';
							echo $row['idtipo'];
							echo '">';
							echo $row['categoria'];
							echo '<span class="circulo-menos-extra"><a>-</a></span>';
							echo "</button>";
						}else{
							echo '<button class="button-categoria" id="';
							echo $row['idtipo'];
							echo '">';
							echo $row['categoria'];
							echo '<span class="circulo-menos-extra"><a>-</a></span>';
							echo "</button>";
						}
					}

				?>
				<script>

					// $(document).ready(function(){
					// 	$(".circulo-menos-extra").click(function(){
							
							
					// 		$.post("salvar_categoria.php", dados, function(info){
					// 			$("#notifica").html(info).fadeIn().delay(3000).fadeOut();
					// 			$("#addCategoria").each(function() {
					// 				this.reset();
					// 			});
					// 		});
							
					// 	});
					// });

				</script>


			</div>
		</div>
		
		<div class="container-itens">
			<div class="conteudo-itens" id="itens"></div>
		</div>

		</div>

	</div>

	<!-- MODAL PARA ADICIONAR CATEGORIA -->

	<div id="openModalCategoria" class="modalDialog">
		<div>
			<form method="post" id="addCategoria" action="salvar_categoria.php">
				<input type="text" name="categoria" id="categoria" autocomplete="off" placeholder="Digite uma nova categoria">
				<a href="#" title="voltar" class="voltar" style="left: 90px"><i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
				<input type="button" value="Adicionar" id="adicionar">
			</form>
			<a id="notifica" style="color: green; margin-left:55px; font-weight: 800"></a>
		</div>

		<script>

			$(document).ready(function(){
				$("#adicionar").click(function(){
					var dados = $("#categoria").serializeArray();
					
					$.post("salvar_categoria.php", dados, function(info){
						$("#notifica").html(info).fadeIn().delay(3000).fadeOut();
						$("#addCategoria").each(function() {
							this.reset();

							<?php
								$sql = "SELECT * FROM tipo";
								$result = mysqli_query($conn, $sql);
								$categorias = '';
								
								while($row = mysqli_fetch_assoc($result)) {		//Varre a tabela tipo e carrega as categorias nos botões
									if ($row['idtipo'] == 1) {
										$categorias =+ '<button class="button-categoria button-categoria-active" id="';
										$categorias =+ $row['idtipo'];
										$categorias =+ '">';
										$categorias =+ $row['categoria'];
										$categorias =+ '<span class="circulo-menos-extra"><a>-</a></span>';
										$categorias =+ "</button>";
									}else{
										$categorias =+ '<button class="button-categoria" id="';
										$categorias =+ $row['idtipo'];
										$categorias =+ '">';
										$categorias =+ $row['categoria'];
										$categorias =+ '<span class="circulo-menos-extra"><a>-</a></span>';
										$categorias =+ "</button>";
									}
								}

								mysqli_close($conn);
							?>
							var categorias = <?php echo $categorias ?>;
							$("#categorias").html(categorias);

						});

					});
					
				});
			});
		</script>

	</div>


















	<!-- MODAL PARA ADICIONAR ITEM -->
	<div id="openModalItem" class="modalDialog">
		<div>
			
			<form>
				<input name="" type="text">
			</form>
			<a href="" title="Voltar" class="voltar" style="left: 90px"><i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
			<a type="submit" href="" title="Confirmar" class="confirmar"><i class="fa fa-cutlery" aria-hidden="true"></i>Confirmar</a>
		</div>
		
	</div>

</body>
 </html>
