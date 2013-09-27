<?php

/**
 * Objeto do Pedido
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayPedido {
    
    /**
     * Informações do Pedido
     */    
    /**********************************************************************
     *        Codigo da forma de pagamento conforme tabela abaixo
     ******************   CARTOES DE CREDITO / DEBITO   ******************* 
     * Visa Moset3                      - Cielo           - Codigo = 60
     * MasterCard Moset3                - Cielo           - Codigo = 61
     * Elo Moset3                       - Cielo           - Codigo = 63
     * Visa VBV2                        - Cielo           - Codigo = 70
     * MasterCard VBV2                  - Cielo           - Codigo = 71
     * Elo VBV2                         - Cielo           - Codigo = 73
     * Visa Electron Bradesco VBV2      - Cielo           - Codigo = 40
     * Visa Komerci Integrado           - Redecard        - Codigo = 80
     * MasterCard Komerci Integrado     - Redecard        - Codigo = 81
     * Diners Komerci Integrado         - Redecard        - Codigo = 82
     * Visa Komerci Webservices         - Redecard        - Codigo = 90
     * MasterCard Komerci Webservices   - Redecard        - Codigo = 91
     * Diners Komerci Webservices       - Redecard        - Codigo = 92
     * American Express 3Party          - Amex            - Codigo = 10
     * American Express 3Party          - Amex            - Codigo = 11
     * Visa                             - TEF             - Codigo = 3
     * MasterCard                       - TEF             - Codigo = 6
     * Diners                           - TEF             - Codigo = 9
     * American Express                 - TEF             - Codigo = 12
     * HiperCard                        - TEF             - Codigo = 13
     * Sorocred                         - TEF             - Codigo = 14
     * JCB                              - TEF             - Codigo = 15
     ******************         BANCOS E BOLETOS         ******************* 
     * Itau Shopline Transferencia      - Itau            - Codigo = 16
     * Itau Shopline Boleto             - Itau            - Codigo = 17
     * Bradesco Shopfacil Transferencia - Bradesco        - Codigo = 18
     * Bradesco Shopfacil Boleto        - Bradesco        - Codigo = 19
     * RealPague Transferencia          - Real            - Codigo = 20
     * BBOnline Transferencia           - Banco do Brasil - Codigo = 21
     * HSBC Transferencia               - HSBC            - Codigo = 22
     * HSBC Boleto Online               - HSBC            - Codigo = 100
     * Banricompras.com Tranferencia    - Banrisul        - Codigo = 23
     * Banricompras.com Parcelamento    - Banrisul        - Codigo = 24
     * Banricompras.com Pré Datado      - Banrisul        - Codigo = 25
     * Banricompras.com Boleto          - Banrisul        - Codigo = 26
     * OiPaggo                          - OiPaggo         - Codigo = 27
     * Banco do Brasil Boleto Offline   - Banco do Brasil - Codigo = 28
     * Itau Boleto Offline              - Itau            - Codigo = 29
     * Bradesco Boleto Offline          - Bradesco        - Codigo = 30
     * Unibanco Boleto Offline          - Unibanco        - Codigo = 31
     * HSBC Boleto Offline              - HSBC            - Codigo = 32
     * Real Boleto Offline              - Real            - Codigo = 33
     * CEF Boleto Offline               - CEF             - Codigo = 34
     ******************    INTERMEDIARIOS FINANCEIROS      ******************* 
     * MOIP                             - MOIP            - Codigo = 35
     * Mercado Pago                     - CEF             - Codigo = 36
     * Pagamento Digital                - PD              - Codigo = 37
     * DinheiroMail                     - DinheiroMail    - Codigo = 38
     * PagSeguro                        - PagSeguro       - Codigo = 39
     */
    private $CodigoFormaPagamento;
    private $Parcelas;
    private $Valor;
    private $ValorDesconto;
    private $TaxaEmbarque;
    
    
    function __construct(
                $CodigoFormaPagamento = "",
                $Parcelas = "",
                $Valor = "",
                $ValorDesconto = "",
                $TaxaEmbarque = ""
            )
    {
        $this->CodigoFormaPagamento = $CodigoFormaPagamento;
        $this->Parcelas             = $Parcelas;
        $this->Valor                = $Valor;
        $this->ValorDesconto        = $ValorDesconto;
        $this->TaxaEmbarque         = $TaxaEmbarque;
    }
    
    /**
     * Informações do Pedido
     */    
    function setCodigoFormaPagamento($valor) { $this->CodigoFormaPagamento = $valor; return $this; }
    function getCodigoFormaPagamento() { return $this->CodigoFormaPagamento; }
    
    function setParcelas($valor) { $this->Parcelas = $valor; return $this; }
    function getParcelas() { return $this->Parcelas; }
    
    function setValor($valor) { $this->Valor = $valor; return $this; }
    function getValor() { return number_format($this->Valor, 0, '',''); }
    
    function setValorDesconto($valor) { $this->ValorDesconto = $valor; return $this; }
    function getValorDesconto() { return number_format($this->ValorDesconto, 0, '',''); }
    
    function setTaxaEmbarque($valor) { $this->TaxaEmbarque = $valor; return $this; }
    function getTaxaEmbarque() { return number_format($this->TaxaEmbarque, 0, '',''); }
    
}

?>
