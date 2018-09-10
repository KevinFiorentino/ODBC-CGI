<?php

class Deporte extends CI_Model implements JsonSerializable {
    
    private $idDeporte;
    private $deporte;
    
    public function __construct($deporte = "") {
        $this->deporte = $deporte;
    }
    
    public function getIdDeporte(){
        return $this->idDeporte;}
    public function setIdDeporte($idDeporte){
        $this->idDeporte = $idDeporte;}

    public function getDeporte(){
        return $this->deporte;}
    public function setDeporte($deporte){
        $this->deporte = $deporte;}

      
        
    public function jsonSerialize() {
        return [
            'deporte' => $this->deporte
        ];
    }
    
}