<?php

class TipoLogin extends CI_Model {
    
    private $idTipoLogin;
    private $TipoLogin;
    
    public function __construct($tipoLogin = "") {
        $this->TipoLogin = $tipoLogin;
    }
    
    public function getIdTipoLogin(){
        return $this->idTipoLogin;}
    public function setIdTipoLogin($idTipoLogin){
        $this->idTipoLogin = $idTipoLogin;}

    public function getTipoLogin(){
        return $this->TipoLogin;}
    public function setTipoLogin($TipoLogin){
        $this->TipoLogin = $TipoLogin;}

    
    
    
}

?>