<?php

class LoginDao extends CI_Model {
    
    public function __construct() {
        $this->load->model("Login");
        $this->load->model("TipoLogin");
        $this->load->model("Usuario");
    }
    
    public function logearUsuario($user, $pass){
        $datasource = new DataSource();
        $login = null;
        
        $call = "CALL logear_Usuario('$user', '$pass')";
        
        $resCall = $datasource->ejecutarProcedure($call);
        
        if(odbc_result($resCall, 'user')) {
            $login = new Login();
            $usuario = new Usuario();
            
            $login->setUser(odbc_result($resCall, 'user'));
            $usuario->setIdUsuario(odbc_result($resCall, 'idUsuario'));
            $usuario->setNombre(odbc_result($resCall, 'nombre'));
            $usuario->setApellido(odbc_result($resCall, 'apellido'));
            $login->setUsuario($usuario);
            
            return $login;
        }
        else {
            return 0;
        }  
    }
    
}

?>