<?php

class Turno extends CI_Model {
    
    private $idTurno;
    private $fechaHora;
    private $vigente;
    private $filial;
    private $usuario;
    private $cancha;
      
    public function __construct($fechaHora = "", $vigente = false, Filial $filial = null, Usuario $usuario = null, Cancha $cancha = null) {
        $this->fechaHora = $fechaHora;
        $this->vigente = $vigente;
        $this->filial = $filial;
        $this->usuario = $usuario;
        $this->cancha = $cancha;
    }
    
    public function getIdTurno(){
        return $this->idTurno;}
    public function setIdTurno($idTurno){
        $this->idTurno = $idTurno;}

    public function getFechaHora(){
        return $this->fechaHora;}
    public function setFechaHora($fechaHora){
        $this->fechaHora = $fechaHora;}

    public function getVigente(){
        return $this->vigente;}
    public function setVigente($vigente){
        $this->vigente = $vigente;}

    public function getFilial(){
        return $this->filial;}
    public function setFilial($filial){
        $this->filial = $filial;}

    public function getUsuario(){
        return $this->usuario;}
    public function setUsuario($usuario){
        $this->usuario = $usuario;}

    public function getCancha(){
        return $this->cancha;}
    public function setCancha($cancha){
        $this->cancha = $cancha;}

 
    
}