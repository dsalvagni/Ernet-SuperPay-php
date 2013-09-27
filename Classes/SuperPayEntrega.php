<?php

/**
 * Objeto do Endereço de Entrega
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayEntrega {
       
    /**
     * Informações de Entrega
     */
    private $Telefone;
    private $DDD;
    private $DDI = 55;
    private $CodigoTipoTelefone;
    private $TelefoneAdicional;
    private $DDDAdicional;
    private $DDIAdicional;
    private $CodigoTipoTelefoneAdicional;
    private $Endereco;
    private $EnderecoNumero;
    private $EnderecoComplemento;
    private $EnderecoCidade;
    private $EnderecoEstado;
    private $EnderecoBairro;
    private $EnderecoCEP;
    
    
    function __construct(
                $Telefone                    = "",
                $DDD                         = "",
                $DDI                         = "",
                $CodigoTipoTelefone          = "",
                $TelefoneAdicional           = "",
                $DDDAdicional                = "",
                $DDIAdicional                = "",
                $CodigoTipoTelefoneAdicional = "",
                $Endereco                    = "",
                $EnderecoNumero              = "",
                $EnderecoComplemento         = "",
                $EnderecoCidade              = "",
                $EnderecoEstado              = "",
                $EnderecoBairro              = "",
                $EnderecoCEP                 = ""
            )
    {
        $this->Telefone                    = $Telefone;
        $this->DDD                         = $DDD;
        $this->DDI                         = $DDI;
        $this->CodigoTipoTelefone          = $CodigoTipoTelefone;
        $this->TelefoneAdicional           = $TelefoneAdicional;
        $this->DDDAdicional                = $DDDAdicional;
        $this->DDIAdicional                = $DDIAdicional;
        $this->CodigoTipoTelefoneAdicional = $CodigoTipoTelefoneAdicional;
        $this->Endereco                    = $Endereco;
        $this->EnderecoNumero              = $EnderecoNumero;
        $this->EnderecoComplemento         = $EnderecoComplemento;
        $this->EnderecoCidade              = $EnderecoCidade;
        $this->EnderecoEstado              = $EnderecoEstado;
        $this->EnderecoBairro              = $EnderecoBairro;
        $this->EnderecoCEP                 = $EnderecoCEP;
    }
    
    /**
     * Informações de Entrega
     */
    
    function setTelefone($valor) { $this->Telefone = $valor; return $this; }
    function getTelefone() { return $this->Telefone; }
    
    function setDDD($valor) { $this->DDD = $valor; return $this; }
    function getDDD() { return $this->DDD; }
    
    function setDDI($valor) { $this->DDI = $valor; return $this; }
    function getDDI() { return $this->DDI; }
    
    function setCodigoTipoTelefone($valor) { $this->CodigoTipoTelefone = $valor; return $this; }
    function getCodigoTipoTelefone() { return $this->CodigoTipoTelefone; }
    
    function setTelefoneAdicional($valor) { $this->TelefoneAdicional = $valor; return $this; }
    function getTelefoneAdicional() { return $this->TelefoneAdicional; }
    
    function setDDDAdicional($valor) { $this->DDDAdicional = $valor; return $this; }
    function getDDDAdicional() { return $this->DDDAdicional; }
    
    function setDDIAdicional($valor) { $this->DDIAdicional = $valor; return $this; }
    function getDDIAdicional() { return $this->DDIAdicional; }
    
    function setCodigoTipoTelefoneAdicional($valor) { $this->CodigoTipoTelefoneAdicional = $valor; return $this; }
    function getCodigoTipoTelefoneAdicional() { return $this->CodigoTipoTelefoneAdicional; }
    
    function setEndereco($valor) { $this->Endereco = $valor; return $this; }
    function getEndereco() { return $this->Endereco; }
    
    function setEnderecoNumero($valor) { $this->EnderecoNumero = $valor; return $this; }
    function getEnderecoNumero() { return $this->EnderecoNumero; }
    
    function setEnderecoComplemento($valor) { $this->EnderecoComplemento = $valor; return $this; }
    function getEnderecoComplemento() { return $this->EnderecoComplemento; }
    
    function setEnderecoCidade($valor) { $this->EnderecoCidade = $valor; return $this; }
    function getEnderecoCidade() { return $this->EnderecoCidade; }
    
    function setEnderecoEstado($valor) { $this->EnderecoEstado = $valor; return $this; }
    function getEnderecoEstado() { return $this->EnderecoEstado; }

    function setEnderecoBairro($valor) { $this->EnderecoBairro = $valor; return $this; }
    function getEnderecoBairro() { return $this->EnderecoBairro; }
    
    function setEnderecoCEP($valor) { $this->EnderecoCEP = $valor; return $this; }
    function getEnderecoCEP() { return $this->EnderecoCEP; }
    
}

?>
