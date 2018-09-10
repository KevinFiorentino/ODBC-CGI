<?php

class Filial extends CI_Model implements JsonSerializable {
    
    private $idFilial;
    private $horarioDesde;
    private $horarioHasta;
    private $diaMantenimiento;
    private $localidad;
    
    public function __construct($desde = "", $hasta = "", $dia = "", Localidad $localidad = null) {
        $this->horarioDesde = $desde;
        $this->horarioHasta = $hasta;
        $this->diaMantenimiento = $dia;
        $this->localidad = $localidad;
    }
    
    public function getIdFilial(){
        return $this->idFilial;}
    public function setIdFilial($idFilial){
        $this->idFilial = $idFilial;}

    public function getHorarioDesde(){
        return $this->horarioDesde;}
    public function setHorarioDesde($horarioDesde){
        $this->horarioDesde = $horarioDesde;}

    public function getHorarioHasta(){
        return $this->horarioHasta;}
    public function setHorarioHasta($horarioHasta){
        $this->horarioHasta = $horarioHasta;}

    public function getDiaMantenimiento(){
        return $this->diaMantenimiento;}
    public function setDiaMantenimiento($diaMantenimiento){
        $this->diaMantenimiento = $diaMantenimiento;}

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