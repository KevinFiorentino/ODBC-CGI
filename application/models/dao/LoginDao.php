<?php

class LoginDao extends CI_Model {
    
    public function __construct() {
        $this->load->model("Login");
        $this->load->model("TipoLogin");
        $this->load->model("Usuario");
    }
    
    public function logearUsuario($user = "") {
        $datasource = new DataSource();
        $login = null;
        
        $query = $datasource->ejecutarQuery("SELECT * FROM login
            JOIN usuario ON login.idLogin = usuario.idUsuario
            JOIN tipologin ON login.idTipoLogin = tipologin.idTipoLogin
            WHERE login.user = '$user';");
        
        
        while($row = odbc_fetch_array($query)) {
            $tipo = new TipoLogin($row['tipoLogin']);
            $tipo->setIdTipoLogin($row['idTipoLogin']);
            
            $usuario = new Usuario($row['nombre'], $row['apellido'], $row['direccion'], $row['telefono'], $row['email']);
            $usuario->setIdUsuario($row['idUsuario']);
            
            $login = new Login($row['user'], $row['pass'], $usuario, $tipo);
            $login->setIdLogin($row['idLogin']);
        }
        
        return $login;
    }
    
    public function traerUsuarios() {
        $datasource = new DataSource();
        $datatable = array();
        
        $query = $datasource->ejecutarQuery("SELECT user FROM login");
        
        while($row = odbc_fetch_array($query)) {
            $data = array('us' => $row['user']);
            array_push($datatable, $data);
        }
        
        return $datatable;
    }
    
    public function registrarUsuario($user,$pass,$nombre,$apellido,$direccion,$telefono,$email) {
        $datasource = new DataSource();
        
        $registrar_usuario = "CALL registrar_Usuario('$user','$pass','$nombre','$apellido','$direccion',$telefono,'$email')";
        
        $query = $datasource->ejecutarProcedure($registrar_usuario);
        return $query;
    }
    
}

?>