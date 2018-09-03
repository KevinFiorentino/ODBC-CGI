<?php

class Login extends CI_Model {
    
    private $idLogin;
    private $user;
    private $pass;
    private $usuario;
    private $tipologin;
    
    public function __construct($user = "", $pass = "", Usuario $usuario = null, TipoLogin $tipologin = null) {
        $this->user = $user;
        $this->pass = $pass;
        $this->usuario = $usuario;
        $this->tipologin = $tipologin;
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
        
    public function getTipologin(){
        return $this->tipologin;}
    public function setTipologin($tipologin){
        $this->tipologin = $tipologin;}

  
}

?>