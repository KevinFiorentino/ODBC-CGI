<?php

@session_start();

class RegistrarSocio extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'error error error');
    }
    
    public function NuevoSocio() {
        $this->load->view("RegistrarSocio");
        $this->load->view("footer");
    }
    
    public function Asociar() {
        /* Load form helper */
        $this->load->helper(array('form'));
        
        /* Load form validation library */
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pass', 'Contrase&ntildea', 'required');
        $this->form_validation->set_rules('user', 'Nombre Usuario', 'required|is_unique[login.user]');
        $this->form_validation->set_rules('passrepeat', 'Repetir Contrase&ntildea', 'required|matches[pass]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("RegistrarSocio");
            $this->load->view("footer");
        }
        else
        {
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
            $this->load->view("RegistrarSocio");
            $this->load->view("footer");
        }
        else {
            $_SESSION['RegistroOk'] = "Se ha registrado correctamente";
            $this->load->view('index');
            $this->load->view("footer");
        }
        }
        }
    
    
    public function TraerUsuarios() {
        
        $this->load->model("dao/LoginDao");
        
        echo json_encode($this->LoginDao->traerUsuarios());
        
    }
    
    
}