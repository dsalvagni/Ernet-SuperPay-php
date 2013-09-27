<?php

/**
 * Objeto do Boleto
 * @author Daniel Salvagni <daniel@we3online.com.br>
 */
class SuperPayBoleto {
       
    /**
     * Informações para o 
     */
    private $CampoLivre1;
    private $CampoLivre2;
    private $CampoLivre3;
    private $CampoLivre4;
    private $CampoLivre5;
    private $Vencimento;
    
    
    function __construct(
                $Vencimento  = "",
                $CampoLivre1 = "",
                $CampoLivre2 = "",
                $CampoLivre3 = "",
                $CampoLivre4 = "",
                $CampoLivre5 = ""
            )
    {
        $this->Vencimento         = $Vencimento;
        $this->CampoLivre2        = $CampoLivre2;
        $this->CampoLivre2        = $CampoLivre2;
        $this->CampoLivre3        = $CampoLivre3;
        $this->CampoLivre4        = $CampoLivre4;
        $this->CampoLivre5        = $CampoLivre5;
    }
    
    /**
     * Informações para o Boleto
     */
    function setCampoLivre1($valor) { $this->CampoLivre1 = $valor; return $this; }
    function getCampoLivre1() { return $this->CampoLivre1; }
    
    function setCampoLivre2($valor) { $this->CampoLivre2 = $valor; return $this; }
    function getCampoLivre2() { return $this->CampoLivre2; }
    
    function setCampoLivre3($valor) { $this->CampoLivre3 = $valor; return $this; }
    function getCampoLivre3() { return $this->CampoLivre3; }
    
    function setCampoLivre4($valor) { $this->CampoLivre4 = $valor; return $this; }
    function getCampoLivre4() { return $this->CampoLivre4; }
    
    function setCampoLivre5($valor) { $this->CampoLivre5 = $valor; return $this; }
    function getCampoLivre5() { return $this->CampoLivre5; }

    function setVencimento($valor) { $this->Vencimento = $valor; return $this; }
    function getVencimento() { return $this->Vencimento; }
    
}

?>
