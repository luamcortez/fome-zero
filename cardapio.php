<?php

	include 'dbh.php';
	require_once("config.php");

 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Cardápio</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>

    <body class="fundo-cardapio">

        <script>        	
            var CountProdutos = 0;
            var ProdutosId = [];
            var AuxProdutos;

            function asdmais() {
                CountProdutos++;
                console.log(CountProdutos);
                $("#exibir_itens").text(CountProdutos);
            }

            function asdmenos() {
                if (CountProdutos != 0) {
                    CountProdutos--;
                }

                $("#exibir_itens").text(CountProdutos);
                console.log(CountProdutos);
            }

            function addProdutos(id) {

                ProdutosId[CountProdutos] = id;

            }

            function removeProduto() {

                ProdutosId.splice(-1, 1);

            }

            function exibeProdutosPedido() {
            	var valorTotal = 0;
                var html = '';                
                for (var i = 0; i < AuxProdutos.length; i++) {                	
                    if (ProdutosId.indexOf(eval(AuxProdutos[i].idproduto)) > -1) {
                        var nome = AuxProdutos[i].nome;
                        var descricao = AuxProdutos[i].descricao;
                        var valor = AuxProdutos[i].valor;
                        var url_img = AuxProdutos[i].url_img;
                        var idproduto = AuxProdutos[i].idproduto;
                        html += '<div style="width: 640px;" class="item">';
                        html += '<img class="item-foto" src="' + url_img + '">';
                        html += '<div class="item-preco"><p>R$ ' + valor + '</p></div>';
                        html += '<p style="color:black;" class="item-titulo">' + nome + '</p>';
                        html += '</div>';

                        valorTotal = valorTotal + parseFloat(valor);
                    }

                }

                $('#abobrinha').html(html);
                $('#valortotal').text("R$:" + valorTotal + "0");

                console.log(html);

            }

            var tipo_idtipo = '1';

            function puxa_dados(tipo_idetipo) {
                var id = tipo_idtipo;
                $.post("carregar_itens.php", {
                        tipo_idtipo: tipo_idetipo
                    })
                    //$.post("carregar_itens.php",{ tipo_idtipo: id })
                    .done(function(dadosJSON) {
                        var dados = JSON.parse(dadosJSON);
                        AuxProdutos = dados;
                        var html = '';
                        for (var i = 0; i < dados.length; i++) {
                            var nome = dados[i].nome;
                            var descricao = dados[i].descricao;
                            var valor = dados[i].valor;
                            var url_img = dados[i].url_img;
                            var idproduto = dados[i].idproduto;
                            html += '<div class="item">';
                            html += '<img class="item-foto" src="' + url_img + '">';
                            html += '<div class="item-preco"><p>R$ ' + valor + '</p></div>';
                            html += '<button class="circulo-mais" id="mais" onclick="asdmais();addProdutos(' + idproduto + ');">+</button>	<button class="circulo-menos" id ="menos" onclick="asdmenos();removeProduto();">-</button>';
                            html += '<p class="item-titulo">' + nome + '</p>';
                            html += '<div class="item-descricao">' + descricao + '</div></div>';                            
                        }
                        $('#itens').html(html);
                        console.log(dados);
                    })
            }
            $(document).ready(function() {
                puxa_dados(tipo_idtipo);
                $(".button-categoria").click(function(event) {
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

            <a class="button-pedidos">
                <img class="icone-recibo" src="documentacao/assets/icone-recibo.png" alt="">
                <a id="pedidos">Pedidos</a>
                <div class="circulo-numero">
                    <p id="exibir_itens">0</p>
                </div>
            </a>
            <a onclick="exibeProdutosPedido()" href="#openModal" class="button-pedidos" style="background-color: transparent"></a>

            <div class="container-categoria">
                <div class="conteudo-categorias" id="categorias">
                    <?php
					$sql = "SELECT * FROM tipo";
					$result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result)) {		//Varre a tabela tipo e carrega as categorias nos botões
						if ($row['idtipo'] == 1) {
							echo '<button class="button-categoria button-categoria-active" id="';
							echo $row['idtipo'];
							echo '">';
							echo $row['categoria'];
							echo "</button>";
						}else{
							echo '<button class="button-categoria" id="';
							echo $row['idtipo'];
							echo '">';
							echo $row['categoria'];
							echo "</button>";
						}
					}
				?>
                </div>
            </div>

            <div class="container-itens">
                <div class="conteudo-itens" id="itens"></div>
            </div>

        </div>

        </div>

        <div id="openModal" class="modalDialog">
            <div>
                <div id="abobrinha" style="overflow: scroll !important;height: 400px;width: 651px;"></div>
                <a href="#" title="Voltar" class="voltar"><i class="fa fa-arrow-left" aria-hidden="true"></i>Voltar</a>
                <p class="valortotal" id="valortotal"></p>
                <a href="#" title="Finalizar" class="finalizar"><i class="fa fa-cutlery" aria-hidden="true"></i>Finalizar Pedido</a>
            </div>

        </div>

    </body>

    </html>