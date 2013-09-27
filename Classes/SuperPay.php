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
        

        /**
         * Retorno do Gateway
         * =========================================================================
         * Status da Transação              : ["return"]['statusTransacao']
         *                                    Status da Transação, representado por
         *                                    um valor numérico. Verificar tabela na
         *                                    Numérico Até 2 dígitos
         * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         * Cód  |  Nome                     |  Descrição                             | Tipo de Status
         *  1     Autorizado e Confirmado      Representa que a transação está paga.   Final
         *  
         *  2     Autorizado                   Representa que a transação ainda será   Transitório
         *                                     confirmada na operadora.
         *
         *  3     Não Autorizado               Representa que a transação foi negada   Final
         *                                     pela operadora. 
         *
         *  5     Transação em Andamento       Representa que a transação está em      Transitório
         *                                     andamento.
         *
         *  6     Boleto em Compensação        Representa que a transação ainda não    Transitório
         *                                     está paga, boleto está em processo de
         *                                     compensação / baixa
         *
         *  8     Aguardando Pagamento         Representa  que  a  transação  está     Transitório
         *                                     no SuperPay, aguardando o pagamento 
         *                                     ou pedidos em processo 
         *                                     de retentativa.
         *
         *  9     Falha na Operadora           Representa  que  a  transação  não      Final
         *                                     foi autorizada pela operadora e 
         *                                     que houve um problema em 
         *                                     seu processamento   
         *  
         *  15    Em Análise de Risco          Representa que a transação foi enviada  Transitório
         *                                     para  o  sistema  de  análise  
         *                                     de  riscos  / fraudes  e  que  o  
         *                                     SuperPay  ainda  não obteve  a  
         *                                     resposta de  aprovação  ou negação.
         *
         *  17    Recusado Análise de Risco    Representa que a transação foi  negada  Final
         *                                     pelo sistema análise de Risco / Fraude 
         *
         *  18    Falha no envio para          Representa  que  por  alguma  falha o   Transitório
         *        Análise de Risco             pedido não conseguiu ser enviado 
         *                                     para o sistema de Risco / Fraude, 
         *                                     porém será reenviada.
         *        
         *  21    Boleto Pago a menor          Representa que o boleto está pago com   Final
         *                                     valor divergente do emitido 
         *
         *  22    Boleto Pago a maior          Representa que o boleto está pago com   Final
         *                                     o valor divergente do emitido 
         *
         *  30    Operação em andamento        Transação em curso de pagamento         Transitório
         *
         *  31    Transação já efetuada        Transação já efetuada e efetivada com   Final
         *                                     status final.
         * =========================================================================
         * Código da Forma de Pagamento     : ["return"]['codigoFormaPagamento']
         *                                    Código da forma de pagamento 
         *                                    (enviado pelo estabelecimento na chamada).
         *                                    Alfa Numérico 100 caracteres
         *                                    
         * Número da Transação              : ["return"]['numeroTransacao']
         *                                    Número da Transação 
         *                                    (enviado pelo estabelecimento na 
         *                                    chamada do WebService) 
         *                                    Numérico 8 Caracteres
         * 
         * Valor                            : ["return"]['valor']
         *                                    Valor da transação. Será retornado
         *                                    segundo o seguinte formato: para
         *                                    transação de R$ 1,00, será enviado 100.
         *                                    Numérico Até 8 dígitos
         *                                    
         * Valor de Desconto                : ["return"]['valorDesconto']
         *                                    Valor do desconto da transação. Será
         *                                    retornado segundo o seguinte formato:
         *                                    para transação de R$ 1,00, será enviado
         *                                    100.
         *                                    Numérico até 8 dígitos
         *                                    
         * Taxa de Embarque                 : ["return"]['taxaEmbarque']
         *                                    Valor da taxa de serviço/embarque da
         *                                    transação. Será retornado
         *                                    segundo o seguinte formato: para
         *                                    transação de R$ 1,00, será enviado 100.
         *                                    Numérico Até 8 dígitos
         *                                    
         * Parcelas                         : ["return"]['parcelas']
         *                                    Quantidade de parcelas da
         *                                    transação
         *                                    Numérico  Até 2 dígitos       
         *                                                                        
         * URL de Pagamento                 : ["return"]['urlPagamento']    
         *                                    URL para redirecionamento do
         *                                    cliente em caso de transações
         *                                    Redirects. Para transações não Redirects
         *                                    essa url será retornada em branco.
         *                                    Alfa Numérico até 500 caracteres                                    
         *                                    
         * Autorização                      : ["return"]['autorizacao']
         *                                    Código de autorização da 
         *                                    operadora/banco/intermediário financeiro
         *                                    Numérico
         *                                    Autorização é sempre numérica e até 20 dígitos
         *                                    
         * Código de Transação da Operadora : ["return"]['codigoTransacaoOperadora']
         *                                    Código da transação junto a 
         *                                    operadora/banco/intermediário financeiro
         *                                    Numérico  Até 20 dígitos
         *                                    
         * Data de Aprovação da Operadora   : ["return"]['dataAprovacaoOperadora']
         *                                    Data de aprovação na operadora  
         *                                    Alfa Numérico até 10 caracteres
         *                                    
         * Número Comprovante de Venda      : ["return"]['numeroComprovanteVenda']
         *                                    Número do comprovante de venda  
         *                                    Alfa Numérico até 20 caracteres
         */
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
        
        /**
         * Retorno do Gateway
         * =========================================================================
         * Status da Transação              : ["return"]['statusTransacao']
         *                                    Status da Transação, representado por
         *                                    um valor numérico. Verificar tabela na
         *                                    Numérico Até 2 dígitos
         * ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
         * Cód  |  Nome                     |  Descrição                             | Tipo de Status
         *  1     Autorizado e Confirmado      Representa que a transação está paga.   Final
         *  
         *  2     Autorizado                   Representa que a transação ainda será   Transitório
         *                                     confirmada na operadora.
         *
         *  3     Não Autorizado               Representa que a transação foi negada   Final
         *                                     pela operadora. 
         *
         *  5     Transação em Andamento       Representa que a transação está em      Transitório
         *                                     andamento.
         *
         *  6     Boleto em Compensação        Representa que a transação ainda não    Transitório
         *                                     está paga, boleto está em processo de
         *                                     compensação / baixa
         *
         *  8     Aguardando Pagamento         Representa  que  a  transação  está     Transitório
         *                                     no SuperPay, aguardando o pagamento 
         *                                     ou pedidos em processo 
         *                                     de retentativa.
         *
         *  9     Falha na Operadora           Representa  que  a  transação  não      Final
         *                                     foi autorizada pela operadora e 
         *                                     que houve um problema em 
         *                                     seu processamento   
         *  
         *  15    Em Análise de Risco          Representa que a transação foi enviada  Transitório
         *                                     para  o  sistema  de  análise  
         *                                     de  riscos  / fraudes  e  que  o  
         *                                     SuperPay  ainda  não obteve  a  
         *                                     resposta de  aprovação  ou negação.
         *
         *  17    Recusado Análise de Risco    Representa que a transação foi  negada  Final
         *                                     pelo sistema análise de Risco / Fraude 
         *
         *  18    Falha no envio para          Representa  que  por  alguma  falha o   Transitório
         *        Análise de Risco             pedido não conseguiu ser enviado 
         *                                     para o sistema de Risco / Fraude, 
         *                                     porém será reenviada.
         *        
         *  21    Boleto Pago a menor          Representa que o boleto está pago com   Final
         *                                     valor divergente do emitido 
         *
         *  22    Boleto Pago a maior          Representa que o boleto está pago com   Final
         *                                     o valor divergente do emitido 
         *
         *  30    Operação em andamento        Transação em curso de pagamento         Transitório
         *
         *  31    Transação já efetuada        Transação já efetuada e efetivada com   Final
         *                                     status final.
         * =========================================================================
         * Código do Estabelecimento        : ["return"]['codigoEstabelecimento']
         *                                    Valor fornecido pela ERNET para identificar 
         *                                    o estabelecimento junto ao SuperPay
         *                                    Código fornecido pela ERNET
         *                                    
         * Código da Forma de Pagamento     : ["return"]['codigoFormaPagamento']
         *                                    Código da forma de pagamento 
         *                                    (enviado pelo estabelecimento na chamada).
         *                                    Alfa Numérico 100 caracteres
         *                                    
         * Número da Transação              : ["return"]['numeroTransacao']
         *                                    Número da Transação 
         *                                    (enviado pelo estabelecimento na 
         *                                    chamada do WebService) 
         *                                    Numérico 8 Caracteres
         * 
         * Valor                            : ["return"]['valor']
         *                                    Valor da transação. Será retornado
         *                                    segundo o seguinte formato: para
         *                                    transação de R$ 1,00, será enviado 100.
         *                                    Numérico Até 8 dígitos
         *                                    
         * Valor de Desconto                : ["return"]['valorDesconto']
         *                                    Valor do desconto da transação. Será
         *                                    retornado segundo o seguinte formato:
         *                                    para transação de R$ 1,00, será enviado
         *                                    100.
         *                                    Numérico até 8 dígitos
         *                                    
         * Taxa de Embarque                 : ["return"]['taxaEmbarque']
         *                                    Valor da taxa de serviço/embarque da
         *                                    transação. Será retornado
         *                                    segundo o seguinte formato: para
         *                                    transação de R$ 1,00, será enviado 100.
         *                                    Numérico Até 8 dígitos
         *                                    
         * Parcelas                         : ["return"]['parcelas']
         *                                    Quantidade de parcelas da
         *                                    transação
         *                                    Numérico  Até 2 dígitos       
         *                                                                        
         * URL de Pagamento                 : ["return"]['urlPagamento']    
         *                                    URL para redirecionamento do
         *                                    cliente em caso de transações
         *                                    Redirects. Para transações não Redirects
         *                                    essa url será retornada em branco.
         *                                    Alfa Numérico até 500 caracteres                                    
         *                                    
         * Autorização                      : ["return"]['autorizacao']
         *                                    Código de autorização da 
         *                                    operadora/banco/intermediário financeiro
         *                                    Numérico
         *                                    Autorização é sempre numérica e até 20 dígitos
         *                                    
         * Código de Transação da Operadora : ["return"]['codigoTransacaoOperadora']
         *                                    Código da transação junto a 
         *                                    operadora/banco/intermediário financeiro
         *                                    Numérico  Até 20 dígitos
         *                                    
         * Data de Aprovação da Operadora   : ["return"]['dataAprovacaoOperadora']
         *                                    Data de aprovação na operadora  
         *                                    Alfa Numérico até 10 caracteres
         *                                    
         * Número Comprovante de Venda      : ["return"]['numeroComprovanteVenda']
         *                                    Número do comprovante de venda  
         *                                    Alfa Numérico até 20 caracteres
         *                                    
         * Mensagem de Venda                : ["return"]['mensagemVenda']
         *                                    Mensagem de retorno da operadora
         *                                    (poderá ser apresentado para o cliente)
         *                                    Alfa Numérico até 50 caracteres
         */
        return $this->call($Parametros, $Funcao, $this->getUrlWebService());
    }
}

?>
