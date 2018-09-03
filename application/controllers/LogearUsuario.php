<?php

@session_start();

class LogearUsuario extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }
    
    public function index() {
        $this->load->view('index');
        $this->load->view("footer");
    }
    
    public function IniciarSesion() {
        $this->load->view('index');
        $this->load->view('footer');
    }
    
    public function Login() {
        
        $this->load->model("dao/LoginDao");
        
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        $login = $this->LoginDao->logearUsuario($user);
        
        if($login->getPass() === $pass) {
            $this->load->view("header");
            $this->load->view("BienvenidoSocio");
            $this->load->view("footer");
        }
        else {
            $_SESSION['errorLogin'] = "Usuario o Contrase&ntilde;a Incorrecto";
            $this->load->view("index");
            $this->load->view("footer");
        }
    }
    

    
}