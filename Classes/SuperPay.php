<?php
/**
 * Realiza a comunicação com o Gateway SuperPay
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPay extends SuperPayWebService {
    
    private $URLWebService             = "http://homologacao2.superpay.com.br/checkout/servicosPagamentoCompletoWS.Services?wsdl";
    private $CodigoEstabelecimento     = "1306335906641";
    private $UrlCampainha              = "http://localhost/IntegracaoSuperPay/Exemplos/UrlCampainha.php";
    private $UsuarioSuperPay           = "TESTE";
    private $SenhaSuperPay             = "TESTE";
    
    /**
     * GETTERS AND SETTERS
     */
    public function getCodigoEstabelecimento() { return $this->CodigoEstabelecimento; }
    public function setCodigoEstabelecimento($valor) {  $this->CodigoEstabelecimento = $valor; return $this;   }
    
    public function getUrlWebService() { return $this->URLWebService; }
    public function setUrlWebService($valor) {  $this->URLWebService = $valor; return $this;  }

    public function getUrlCampainha() { return $this->UrlCampainha; }
    public function setUrlCampainha($valor) {  $this->UrlCampainha = $valor; return $this;  }
    
    public function getUsuario() { return $this->UsuarioSuperPay; }   
    public function setUsuario($valor) {  $this->UsuarioSuperPay = $valor; return $this; }

    public function getSenha() { return $this->SenhaSuperPay; }
    public function setSenha($valor) {  $this->SenhaSuperPay = $valor; return $this;   }

    /**
     * METHODS
     */
    /**
     * Cria uma transação com o Gateway
     * @param  SuperPayTransacao $Transacao Objeto da Transação
     * @return array                        Retorno do Gateway
     */
    function realizarPagamento(SuperPayTransacao $Transacao){ 
    
        $DadosPedido    = $Transacao->getDadosPedido();
        $DadosBoleto    = $Transacao->getDadosBoleto();
        $DadosCartao    = $Transacao->getDadosCartao();
        $DadosComprador = $Transacao->getDadosComprador();
        $DadosEntrega   = $Transacao->getDadosEntrega();

        $Parametros     = array(
                            'transacao' => array(
                                    'codigoEstabelecimento'              => $this->getCodigoEstabelecimento(),
                                    
                                    'numeroTransacao'                    => $Transacao->getTransacaoID(),
                                    'origemTransacao'                    => $Transacao->getTransacaoOrigem(),
                                    'idioma'                             => $Transacao->getTransacaoIdioma(),
                                    'IP'                                 => $Transacao->getTransacaoIP(),

                                    'codigoFormaPagamento'               => $DadosPedido->getCodigoFormaPagamento(),
                                    'valor'                              => $DadosPedido->getValor(),
                                    'valorDesconto'                      => $DadosPedido->getValorDesconto(),
                                    'taxaEmbarque'                       => $DadosPedido->getTaxaEmbarque(),
                                    'parcelas'                           => $DadosPedido->getParcelas(),

                                    'itensDoPedido'                      => array(
                                                                                array(
                                                                                    'codigoProduto'        => '1',
                                                                                    'codigoCategoria'      => ' - ',
                                                                                    'nomeProduto'          => ' - ',
                                                                                    'quantidadeProduto'    => 1,
                                                                                    'valorUnitarioProduto' => $DadosPedido->getValor(),
                                                                                    'nomeCategoria'        => ' - ',
                                                                                )
                                        ),

                                    'vencimentoBoleto'                   => $DadosBoleto->getVencimento(),
                                    'campoLivre1'                        => $DadosBoleto->getCampoLivre1(),
                                    'campoLivre2'                        => $DadosBoleto->getCampoLivre2(),
                                    'campoLivre3'                        => $DadosBoleto->getCampoLivre3(),
                                    'campoLivre4'                        => $DadosBoleto->getCampoLivre4(),
                                    'campoLivre5'                        => $DadosBoleto->getCampoLivre5(),

                                    'nomeTitularCartaoCredito'           => $DadosCartao->getNomeTitular(),
                                    'numeroCartaoCredito'                => $DadosCartao->getNumero(),
                                    'dataValidadeCartao'                 => $DadosCartao->getDataValidade(),
                                    'codigoSeguranca'                    => $DadosCartao->getCodigoSeguranca(),

                                    'dadosUsuarioTransacao'              => array(
                                                                                    'codigoCliente'                         => $DadosComprador->getCodigo(),
                                                                                    'tipoCliente'                           => $DadosComprador->getTipo(),
                                                                                    'nomeComprador'                         => $DadosComprador->getNome(),
                                                                                    'documentoComprador'                    => $DadosComprador->getDocumento(),
                                                                                    'documentoComprador2'                   => $DadosComprador->getDocumento2(),
                                                                                    'sexoComprador'                         => $DadosComprador->getSexo(),
                                                                                    'dataNascimentoComprador'               => $DadosComprador->getDataNascimento(),

                                                                                    'telefoneComprador'                     => $DadosComprador->getTelefone(),
                                                                                    'dddComprador'                          => $DadosComprador->getDDD(),
                                                                                    'ddiComprador'                          => $DadosComprador->getDDI(),
                                                                                    'codigoTipoTelefoneComprador'           => $DadosComprador->getCodigoTipoTelefone(),
                                                                                    'telefoneAdicionalComprador'            => $DadosComprador->getTelefoneAdicional(),
                                                                                    'dddAdicionalComprador'                 => $DadosComprador->getDDDAdicional(),
                                                                                    'ddiAdicionalComprador'                 => $DadosComprador->getDDIAdicional(),
                                                                                    'emailComprador'                        => $DadosComprador->getEmail(),
                                                                                    'enderecoComprador'                     => $DadosComprador->getEndereco(),
                                                                                    'numeroEnderecoComprador'               => $DadosComprador->getEnderecoNumero(),
                                                                                    'bairroEnderecoComprador'               => $DadosComprador->getEnderecoBairro(),
                                                                                    'complementoEnderecoComprador'          => $DadosComprador->getEnderecoComplemento(),
                                                                                    'cidadeEnderecoComprador'               => $DadosComprador->getEnderecoCidade(),
                                                                                    'estadoEnderecoComprador'               => $DadosComprador->getEnderecoEstado(),
                                                                                    'cepEnderecoComprador'                  => $DadosComprador->getEnderecoCEP(),

                                                                                    'telefoneEntrega'                       => $DadosEntrega->getTelefone(),
                                                                                    'dddEntrega'                            => $DadosEntrega->getDDD(),
                                                                                    'ddiEntrega'                            => $DadosEntrega->getDDI(),
                                                                                    'codigoTipoTelefoneEntrega'             => $DadosEntrega->getCodigoTipoTelefone(),
                                                                                    'telefoneAdicionalEntrega'              => $DadosEntrega->getTelefoneAdicional(),
                                                                                    'dddAdicionalEntrega'                   => $DadosEntrega->getDDDAdicional(),
                                                                                    'ddiAdicionalEntrega'                   => $DadosEntrega->getDDIAdicional(),
                                                                                    'codigoTipoTelefoneAdicionalEntrega'    => $DadosEntrega->getCodigoTipoTelefoneAdicional(),
                                                                                    'enderecoEntrega'                       => $DadosEntrega->getEndereco(),
                                                                                    'numeroEnderecoEntrega'                 => $DadosEntrega->getEnderecoNumero(),
                                                                                    'bairroEnderecoEntrega'                 => $DadosEntrega->getEnderecoBairro(),
                                                                                    'complementoEnderecoEntrega'            => $DadosEntrega->getEnderecoComplemento(),
                                                                                    'cidadeEnderecoEntrega'                 => $DadosEntrega->getEnderecoCidade(),
                                                                                    'estadoEnderecoEntrega'                 => $DadosEntrega->getEnderecoEstado(),
                                                                                    'cepEnderecoEntrega'                    => $DadosEntrega->getEnderecoCEP(),

                                                                                ),
                                        ),
                            'usuario'   => $this->getUsuario(), 
                            'senha'     => $this->getSenha()
                            );

        $Funcao = 'pagamentoTransacaoCompleta';
        
        return $this->call($Parametros, $Funcao, $this->getUrlWebService());
    }


    /**
     * Consulta o status de uma transação com o Gateway
     * @param  string $NumeroTransacao ID da Transação
     * @return array                   Retorno do Gateway
     */
    function consultarTransacao($NumeroTransacao){ 
    
        $Parametros = array('consultaTransacaoWS'=>array(
                'codigoEstabelecimento' => $this->getCodigoEstabelecimento(),
                'numeroTransacao'       => $NumeroTransacao
            ));

        $Funcao = 'consultaTransacaoEspecifica';
        
        return $this->call($Parametros, $Funcao, $this->getUrlWebService());
    }
}

?>
