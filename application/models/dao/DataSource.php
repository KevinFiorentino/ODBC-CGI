<?php

class DataSource {
    
    private $dsn;
    private $cid;
    
    /** Conectar a Origen de Datos ODBC */
    public function __construct() {     
        $this->dsn = "sakila";
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
   
}

$ds = new DataSource();

echo $ds->ejecutarABM("SELECT * FROM actor;");


$i = 0;
$rows = array();
$result = $ds->ejecutarQuery("SELECT * FROM actor;");

while($myrow = odbc_fetch_array($result)) {
    echo $myrow['first_name'] . "<br>";
    echo $i++;
}
    
?>