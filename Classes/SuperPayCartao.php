<?php

/**
 * Objeto do Cartão
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayCartao {
       
    /**
     * Informações do Cartão de Crédito
     */
    private $NomeTitular;
    private $Numero;
    private $DataValidade;
    private $CodigoSeguranca;
    
    
    function __construct(
                $NomeTitular  = "",
                $Numero = "",
                $DataValidade = "",
                $CodigoSeguranca = ""
            )
    {
        $this->NomeTitular      = $NomeTitular;
        $this->Numero           = $Numero;
        $this->DataValidade     = $DataValidade;
        $this->CodigoSeguranca    = $CodigoSeguranca;
    }
    
    /**
     * Informações do Cartão de Crédito
     */
    function setNomeTitular($valor) { $this->NomeTitular = $valor; return $this; }
    function getNomeTitular() { return $this->NomeTitular; }
    
    function setNumero($valor) { $this->Numero = $valor; return $this; }
    function getNumero() { return $this->Numero; }
    
    function setDataValidade($valor) { $this->DataValidade = $valor; return $this; }
    function getDataValidade() { return $this->DataValidade; }
    
    function setCodigoSeguranca($valor) { $this->CodigoSeguranca = $valor; return $this; }
    function getCodigoSeguranca() { return $this->CodigoSeguranca; }
    
}

?>
