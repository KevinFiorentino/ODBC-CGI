<?php

@session_start();

class Reservas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('dao/CanchaDao');
    }
    
    /** Ir a la vista para Reservar Cancha */
    public function ReservarCancha() {
        $this->load->view("header");
        $this->load->view("ReservarCancha");
        $this->load->view("footer");
    }
    
    /** Abrir vista emergente para pedir un Turno para X Cancha */
    public function Turnos() {
        $this->load->view("PedirTurno");
    }
    
    
    /** Método para cargar DataTables de Canchas */
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
    
    
    /** Método para cargar los DateTimePicker dependiendo el día de Mantenimeinto y el Horario de cada Filial */
    public function PedirTurno() {
        $this->load->model('dao/FilialDao');
        
        $idFilial = $this->input->get('filial');
        
        $filial = $this->FilialDao->traerFilial($idFilial);
        

        if ($filial == false){
            $error = 'No se pudo conectar con el servidor';
            throw new Exception($error); }
            
            try{
                echo '{ "data": '.$filial.' }';
            }catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }  
          
    }
    
    
    /** Método para dar de ALTA un Turno */
    public function VerificarTurno() {
        $this->load->model('dao/TurnoDao');
        
        $fecha = $this->input->post('datepicker');
        $hora = $this->input->post('timepicker');
        $filial = $this->input->post('filial');
        $cancha = $this->input->post('cancha');
        $usuario = $_SESSION['idUsuario'];
        
        $result = $this->TurnoDao->ValidarTurno($fecha, $hora, $filial, $usuario, $cancha);
        
        if($result == 0) {
            echo "<h4>Error en la reserva, el Turno podr&iacute;a ya estar ocupado</h4>";
        }
        else{
            echo "<h4>Su reserva fue registrada con &Eacute;xito !</h4>";
        }
    }
}

