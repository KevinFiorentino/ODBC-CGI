<?php

class TestProcedure extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function testProcedure() {

        $datasource = new DataSource();
        
        /* EJECUTAR PROCEDURE Y CAPTURAR OUT, FUNCIONA BIEN !!!!!!!!
        $call = "CALL logearUsuario(?, ?, @out)";
        $param = array("socio", "1211");
        echo $datasource->ejecturaProcOut($call, $param); */

        $user = "socio";
        $pass = "1111";
        
        $call = "CALL logear_Usuario('$user', '$pass')";
        
        
        $res = $datasource->ejecutarProcedure($call);
        
        
        if(odbc_result($res, 'user')) {
            echo odbc_result($res, 'user');
            echo odbc_result($res, 'pass');
        }
        else {
            echo 0;
        }
    }

}


?>