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
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $direc = $this->input->post('direc');
        $telefono = $this->input->post('tel');
        $email = $this->input->post('email');
        
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');
        
        
    }
    
    public function TraerUsuarios() {
        
        $this->load->model("dao/LoginDao");
        
        echo json_encode($this->LoginDao->traerUsuarios());
        
    }
    
    
}