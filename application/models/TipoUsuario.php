<?php

class TipoUsuario {
    
    private $idTipoUsuario;
    private $TipoUsuario;
    
    public function __construct($tipoUsuario = "") {
        $this->TipoUsuario = $tipoUsuario;
    }
    
    public function getIdTipoUsuario(){
        return $this->idTipoUsuario;}
    public function setIdTipoUsuario($idTipoUsuario){
        $this->idTipoUsuario = $idTipoUsuario;}

    public function getTipoUsuario(){
        return $this->TipoUsuario;}
    public function setTipoUsuario($TipoUsuario){
        $this->TipoUsuario = $TipoUsuario;}

    
    
    
}

?>