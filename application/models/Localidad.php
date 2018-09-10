<?php

class Localidad extends CI_Model implements JsonSerializable {
    
    private $idLocalidad;
    private $localidad;
    
    public function __construct($localidad = "") {
        $this->localidad = $localidad;
    }
    
    public function getIdLocalidad(){
        return $this->idLocalidad;}
    public function setIdLocalidad($idLocalidad){
        $this->idLocalidad = $idLocalidad;}
        
    public function getLocalidad(){
        return $this->localidad;}
    public function setLocalidad($localidad){
        $this->localidad = $localidad;}
    
        
    public function jsonSerialize() {
        return [
            'localidad' => $this->localidad
        ];
    }
      
}