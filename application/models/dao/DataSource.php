<?php

class DataSource {
    
    private $dsn;
    private $cid;
    
    /** Conectar a Origen de Datos ODBC */
    public function __construct() {     
        $this->dsn = "DBodbc";
        $this->cid = odbc_connect($this->dsn, "", "");
        
        if(!$this->cid) {
            exit("Error en la Conexion al ODBC"); }          
    }
    
    /** Desconectar ODBC */
    public function __destruct() {
        odbc_close_all();
    }
    
    
    /**
     * Ejecuta una consulta y devuelve la Tabla de Datos como resultado.
     * 
     * @param string $sql -> Sentencia SQL
     * @return resource|number -> Retorna la Tabla de Datos o un 0 en caso de no haber encontrado nada en la consulta.
     */
    public function ejecutarQuery($sql = "") {
        if($sql != "") {
            $tablaDatos = odbc_exec($this->cid, $sql) or die (exit ("Error al ejecutar Query ODBC"));
            
            return $tablaDatos;
        }
        else{
            return 0;
        }
    }
    
    
    /**
     * Ejecuta un INSERT, UPDATE, DELETE y devuelve el número de Filas afectadas.
     * 
     * @param string $sql -> Sentencia SQL
     * @return number -> Número de Filas afectadas.
     */
    public function ejecutarABM($sql = "") {
        if($sql != "") {
            $idQuery = odbc_exec($this->cid, $sql) or die (exit ("Error al ejecutar Query ODBC"));
            $numFilasAfectadas = odbc_num_rows($idQuery);
            return $numFilasAfectadas;
        }
        else{
            return 0;
        }
    }

    
    /**
     * Ejecutar un Pocedimiento SIN parámetros de Salida @out
     * 
     * @param string $call  -> Llamada al procedimiento
     * @param array $params -> Parámetros del Procedimiento
     * @return number -> Retorna 1 si se ejecutó correctamente o 0 si hubo un error
     */
    public function ejecutarProcedure($call = "", $params = array("socio") ) { 
        $res = odbc_prepare($this->cid, $call);
        
        if(!$res) echo "Error en la llamada al procedimiento";
        
        if(odbc_execute($res, $params)) {  
            return 1; 
        }
        else {
            return 0; }     
    }
    
    
    /**
     * Ejecutar un Procedimiento CON un parametro de Salida @out, SOLO UN PARÁMETRO DE SALIDA
     * 
     * @param string $sql -> SQL para capturar el parametro de Salida.
     * @param string $call -> Llamada al Procedimiento
     * @param array $params -> Parametros del Procedimiento
     * @return resource|number -> Retorna el parámetro de salida en caso de éxito o un 0 si salió mal.
     */
    public function ejecturaProcOut($sql = "", $call = "", array $params) {
        $res = odbc_prepare($this->cid, $call);
        
        if(!$res) echo "Error en la llamada al procedimiento";
        
        if(odbc_execute($res, $params)) {
            $sql = "SELECT @out;";
            $out = odbc_exec($cid, $sql) or die (exit("Error ODBC"));
            return $out;
        }
        else {
            return 0; 
        } 
    }
    
/*
      
    $params = array("PEPE", "BIONDI");
    $call = "CALL INSERTAR_ACTOR(?, ?, @out)";
    
    $sql = "SELECT @out;";
    
*/
    
   
}
    
?>