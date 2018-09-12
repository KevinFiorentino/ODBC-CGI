<?php

class Reservas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('dao/CanchaDao');
    }
    
    public function ReservarCancha() {
        $this->load->view("header");
        $this->load->view("ReservarCancha");
        $this->load->view("footer");
    }
    
    public function CargarDataTableCanchas() {
        $canchas = $this->CanchaDao->traerCanchas();
        
        if ($canchas == false){
            $error = 'No se pudo conectar con el servidor';
            throw new Exception($error); }
        
        try{  
            echo '{ "draw": 1, "recordsFiltered": 10, "data": '.$canchas.'}';         
        }catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }    
    }
    
}