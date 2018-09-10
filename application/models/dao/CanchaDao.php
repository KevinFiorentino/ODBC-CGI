<?php

class CanchaDao extends CI_Model {
    
    function __construct() {
        $this->load->model("Cancha");
        $this->load->model("Deporte");
        $this->load->model("TipoCancha");
        $this->load->model("Filial");
        $this->load->model("Localidad");
    }
    
    public function traerCanchas() {
        $datasource = new DataSource();
        $canchas = array();
        $cancha = null;
        
        $sql = "SELECT tipoCancha, deporte, localidad FROM Cancha
            JOIN TipoCancha ON Cancha.idTipoCancha = TipoCancha.idTipoCancha
            JOIN Deporte ON TipoCancha.idDeporte = Deporte.idDeporte
            JOIN Filial ON Cancha.idFilial = Filial.idFilial
            JOIN Localidad ON Filial.idLocalidad = Localidad.idLocalidad;";
        
        $query = $datasource->ejecutarQuery($sql); 
        
        while($row = odbc_fetch_array($query)) { 

            $cancha = new Cancha();
            $tipoCancha = new TipoCancha();
            $localidad = new Localidad();
            $filial = new Filial();
            $deporte = new Deporte();
            
            $deporte->setDeporte($row['deporte']);
            $tipoCancha->setTipoCancha($row['tipoCancha']);
            $tipoCancha->setDeporte($deporte);
            
            $localidad->setLocalidad($row['localidad']); 
            $filial->setLocalidad($localidad);
            
            $cancha->setTipoCancha($tipoCancha);
            $cancha->setFilial($filial);

            array_push($canchas, $cancha);  
        }

        return $canchas;
    }
    
}