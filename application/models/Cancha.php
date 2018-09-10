<?php

class Cancha extends CI_Model implements JsonSerializable {
    
    private $idCancha;
    private $tipoCancha;
    private $filial; 
    
    public function __construct(TipoCancha $tipoCancha = null, Filial $filial = null) {
        $this->tipoCancha = $tipoCancha;
        $this->filial = $filial;
    }
    
    public function getIdCancha(){
        return $this->idCancha;}
    public function setIdCancha($idCancha){
        $this->idCancha = $idCancha;}

    public function getTipoCancha(){
        return $this->tipoCancha;}
    public function setTipoCancha($tipoCancha){
        $this->tipoCancha = $tipoCancha;}

    public function getFilial(){
        return $this->filial;}
    public function setFilial($filial){
        $this->filial = $filial;}

        
    public function jsonSerialize() {
        return [
            'tipoCancha' => $this->tipoCancha,
            'filial' => $this->filial
        ];
    }
    
    
}