<?php

class Usuario {
    
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $direccion;
    private $telefono;
    private $email;
    private $tipoUsuario;
    
    public function __construct($nombre = "", $apellido = "", $direccion = "", $telefono = "", $email = "", TipoUsuario $tipoUsuario) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->tipoUsuario = $tipoUsuario;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;}
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;}

    public function getNombre(){
        return $this->nombre;}
    public function setNombre($nombre){
        $this->nombre = $nombre;}
        
    public function getApellido(){
        return $this->apellido;}
    public function setApellido($apellido){
        $this->apellido = $apellido;}
        
    public function getDireccion(){
        return $this->direccion;}
    public function setDireccion($direccion){
        $this->direccion = $direccion;}

    public function getTelefono(){
        return $this->telefono;}
    public function setTelefono($telefono){
        $this->telefono = $telefono;}

    public function getEmail(){
        return $this->email;}
    public function setEmail($email){
        $this->email = $email;}

    public function getTipoUsuario(){
        return $this->tipoUsuario;}
    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;}

    
    
    
}

?>