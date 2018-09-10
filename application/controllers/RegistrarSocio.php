<?php

class RegistrarSocio extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }
    
    public function NuevoSocio() {
        $this->load->view("RegistrarSocio");
        $this->load->view("footer");
    }
    
    public function Asociar() {
        $this->load->model("dao/LoginDao");
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $direccion = $this->input->post('direc');
        $telefono = $this->input->post('tel');
        $email = $this->input->post('email');
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        $registrar = $this->LoginDao->registrarUsuario($user,$pass,$nombre,$apellido,$direccion,$telefono,$email);
         
        if ($registrar===0) {
            $_SESSION['errorRegistro'] = "Error al registrarse. Intente nuevamente";
            $this->load->view("RegistrarSocio");
            $this->load->view("footer");
        }
        else {
            $_SESSION['RegistroOk'] = "Se ha registrado correctamente";
            $this->load->view('index');
            $this->load->view("footer");
        }
        }
    
    
    public function TraerUsuarios() {
        
        $this->load->model("dao/LoginDao");
        
        echo json_encode($this->LoginDao->traerUsuarios());
        
    }
    
    
}