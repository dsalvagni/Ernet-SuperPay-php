<?php 
	require_once "../Lib/NuSoap/NuSoap.php"; 
	require_once "../Classes/SuperPayWebService.php";
	require_once "../Classes/SuperPay.php";

	$SuperPay = new SuperPay();

	if(isset($_POST['numeroTransacao']))
	{
		$RetornoGateway = $SuperPay->consultarTransacao($_POST['numeroTransacao']);
	}
?>
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Url Campainha</title>
	<style>
	body {
		font-family: sans-serif;
		font-size: 80%;
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
	.gateway-retorno
	{
		padding:10px;
		color: #00529B;
		background-color: #BDE5F8;
	}
	.gateway-retorno pre {
		font-size:12px;
		font-family: monospace;
	}
	form p label, form p span {
		display: block;
	}
	form p span {
		font-size:95%;
		color:#666;
	}
	hr
	{
		height: 1px;
		border:none;
		background-color: #00529B;
		margin:20px auto;
		width: 90%;
	}
	</style>
</head>
<body>
	<div class="page-header">
		<h1>Exemplo de "Url Campainha"</h1>
		<p>Este arquivo é chamado pelo Gateway assim que uma transação mudar de status.</p>
	</div>
	<?php if(isset($RetornoGateway)): ?>
	<div class="gateway-retorno">
		<h3>Retorno do Gateway</h3>
		<pre><?php print_r($RetornoGateway) ?></pre>
	</div>
	<?php endif; ?>

	<hr>
	<h2>Testar Manualmente</h2>
	<p>
		Para testar manualmente a consulta de uma transação, informe o Número da Transação abaixo e clique em Consultar.
	</p>
	<form action="" method="post">
		<fieldset>
			<legend>Consultar Transação</legend>
			<p>
				<label for="numeroTransacao">Número da Transação</label>
				<input type="text" name="numeroTransacao" id="numeroTransacao" value="<?php echo isset($_POST['numeroTransacao']) ? $_POST['numeroTransacao'] : null ; ?>">
				<input type="submit" value="Enviar" name="Enviar">
			</p>
		</fieldset>
	</form>
</body>
</html>