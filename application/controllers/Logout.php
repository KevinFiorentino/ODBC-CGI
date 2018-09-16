<?php

class Logout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }
    
    //Cerrar la Sesión del Usuario
    public function CerrarSesion() {
        session_unset();
        $this->load->view('index');
        $this->load->view("footer");
    }
    
}