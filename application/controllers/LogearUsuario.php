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
        
        $log = $this->LoginDao->logearUsuario($user, $pass);
        
        if($log === 0) { //SI ES IDENTICO A CERO, NO SE ENCONTR� EL USUARIO
            $_SESSION['errorLogin'] = "Usuario o Contrase&ntilde;a Incorrecto";
            $this->load->view("index");
            $this->load->view("footer");
        }
        else { //SI NO, LOGEA AL USUARIO Y LO ENVIA A BIENVENIDO
            
            redirect('/LogearUsuario/Logeado','refresh');
        }
        
    }
    
    public function Logeado() {
        $this->load->view("header");
        $this->load->view("BienvenidoSocio");
        $this->load->view("footer");
    }

    
}