<?php

class TipoLoginDao extends CI_Model {
    
    function __construct() {
        $this->load->model("TipoLogin");
    }
    
    public function traerTiposLogin() {
        $datasource = new DataSource();
        $tipos = array();
        
        $query = $datasource->ejecutarQuery("SELECT * FROM TipoLogin;");
        
        while($row = odbc_fetch_array($query)) {
            $tipo = new TipoLogin($row['tipoLogin']);
            $tipo->setIdTipoLogin($row['idTipoLogin']);

            array_push($tipos, $tipo);
        }
        return $tipos;
    }
    
}

?>