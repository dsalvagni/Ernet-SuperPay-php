<?php 

/**
* Gerencia as comunicações com o webservice do gateway
* @author Daniel Salvagni <daniel@we3online.com.br>
*/
class SuperPayWebService
{

	function call($Parametros, $Funcao, $WebServiceUrl, $Debug = false)
	{
		/**
		 * Tenta a conexão com o WebService
		 */
		try{	

			$NusoapClient = new nusoap_client($WebServiceUrl, 'wsdl');

			$Erro = $NusoapClient->getError();

			if($Erro){
				throw new Exception("Erro ao conectar",9999);
			}
			/**
			 * Tenta executar uma chamada no WebService
			 */
			try{
				$Retorno = $NusoapClient->call($Funcao,$Parametros);
				
				if($Debug)
					echo '<pre>' . htmlspecialchars($NusoapClient->response, ENT_QUOTES) . '</pre>';
				
				if ($NusoapClient->fault){
					$Retorno = isset($Retorno['faultstring']) ? utf8_encode($Retorno['faultstring']) : var_export($Retorno,true);
					throw new Exception("Ocorreu uma Falha = $Retorno",9999);
				}
				else
				{
					$Erro = $NusoapClient->getError();

					if($Erro){
						$Resposta = var_export($Erro,true);
						throw new Exception("Ocorreu um Erro = ($Resposta)",9999);
					} else
						$Resposta = $Retorno;
				}
			}
			/**
			 * Pega os erros de uma chamada ao WebService
			 */
			catch (Exception $e) {
				$Resposta = $e->GetCode() . " - " . $e->GetMessage();
			}

		}
		/**
		 * Pega os erros de conexão
		 */
		catch (Exception $e){
			$Resposta = $e->GetCode() . " - " . $e->GetMessage();
		}

		return $Resposta;
	}	
}
?>