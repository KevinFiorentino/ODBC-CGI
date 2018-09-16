<?php

class FilialDao extends CI_Model {
 
    function __construct() {
        $this->load->model("Filial");
    }
    
    /** Método para imprimir en pantalla el JSON de la Filial para cargar el DateTimePicker que le corresponde 
     *  Es llamado desde /scriptDateTimePicker.js
     * */
    public function traerFilial($idFilial) {
        $datasource = new DataSource();
        
        $sql = "SELECT * FROM Filial WHERE idFilial = $idFilial;";
        
        $query = $datasource->ejecutarQuery($sql);
        
        $json='[';
        while($row = odbc_fetch_array($query)) {       
            $json .= '{"hsDesde":"'.$row["horarioDesde"].'",';
            $json .= '"hsHasta":"'.$row["horarioHasta"].'",';
            $json .= '"idFilial":"'.$row["idFilial"].'",';
            $json .= '"dMantenimiento":"'.$row["diaMantenimiento"].'"},';         
        }
        
        //QUITAR ÚLTIMA COMA DEL JSON
        $length = strlen($json);
        $subJson = substr($json, 0, $length-2);
        $subJson .= "}]";
        
        return $subJson;
        
    }
    
}