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
    
    
        public function traerMisTurnos($idUsuario) {
            $datasource = new DataSource();
            $Turnos = array();
            $Turno = null;
            
            $sql = "CALL traerMisTurnos($idUsuario);";
            
            $query = $datasource->ejecutarQuery($sql);
            
            $json='[';
            while($row = odbc_fetch_array($query)) {
                $json .= '{"idTurno":"'.$row["idTurno"].'",';
                $json .= '"fechaHora":"'.$row["fechaHora"].'",';
                $json .= '"tipoCancha":"'.$row["tipoCancha"].'",';
                $json .= '"deporte":"'.$row["deporte"].'",';
                $json .= '"localidad":"'.$row["localidad"].'",';
                $json .= '"idCancha":"'.$row["idCancha"].'",'; 
                $json .= '"idFilial":"'.$row["idFilial"].'"},'; 
            }
            
            //QUITAR ÚLTIMA COMA DEL JSON
            $length = strlen($json);
            $subJson = substr($json, 0, $length-2);
            $subJson .= "}]";
            
            return $subJson;
        }
        
        public function cancelarTurno($idTurno) {
            $datasource = new DataSource();
            
            $registrar_usuario = "CALL cancelarTurno($idTurno)";
            
            $query = $datasource->ejecutarABM($registrar_usuario);
            return $query;
        }
        
        public function ValidarTurnoModif($fecha, $hora, $idTurno, $idCancha) {
            $datasource = new DataSource();
            $valido = null;
            
            $query = $datasource->ejecutarQuery("SELECT modificar_Turno($idTurno, $idCancha, '$fecha $hora') AS modificar;");
            
            while($res = odbc_fetch_array($query)) {
                $valido = $res['modificar'];
            }
            
            return $valido;
        }
        
}