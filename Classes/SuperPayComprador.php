<?php

/**
 * Objeto do Comprador
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayComprador {
       
    /**
     * Informações do Comprador
     */
    private $Codigo;
    private $Tipo;
    private $Nome;
    private $Documento;
    private $Documento2;
    private $Sexo;
    private $DataNascimento;
    private $Telefone;
    private $DDD;
    private $DDI = 55;
    private $CodigoTipoTelefone;
    private $TelefoneAdicional;
    private $DDDAdicional;
    private $DDIAdicional = 55;
    private $CodigoTipoTelefoneAdicional;
    private $Email;
    private $Endereco;
    private $EnderecoNumero;
    private $EnderecoBairro;
    private $EnderecoComplemento;
    private $EnderecoCidade;
    private $EnderecoEstado;
    private $EnderecoCEP;
    
    
    function __construct(
                $Codigo = "",
                $Tipo = "",
                $Nome = "",
                $Documento = "",
                $Documento2 = "",
                $Sexo = "",
                $DataNascimento = "",
                $Telefone = "",
                $DDD = "",
                $DDI = 55,
                $CodigoTipoTelefone = "",
                $TelefoneAdicional = "",
                $DDDAdicional = "",
                $DDIAdicional = 55,
                $CodigoTipoTelefoneAdicional = "",
                $Email = "",
                $Endereco = "",
                $EnderecoNumero = "",
                $EnderecoBairro = "",
                $EnderecoComplemento = "",
                $EnderecoCidade = "",
                $EnderecoEstado = "",
                $EnderecoCEP = ""
            )
    {
        $this->Codigo                      = $Codigo;
        $this->Tipo                        = $Tipo;
        $this->Nome                        = $Nome;
        $this->Documento                   = $Documento;
        $this->Documento2                  = $Documento2;
        $this->Sexo                        = $Sexo;
        $this->DataNascimento              = $DataNascimento;
        $this->Telefone                    = $Telefone;
        $this->DDD                         = $DDD;
        $this->DDI                         = $DDI;
        $this->CodigoTipoTelefone          = $CodigoTipoTelefone;
        $this->TelefoneAdicional           = $TelefoneAdicional;
        $this->DDDAdicional                = $DDDAdicional;
        $this->DDIAdicional                = $DDIAdicional;
        $this->CodigoTipoTelefoneAdicional = $CodigoTipoTelefoneAdicional;
        $this->Email                       = $Email;
        $this->Endereco                    = $Endereco;
        $this->EnderecoNumero              = $EnderecoNumero;
        $this->EnderecoBairro              = $EnderecoBairro;
        $this->EnderecoComplemento         = $EnderecoComplemento;
        $this->EnderecoCidade              = $EnderecoCidade;
        $this->EnderecoEstado              = $EnderecoEstado;
        $this->EnderecoCEP                 = $EnderecoCEP;
    }
    
    /**
     * Informações do Comprador
     */
    function setCodigo($valor) { $this->Codigo = $valor; return $this; }
    function getCodigo() { return $this->Codigo; }
    
    function setTipo($valor) { $this->Tipo = $valor; return $this; }
    function getTipo() { return $this->Tipo; }
    
    function setNome($valor) { $this->Nome = $valor; return $this; }
    function getNome() { return $this->Nome; }
    
    function setDocumento($valor) { $this->Documento = $valor; return $this; }
    function getDocumento() { return preg_replace("/[^0-9]/", "", $this->Documento); }

    
    function setDocumento2($valor) { $this->Documento2 = $valor; return $this; }
    function getDocumento2() { return preg_replace("/[^0-9]/", "", $this->Documento2); }
    
    function setSexo($valor) { $this->Sexo = $valor; return $this; }
    function getSexo() { return $this->Sexo; }
    
    function setDataNascimento($valor) { $this->DataNascimento = $valor; return $this; }
    function getDataNascimento() { return $this->DataNascimento; }
    
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
    
    function setEmail($valor) { $this->Email = $valor; return $this; }
    function getEmail() { return $this->Email; }
    
    function setEndereco($valor) { $this->Endereco = $valor; return $this; }
    function getEndereco() { return $this->Endereco; }
    
    function setEnderecoNumero($valor) { $this->EnderecoNumero = $valor; return $this; }
    function getEnderecoNumero() { return $this->EnderecoNumero; }
    
    function setEnderecoBairro($valor) { $this->EnderecoBairro = $valor; return $this; }
    function getEnderecoBairro() { return $this->EnderecoBairro; }
    
    function setEnderecoComplemento($valor) { $this->EnderecoComplemento = $valor; return $this; }
    function getEnderecoComplemento() { return $this->EnderecoComplemento; }
    
    function setEnderecoCidade($valor) { $this->EnderecoCidade = $valor; return $this; }
    function getEnderecoCidade() { return $this->EnderecoCidade; }
    
    function setEnderecoEstado($valor) { $this->EnderecoEstado = $valor; return $this; }
    function getEnderecoEstado() { return $this->EnderecoEstado; }
    
    function setEnderecoCEP($valor) { $this->EnderecoCEP = $valor; return $this; }
    function getEnderecoCEP() { return $this->EnderecoCEP; }
    
}

?>