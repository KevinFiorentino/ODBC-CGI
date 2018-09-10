<?php

class TipoCancha extends CI_Model implements JsonSerializable {
    
    private $idTipoCancha;
    private $tipoCancha;
    private $deporte;
    
    public function __construct($tipoCancha = "", Deporte $deporte = null) {
        $this->tipoCancha = $tipoCancha;
        $this->deporte = $deporte;
    }
    
    public function getIdTipoCancha(){
        return $this->idTipoCancha;}
    public function setIdTipoCancha($idTipoCancha){
        $this->idTipoCancha = $idTipoCancha;}

    public function getTipoCancha(){
           return $this->tipoCancha;}
    public function setTipoCancha($tipoCancha){
        $this->tipoCancha = $tipoCancha;}

    public function getDeporte(){
        return $this->deporte;}
    public function setDeporte($deporte){
        $this->deporte = $deporte;}

        
    public function jsonSerialize() {
        return [
            'tipoCancha' => $this->tipoCancha,
            'deporte' => $this->deporte
        ];
    }
    
}