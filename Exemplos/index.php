<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Gateway de Pagamento SuperPay</title>
	<style>
	body {
		font-family: sans-serif;
		font-size: 80%;
		padding:30px;
	}
	.page-header
	{
		margin-bottom:20px;
	}
	.page-header h1 {
		margin-bottom:0;
		padding-bottom:0;
	}
	.page-header p {
		font-size:95%;
		color:#666;
		margin-top:0;
		padding-top:0;
	}
	hr
	{
		height: 1px;
		border:none;
		background-color: #00529B;
		margin:20px auto;
		width: 90%;
	}
	dl
	{
		
	}
	dl dt {
		font-weight: bold;
	}
	dl dd 
	{
		margin-bottom:10px;
	}

	.index {
		background:#F1f1f1;
		padding:10px;
		width: auto;
		display: inline-block;
		border:1px solid #CCC;
	}
	</style>
</head>
<body>

	<div class="page-header">
		<h1>Guia de Utilização do SuperPay</h1>
		<p>Exemplos de uso do novo Gateway de pagamentos da Locaweb.</p>
	</div>
	<hr>
	<div class="index">
		<h3>Índice</h3>
		<ol>
			<li>
				<a href="#introducao">Introdução</a>
			</li>
			<li>
				<a href="#objetos">Objetos</a>
			</li>
			<li>
				<a href="#exemplos">Exemplos</a>
			</li>
		</ol>
	</div>
	<hr>
	<h2 id="introducao">Introdução</h2>
	<p>
		Pessoal, a Locaweb mudou o gateway de pagamento e agora utiliza o <a href="http://superpay.locaweb.com.br" target="_blank">SuperPay</a>. <br>
		<a href="mailto:daniel@we3online.com.br?subject=Guia de Utilização do SuperPay">Criei</a> uma série de códigos para ser base e facilitar a utilização com os sistemas.
	</p>
	<p>
		Vou precisar da colaboração de todos para ir melhorando esse código. Quem quiser contribuir, abaixo está a documentação recebida pela SuperPay.
	</p>
	<p>
		É importante a leitura da documentação para entender alguns termos que são utilizados, não necessariamente nesse caso, mas quando um Gateway de pagamento vier a discussão em outro projeto.
	</p>
	<ul>
		<li>
			<a href="Documentacao.pdf" target="_blank">Documentação</a>
		</li>
	</ul>
	<hr>
	<h2 id="objetos">Objetos</h2>
	<p>
		Abaixo a lista dos objetos utilizados e a definição de cada um deles. Quando puder, farei uma descrição mais específica de cada objeto e seus atributos.
	</p>
	<dl>
		<dt>SuperPay (Classes/SuperPay.php)</dt>
		<dd>
			Contém as informações específicas do estabelecimento, url do webservice, usuário, senha e "URL Campainha"; <br>
			Este é o objeto responsável por realizar os pagamentos e as consultas das transações.
		</dd>
		<dt>NuSoap (Lib/NuSoap/NuSoap.php)</dt>
		<dd>
			Biblioteca de Sopa para executar as requisições no WebService da SuperPay.
		</dd>
		<dt>SuperPayWebService (Classes/SuperPayWebService.php)</dt>
		<dd>
			É o intermédio entre a biblioteca de Soap (NuSoap em Lib/NuSoap/NuSoap.php) e o SuperPay.php. <br>
			Objeto que executa as requisições no WebService.
		</dd>
		<dt>SuperPayTransacao (Classes/SuperPayTransacao.php)</dt>
		<dd>
			É o objeto que é enviado para o Gateway de Pagamento. Nele estão as informações de Boleto, Cartão de Crédito,
			dados do pedido, dados do comprador e endereço de entrega.
		</dd>
		<dt>SuperPayBoleto (Classes/SuperPayBoleto.php)</dt>
		<dd>
			É o objeto responsável pelos atributos de um pagamento utilizando Boleto bancário.
		</dd>
		<dt>SuperPayCartao (Classes/SuperPayCartao.php)</dt>
		<dd>
			É o objeto responsável pelos atributos de um pagamento utilizando Cartão de Crédito, sem Redirect.
		</dd>
		<dt>SuperPayComprador (Classes/SuperPayComprador.php)</dt>
		<dd>
			É o objeto responsável pelos atributos do comprador.
		</dd>
		<dt>SuperPayEntrega (Classes/SuperPayEntrega.php)</dt>
		<dd>
			É o objeto responsável pelos atributos do endereço de entrega do comprador.
		</dd>
		<dt>SuperPayPedido (Classes/SuperPayPedido.php)</dt>
		<dd>
			É o objeto responsável pelos atributos do pedido do qual o pagamento se refere.
		</dd>
	</dl>
	<hr>
	<h2 id="exemplos">Exemplos</h2>
	<p>
		Criei um exemplo de cada caso que utilizamos mais.
	</p>
	<dl>
		<dt>
			<strong>Criar uma transação de Cartão de Crédito utilizando o Redirect</strong> <a href="CriarTransacaoCCRedirect.php" target="_blank">( Visualizar Exemplo )</a>
		</dt>
		<dd>
			<p>
				Realiza uma nova transação de pagamento na página da operadora. É, por exemplo, como o Cielo BuyPage Cielo.
			</p>
			<p>
				Nesse caso de Redirect, a transação ocorre na página da operadora do cartão de crédito, onde o cliente irá informar os dados 
				do seu cartão de crédito.
			</p>
			<p>
				O arquivo de exemplo é o CriarTransacaoCCRedirect.php na basta <em>Exemplos</em> e pode ser acesso <a href="CriarTransacaoCCRedirect.php" target="_blank">aqui</a>.
			</p>
		</dd>

		<dt>
			<strong>"URL Campainha"</strong> <a href="UrlCampainha.php" target="_blank">( Visualizar Exemplo )</a>
		</dt>
		<dd>
			<p>
				O arquivo de "Url Campainha" é utilizado pelo gateway de pagamento quando uma transação muda de status. 
			</p>
			<p class="exemplo">
				<strong>Exemplo</strong> <br>
				Um requisição de pagamento foi solicita pelo <em>e-commerce</em> para o <em>gateway</em> que respondeu que o <em>status</em> da transação é <strong>Aguardando Pagamento</strong>. <br>
				O <em>e-commerce</em> pode responder ao <strong>cliente (comprador)</strong> que está aguardando o pagamento do pedido. Quando (e se ocorrer) o status da transação alterar, essa URL Campainha 
				será chamada pelo Gateway. <br> Dentro desse arquivo é que deve haver o tratamento de uma atualização de status.
			</p>
			<p>
				O arquivo de exemplo é o UrlCampainha.php na basta <em>Exemplos</em> e pode ser acesso <a href="UrlCampainha.php" target="_blank">aqui</a>.
			</p>
		</dd>
	</dl>

	<hr>


</body>
</html>