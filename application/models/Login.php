<?php

class Login {
    
    private $idLogin;
    private $user;
    private $pass;
    private $usuario;
    
    public function __construct($user = "", $pass = "", Usuario $usuario) {
        $this->user = $user;
        $this->pass = $pass;
        $this->usuario = $usuario;
    }
    
    public function getIdLogin(){
        return $this->idLogin;}
    public function setIdLogin($idLogin){
        $this->idLogin = $idLogin;}

    public function getUser(){
        return $this->user;}
    public function setUser($user){
        $this->user = $user;}

    public function getPass(){
        return $this->pass;}
    public function setPass($pass){
        $this->pass = $pass;}

    public function getUsuario(){
        return $this->usuario;}
    public function setUsuario($usuario){
        $this->usuario = $usuario;}

    
    
    
}

?>