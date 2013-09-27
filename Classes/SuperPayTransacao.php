<?php
/**
 * Objeto da Transação
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayTransacao {
    
    /**
     * Atributos para o fluxo de informação
     */
    private $UrlRedirecionamentoNaoPago;
    private $UrlRedirecionamentoPago;
    
    /**
     * Informações da Transação
     */
    private $TransacaoID;
    private $TransacaoIdioma;
    private $TransacaoOrigem;
    private $TransacaoIP;

    /**
     * Atributos que serão enviados ao WebService.
     */
    private $DadosBoleto;
    private $DadosCartao;
    private $DadosComprador;
    private $DadosEntrega;
    private $DadosPedido;

    function __construct(
            SuperPayPedido $DadosPedido,
            SuperPayComprador $DadosComprador,
            SuperPayEntrega $DadosEntrega,
            SuperPayBoleto  $DadosBoleto,
            SuperPayCartao  $DadosCartao)
    {
        $this->DadosBoleto    = $DadosBoleto;
        $this->DadosCartao    = $DadosCartao;
        $this->DadosComprador = $DadosComprador;
        $this->DadosEntrega   = $DadosEntrega;
        $this->DadosPedido    = $DadosPedido;

        $this->TransacaoIP    = $this->getIp();
    }

    

    /**
     * Atributos para o fluxo de informação
     */
    function setUrlRedirecionamentoNaoPago($valor) { $this->UrlRedirecionamentoNaoPago = $valor; return $this; }
    function getUrlRedirecionamentoNaoPago() { return $this->UrlRedirecionamentoNaoPago; }
    
    function setUrlRedirecionamentoPago($valor) { $this->UrlRedirecionamentoPago = $valor; return $this; }
    function getUrlRedirecionamentoPago() { return $this->UrlRedirecionamentoPago; }

    /**
     * Informações da Transação
     */
    function setTransacaoID($valor) { $this->TransacaoID = $valor; return $this; }
    function getTransacaoID() { return $this->TransacaoID; }
    
    function setTransacaoIdioma($valor) { $this->TransacaoIdioma = $valor; return $this; }
    function getTransacaoIdioma() { return $this->TransacaoIdioma; }
    
    function setTransacaoOrigem($valor) { $this->TransacaoOrigem = $valor; return $this; }
    function getTransacaoOrigem() { return $this->TransacaoOrigem; }
    
    function setTransacaoIP($valor) { $this->TransacaoIP = $valor; return $this; }
    function getTransacaoIP() { return $this->TransacaoIP; }

    /**
     * Retorna o IP do cliente
     * @return string
     */
    function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            /**
             * Caso seja compartilhado
             */
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {   
            /**
             * Caso seja por Proxy
             */
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            return $_SERVER['REMOTE_ADDR'];
        }
    }


    function getDadosBoleto() { return $this->DadosBoleto; }
    function getDadosPedido() { return $this->DadosPedido; }
    function getDadosCartao() { return $this->DadosCartao; }
    function getDadosComprador() { return $this->DadosComprador; }
    function getDadosEntrega() { return $this->DadosEntrega; }

    
}

?>
