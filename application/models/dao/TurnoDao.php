<?php

class TurnoDao extends CI_Model {
    
    function __construct() {
        $this->load->model("Turno");
    }
    
    
    
    public function ValidarTurno($fecha, $hora, $idFilial, $idUsuario, $idCancha) {
        $datasource = new DataSource();
        $valido = null;
        
        $query = $datasource->ejecutarQuery("SELECT alta_Turno($idFilial, $idCancha, '$fecha $hora', $idUsuario) AS alta;");
        
        while($res = odbc_fetch_array($query)) {
            $valido = $res['alta'];
        }
        
        return $valido;
    }
    
}