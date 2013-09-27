<?php
	require_once "../Lib/NuSoap/NuSoap.php"; 
	require_once "../Classes/SuperPayBoleto.php";
	require_once "../Classes/SuperPayCartao.php";
	require_once "../Classes/SuperPayComprador.php";
	require_once "../Classes/SuperPayEntrega.php";
	require_once "../Classes/SuperPayPedido.php";
	require_once "../Classes/SuperPayTransacao.php";
	require_once "../Classes/SuperPayWebService.php";
	require_once "../Classes/SuperPay.php";

	$SuperPay = new SuperPay();

	if (isset($_POST['Enviar'])) {
		
		/* Informações do Comprador */
		$CompradorCodigo      					= (isset($_POST['codigoCliente'])) ? $_POST['codigoCliente'] : null;
		$CompradorTipo        					= (isset($_POST['tipoCliente'])) ? $_POST['tipoCliente'] : null;
		$CompradorNome        					= (isset($_POST['nomeComprador'])) ? $_POST['nomeComprador'] : null;
		$CompradorDocumento   					= (isset($_POST['documentoComprador'])) ? $_POST['documentoComprador'] : null;
		$CompradorDocumento2  					= (isset($_POST['documentoComprador2'])) ? $_POST['documentoComprador2'] : null;
		$CompradorSexo        					= (isset($_POST['sexoComprador'])) ? $_POST['sexoComprador'] : null;
		$CompradorDataNascimento        		= (isset($_POST['dataNascimentoComprador'])) ? $_POST['dataNascimentoComprador'] : null;
		$CompradorEmail                 		= (isset($_POST['emailComprador'])) ? $_POST['emailComprador'] : null;

		$enderecoComprador                 		= (isset($_POST['enderecoComprador'])) ? $_POST['enderecoComprador'] : null;		
		$numeroEnderecoComprador                = (isset($_POST['numeroEnderecoComprador'])) ? $_POST['numeroEnderecoComprador'] : null;		
		$bairroEnderecoComprador                = (isset($_POST['bairroEnderecoComprador'])) ? $_POST['bairroEnderecoComprador'] : null;		
		$complementoEnderecoComprador           = (isset($_POST['complementoEnderecoComprador'])) ? $_POST['complementoEnderecoComprador'] : null;		
		$cidadeEnderecoComprador                = (isset($_POST['cidadeEnderecoComprador'])) ? $_POST['cidadeEnderecoComprador'] : null;		
		$estadoEnderecoComprador                = (isset($_POST['estadoEnderecoComprador'])) ? $_POST['estadoEnderecoComprador'] : null;		
		$cepEnderecoComprador                   = (isset($_POST['cepEnderecoComprador'])) ? $_POST['cepEnderecoComprador'] : null;

		$ddiComprador                           = (isset($_POST['ddiComprador'])) ? $_POST['ddiComprador'] : null;
		$dddComprador                           = (isset($_POST['dddComprador'])) ? $_POST['dddComprador'] : null;
		$telefoneComprador                      = (isset($_POST['telefoneComprador'])) ? $_POST['telefoneComprador'] : null;
		$codigoTipoTelefoneComprador            = (isset($_POST['codigoTipoTelefoneComprador'])) ? $_POST['codigoTipoTelefoneComprador'] : null;

		$ddiAdicionalComprador                  = (isset($_POST['ddiAdicionalComprador'])) ? $_POST['ddiAdicionalComprador'] : null;
		$dddAdicionalComprador                  = (isset($_POST['dddAdicionalComprador'])) ? $_POST['dddAdicionalComprador'] : null;
		$telefoneAdicionalComprador             = (isset($_POST['telefoneAdicionalComprador'])) ? $_POST['telefoneAdicionalComprador'] : null;
		$codigoTipoTelefoneAdicionalComprador   = (isset($_POST['codigoTipoTelefoneAdicionalComprador'])) ? $_POST['codigoTipoTelefoneAdicionalComprador'] : null;
		/* /Informações do Comprador */

		/* Informações da Transação */
		$numeroTransacao      					= (isset($_POST['numeroTransacao'])) ? $_POST['numeroTransacao'] : null;
		$idioma      					        = (isset($_POST['idioma'])) ? $_POST['idioma'] : null;
		$origemTransacao      					= (isset($_POST['origemTransacao'])) ? $_POST['origemTransacao'] : null;
		/* /Informações da Transação */

		/* Informações da Entrega */
		$enderecoEntrega                 	  = (isset($_POST['enderecoEntrega'])) ? $_POST['enderecoEntrega'] : null;		
		$numeroEnderecoEntrega                = (isset($_POST['numeroEnderecoEntrega'])) ? $_POST['numeroEnderecoEntrega'] : null;		
		$bairroEnderecoEntrega                = (isset($_POST['bairroEnderecoEntrega'])) ? $_POST['bairroEnderecoEntrega'] : null;		
		$complementoEnderecoEntrega           = (isset($_POST['complementoEnderecoEntrega'])) ? $_POST['complementoEnderecoEntrega'] : null;		
		$cidadeEnderecoEntrega                = (isset($_POST['cidadeEnderecoEntrega'])) ? $_POST['cidadeEnderecoEntrega'] : null;		
		$estadoEnderecoEntrega                = (isset($_POST['estadoEnderecoComprador'])) ? $_POST['estadoEnderecoComprador'] : null;		
		$cepEnderecoEntrega                   = (isset($_POST['cepEnderecoComprador'])) ? $_POST['cepEnderecoComprador'] : null;

		$ddiEntrega                           = (isset($_POST['ddiEntrega'])) ? $_POST['ddiEntrega'] : null;
		$dddEntrega                           = (isset($_POST['dddEntrega'])) ? $_POST['dddEntrega'] : null;
		$telefoneEntrega                      = (isset($_POST['telefoneEntrega'])) ? $_POST['telefoneEntrega'] : null;
		$codigoTipoTelefoneEntrega            = (isset($_POST['codigoTipoTelefoneEntrega'])) ? $_POST['codigoTipoTelefoneEntrega'] : null;

		$ddiAdicionalEntrega                  = (isset($_POST['ddiAdicionalEntrega'])) ? $_POST['ddiAdicionalEntrega'] : null;
		$dddAdicionalEntrega                  = (isset($_POST['dddAdicionalEntrega'])) ? $_POST['dddAdicionalEntrega'] : null;
		$telefoneAdicionalEntrega             = (isset($_POST['telefoneAdicionalEntrega'])) ? $_POST['telefoneAdicionalEntrega'] : null;
		$codigoTipoTelefoneAdicionalEntrega   = (isset($_POST['codigoTipoTelefoneAdicionalEntrega'])) ? $_POST['codigoTipoTelefoneAdicionalEntrega'] : null;
		/* /Informações da Entrega */

		/* Informações do Pedido */
		$codigoFormaPagamento      			  = (isset($_POST['codigoFormaPagamento'])) ? $_POST['codigoFormaPagamento'] : null;
		$parcelas      					      = (isset($_POST['parcelas'])) ? $_POST['parcelas'] : null;
		$valor      					      = (isset($_POST['valor'])) ? $_POST['valor'] : null;
		$valorDesconto      				  = (isset($_POST['valorDesconto'])) ? $_POST['valorDesconto'] : null;
		$taxaEmbarque      					  = (isset($_POST['taxaEmbarque'])) ? $_POST['taxaEmbarque'] : null;
		/* /Informações do Pedido */

		$SuperPayComprador = new SuperPayComprador(
				$CompradorCodigo,
				$CompradorTipo,
				$CompradorNome,
				$CompradorDocumento,
				$CompradorDocumento2,
				$CompradorSexo,
				$CompradorDataNascimento,

				$telefoneComprador,
				$dddComprador,
				$ddiComprador,				
				$codigoTipoTelefoneComprador,

				$telefoneAdicionalComprador,
				$dddAdicionalComprador,
				$ddiAdicionalComprador,
				$codigoTipoTelefoneAdicionalComprador,

				$CompradorEmail,
				$enderecoComprador,
				$numeroEnderecoComprador,
				$bairroEnderecoComprador,
				$complementoEnderecoComprador,
				$cidadeEnderecoComprador,
				$estadoEnderecoComprador,
				$cepEnderecoComprador
			);


		$SuperPayPedido    = new SuperPayPedido(
				$codigoFormaPagamento,
				$parcelas,
				$valor,
				$valorDesconto,
				$taxaEmbarque
			);


		$SuperPayEntrega   = new SuperPayEntrega(
				$telefoneEntrega,
				$dddEntrega,
				$ddiEntrega,
				$codigoTipoTelefoneEntrega,

				$telefoneAdicionalEntrega,
				$dddAdicionalEntrega,
				$ddiAdicionalEntrega,
				$codigoTipoTelefoneAdicionalEntrega,

				$enderecoEntrega,
				$numeroEnderecoEntrega,
				$bairroEnderecoEntrega,
				$complementoEnderecoEntrega,
				$cidadeEnderecoEntrega,
				$estadoEnderecoEntrega,
				$cepEnderecoEntrega
		);		

		$SuperPayTransacao = new SuperPayTransacao(
			$SuperPayPedido,
            $SuperPayComprador,
            $SuperPayEntrega,
            new SuperPayBoleto(),
            new SuperPayCartao()
        );	
        $SuperPayTransacao->setTransacaoIdioma($idioma)
        				  ->setTransacaoID($numeroTransacao)
        				  ->setTransacaoOrigem($origemTransacao);

        $RetornoGateway = $SuperPay->realizarPagamento($SuperPayTransacao);

        if(is_array($RetornoGateway))
        {
        	$arrRetorno = $RetornoGateway["return"];
        	$UrlRedirecionamento   = isset($arrRetorno['urlPagamento']) ? $arrRetorno['urlPagamento'] : false ;

        	var_dump($RetornoGateway);
	        //if($UrlRedirecionamento)
	        	//header('Location: '.$UrlRedirecionamento);
        }
	}
?>
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Criando uma Transação de Cartão de Crédito com Redirect</title>
	<style>
	body {
		font-family: sans-serif;
		font-size: 80%;
	}
	form p label, form p span {
		display: block;
	}
	form p span {
		font-size:95%;
		color:#666;
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
	input[type="submit"]
	{
		font-style: 20px;
		font-weight:bold;
		padding:10px;
	}
	hr
	{
		height: 1px;
		border:none;
		background-color: #00529B;
		margin:20px auto;
		width: 90%;
	}
	fieldset
	{
		margin:35px 0;
	}
	</style>
</head>
<body>
	<div class="page-header">
		<h1>Criando uma Transação como Gateway SuperPay</h1>
		<p>Realiza um novo pagamento</p>
	</div>
	<?php if(isset($RetornoGateway)): ?>
	<div class="gateway-retorno">
		<h3>Retorno do Gateway</h3>
		<pre><?php print_r($RetornoGateway) ?></pre>
	</div>
	<?php endif; ?>
	<h2>Formulário de Exemplo de Compra</h2>
	<form action="" method="post">
		<fieldset>
			<legend>Informação da Transação</legend>
			<p>
				<label for="numeroTransacao">Número da Transação</label>
				<input type="text" name="numeroTransacao" id="numeroTransacao" value="123">
			</p>
			<p>
				<label for="idioma">Idioma</label>
				<select name="idioma" id="idioma">
					<option value="1">Português - Código: 1</option>
					<option value="2">Inglês    - Código: 2</option>
					<option value="3">Espanhol  - Código: 3</option>
				</select>
			</p>
			<p>
				<label for="origemTransacao">Origem da Transação</label>
				<select name="origemTransacao" id="origemTransacao">
					<option value="1">eCommerce - Código: 1</option>
					<option value="2">Mobile    - Código: 2</option>
					<option value="3">URA       - Código: 3</option>
					<option value="4">POS       - Código: 4</option>
				</select>
			</p>
		</fieldset>

		<fieldset>
			<legend>Informações do Pedido</legend>
			<p>
				<label for="codigoFormaPagamento">Código da Forma de Pagamento</label>
				<select name="codigoFormaPagamento" id="codigoFormaPagamento">
					<optgroup label="CARTOES DE CREDITO / DEBITO">
						<option value="60">Visa Moset3                      - Cielo           - Codigo = 60</option>
						<option value="61">MasterCard Moset3                - Cielo           - Codigo = 61</option>
						<option value="63">Elo Moset3                       - Cielo           - Codigo = 63</option>
						<option value="70">Visa VBV2                        - Cielo           - Codigo = 70</option>
						<option value="71">MasterCard VBV2                  - Cielo           - Codigo = 71</option>
						<option value="73">Elo VBV2                         - Cielo           - Codigo = 73</option>
						<option value="40">Visa Electron Bradesco VBV2      - Cielo           - Codigo = 40</option>
						<option value="80">Visa Komerci Integrado           - Redecard        - Codigo = 80</option>
						<option value="81">MasterCard Komerci Integrado     - Redecard        - Codigo = 81</option>
						<option value="82">Diners Komerci Integrado         - Redecard        - Codigo = 82</option>
						<option value="90">Visa Komerci Webservices         - Redecard        - Codigo = 90</option>
						<option value="91">MasterCard Komerci Webservices   - Redecard        - Codigo = 91</option>
						<option value="92">Diners Komerci Webservices       - Redecard        - Codigo = 92</option>
						<option value="10">American Express 3Party          - Amex            - Codigo = 10</option>
						<option value="11">American Express 3Party          - Amex            - Codigo = 11</option>
						<option value="3">Visa							    - TEF             - Codigo = 3</option>
						<option value="6">MasterCard					    - TEF             - Codigo = 6</option>
						<option value="9">Diners						    - TEF             - Codigo = 9</option>
						<option value="12">American Express				    - TEF             - Codigo = 12</option>
						<option value="13">HiperCard					    - TEF             - Codigo = 13</option>
						<option value="14">Sorocred						    - TEF             - Codigo = 14</option>
						<option value="15">JCB						        - TEF 	          - Codigo = 15</option>	
					</optgroup>
				</select>
				<span>Utilizando somente estas formas de pagamento para o exemplo, não testei com todas.</span>
			</p>
			<p>
				<label for="parcelas">Parcelas</label>
				<input type="text" name="parcelas" id="parcelas" value="1">
			</p>
			<p>
				<label for="valor">Valor</label>
				<input type="text" name="valor" id="valor" value="1000">
				<span>Informar somente números. R$ 10,00 = 1000</span>
			</p>
			<p>
				<label for="valorDesconto">Valor Desconto</label>
				<input type="text" name="valorDesconto" id="valorDesconto" value="0">
				<span>Informar somente números. R$ 10,00 = 1000</span>
			</p>
			<p>
				<label for="taxaEmbarque">Taxa de Embarque</label>
				<input type="text" name="taxaEmbarque" id="taxaEmbarque" value="0">
				<span>Informar somente números. R$ 10,00 = 1000</span>
			</p>
		</fieldset>

		<fieldset>
			<legend>Informações do Comprador</legend>
			<p>
				<label for="codigoCliente">Código do Cliente</label>
				<input type="text" name="codigoCliente" id="codigoCliente" value="1">
			</p>
			<p>
				<label for="tipoCliente">Tipo de Cliente</label>
				<select name="tipoCliente" id="tipoCliente">
					<option value="1">Pessoa Física     - Código: 1</option>
					<option value="2">Pessoa Jurídica   - Código: 2</option>
				</select>
			</p>
			<p>
				<label for="nomeComprador">Nome Completo</label>
				<input type="text" name="nomeComprador" id="nomeComprador" value="João da Silva">
			</p>
			<p>
				<label for="documentoComprador">CPF</label>
				<input type="text" name="documentoComprador" id="documentoComprador" value="58854687294">
				<span>Informar somente números.</span>
			</p>
			<p>
				<label for="documentoComprador2">RG</label>
				<input type="text" name="documentoComprador2" id="documentoComprador2" value="58854687294">
				<span>Informar somente números.</span>
			</p>
			<p>
				<label for="sexoComprador">Sexo</label>
				<select name="sexoComprador" id="sexoComprador">
					<option value="M">Masculino</option>
					<option value="F">Feminino</option>
				</select>
			</p>
			<p>
				<label for="dataNascimentoComprador">Data de Nascimento</label>
				<input type="text" name="dataNascimentoComprador" id="dataNascimentoComprador" value="24/11/1986">
				<span>Informar DD/MM/YYYY.</span>
			</p>
		</fieldset>

		<fieldset>
			<legend>Informações de Contato do Comprador</legend>
			<p>
				<label for="telefoneComprador">DDI + DDD + Telefone</label>
				<input type="text" name="ddiComprador" id="ddiComprador" value="55" size="2">
				<input type="text" name="dddComprador" id="dddComprador" size="2" value="47">
				<input type="text" name="telefoneComprador" id="telefoneComprador" value="12345678">
			</p>
			<p>
				<label for="codigoTipoTelefoneComprador">Código do Tipo de Telefone</label>
				<select name="codigoTipoTelefoneComprador" id="codigoTipoTelefoneComprador">
					<option value="1">Outros       - Código: 1</option>
					<option value="2">Residencial  - Código: 2</option>
					<option value="3">Comercial    - Código: 3</option>
					<option value="4">Recados      - Código: 4</option>
					<option value="5">Cobrança     - Código: 5</option>
					<option value="6">Temporário   - Código: 6</option>
				</select>
			</p>
			<p>
				<label for="telefoneAdicionalComprador">DDI + DDD + Telefone Adicional</label>
				<input type="text" name="ddiAdicionalComprador" id="ddiAdicionalComprador" value="55" size="2">
				<input type="text" name="dddAdicionalComprador" id="dddAdicionalComprador" size="2">
				<input type="text" name="telefoneAdicionalComprador" id="telefoneAdicionalComprador">
			</p>
			<p>
				<label for="codigoTipoTelefoneAdicionalComprador">Código do Tipo de Telefone Adicional</label>
				<select name="codigoTipoTelefoneAdicionalComprador" id="codigoTipoTelefoneAdicionalComprador">
					<option value="1">Outros       - Código: 1</option>
					<option value="2">Residencial  - Código: 2</option>
					<option value="3">Comercial    - Código: 3</option>
					<option value="4">Recados      - Código: 4</option>
					<option value="5">Cobrança     - Código: 5</option>
					<option value="6">Temporário   - Código: 6</option>
				</select>
			</p>
			<p>
				<label for="emailComprador">E-mail</label>
				<input type="text" name="emailComprador" id="emailComprador" value="danielsalvagni@gmail.com">
			</p>
		</fieldset>

		<fieldset>
			<legend>Endereço de Cobrança do Comprador</legend>
			<p>
				<label for="enderecoComprador">Endereço</label>
				<input type="text" name="enderecoComprador" id="enderecoComprador" value="Rua Um dois três">
			</p>
			<p>
				<label for="numeroEnderecoComprador">Número</label>
				<input type="text" name="numeroEnderecoComprador" id="numeroEnderecoComprador" value="123">
			</p>
			<p>
				<label for="bairroEnderecoComprador">Bairro</label>
				<input type="text" name="bairroEnderecoComprador" id="bairroEnderecoComprador" value="Centro">
			</p>
			<p>
				<label for="complementoEnderecoComprador">Complemento</label>
				<input type="text" name="complementoEnderecoComprador" id="complementoEnderecoComprador">
			</p>
			<p>
				<label for="cidadeEnderecoComprador">Cidade</label>
				<input type="text" name="cidadeEnderecoComprador" id="cidadeEnderecoComprador" value="Blumenau">
			</p>
			<p>
				<label for="estadoEnderecoComprador">Estado</label>
				<input type="text" name="estadoEnderecoComprador" id="estadoEnderecoComprador" value="SC">
			</p>
			<p>
				<label for="cepEnderecoComprador">CEP</label>
				<input type="text" name="cepEnderecoComprador" id="cepEnderecoComprador" value="99999999">
				<span>Informar somente números.</span>
			</p>
		</fieldset>

		<fieldset>
			<legend>Dados de Entrega do Comprador</legend>
			<p>
				<label for="telefoneEntrega">DDI + DDD + Telefone</label>
				<input type="text" name="ddiEntrega" id="ddiEntrega" value="55" size="2">
				<input type="text" name="dddEntrega" id="dddEntrega" size="2">
				<input type="text" name="telefoneEntrega" id="telefoneEntrega">
			</p>
			<p>
				<label for="codigoTipoTelefoneEntrega">Código do Tipo de Telefone de Entrega</label>
				<select name="codigoTipoTelefoneEntrega" id="codigoTipoTelefoneEntrega">
					<option value="1">Outros       - Código: 1</option>
					<option value="2">Residencial  - Código: 2</option>
					<option value="3">Comercial    - Código: 3</option>
					<option value="4">Recados      - Código: 4</option>
					<option value="5">Cobrança     - Código: 5</option>
					<option value="6">Temporário   - Código: 6</option>
				</select>
			</p>
			<p>
				<label for="telefoneAdicionalEntrega">DDI + DDD + Telefone Adicional</label>
				<input type="text" name="ddiAdicionalEntrega" id="ddiAdicionalEntrega" value="55" size="2">
				<input type="text" name="dddAdicionalEntrega" id="dddAdicionalEntrega" size="2">
				<input type="text" name="telefoneAdicionalEntrega" id="telefoneAdicionalEntrega">
			</p>
			<p>
				<label for="codigoTipoTelefoneAdicionalEntrega">Código do Tipo de Telefone Adicional de Entrega</label>
				<select name="codigoTipoTelefoneAdicionalEntrega" id="codigoTipoTelefoneAdicionalEntrega">
					<option value="1">Outros       - Código: 1</option>
					<option value="2">Residencial  - Código: 2</option>
					<option value="3">Comercial    - Código: 3</option>
					<option value="4">Recados      - Código: 4</option>
					<option value="5">Cobrança     - Código: 5</option>
					<option value="6">Temporário   - Código: 6</option>
				</select>
			</p>
			<p>
				<label for="enderecoEntrega">Endereço</label>
				<input type="text" name="enderecoEntrega" id="enderecoEntrega" value="Rua Quatro Cinco Seis">
			</p>
			<p>
				<label for="numeroEnderecoEntrega">Número</label>
				<input type="text" name="numeroEnderecoEntrega" id="numeroEnderecoEntrega" value="456">
			</p>
			<p>
				<label for="bairroEnderecoEntrega">Bairro</label>
				<input type="text" name="bairroEnderecoEntrega" id="bairroEnderecoEntrega" value="Centro">
			</p>
			<p>
				<label for="complementoEnderecoEntrega">Complemento</label>
				<input type="text" name="complementoEnderecoEntrega" id="complementoEnderecoEntrega">
			</p>
			<p>
				<label for="cidadeEnderecoEntrega">Cidade</label>
				<input type="text" name="cidadeEnderecoEntrega" id="cidadeEnderecoEntrega" value="Blumenau">
			</p>
			<p>
				<label for="estadoEnderecoEntrega">Estado</label>
				<input type="text" name="estadoEnderecoEntrega" id="estadoEnderecoEntrega" value="SC">
			</p>
			<p>
				<label for="cepEnderecoEntrega">CEP</label>
				<input type="text" name="cepEnderecoEntrega" id="cepEnderecoEntrega" value="99999999">
				<span>Informar somente números.</span>
			</p>
		</fieldset>
		<fieldset>
			<legend>Gerar a Transação</legend>		
			<p>
				<input type="submit" value="Enviar" name="Enviar">
			</p>
		</fieldset>
	</form>
</body>
</html>