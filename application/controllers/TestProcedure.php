<?php

class TestProcedure extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function testProcedure() {

        $datasource = new DataSource();

        $call = "CALL logearUsuario(?)";
        
        echo $datasource->ejecutarProcedure($call);
        
    }

}


?>