<?php

class CanchaDao extends CI_Model {
    
    function __construct() {
        $this->load->model("Cancha");
        $this->load->model("Deporte");
        $this->load->model("TipoCancha");
        $this->load->model("Filial");
        $this->load->model("Localidad");
    }
    
    /** Método para imprimir en pantalla el JSON para cargar el DataTables. 
     *  Es llamado desde /scriptDataTables.js
     * */
    public function traerCanchas() {
        $datasource = new DataSource();
        $canchas = array();
        $cancha = null;
        
        $sql = "CALL traerCanchas();";
        
        $query = $datasource->ejecutarQuery($sql); 
        
        $json='[';
        while($row = odbc_fetch_array($query)) {     
            $json .= '{"deporte":"'.$row["deporte"].'",';
            $json .= '"localidad":"'.$row["localidad"].'",';
            $json .= '"idFilial":"'.$row["idFilial"].'",';
            $json .= '"idCancha":"'.$row["idCancha"].'",';
            $json .= '"tipoCancha":"'.$row["tipoCancha"].'"},';          
        }

        //QUITAR ÚLTIMA COMA DEL JSON
        $length = strlen($json);
        $subJson = substr($json, 0, $length-2);
        $subJson .= "}]";

        return $subJson;
    }
    
}