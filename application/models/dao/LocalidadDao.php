<?php

class LocalidadDao extends CI_Model {
    
    function __construct() {
        $this->load->model("Localidad");
    }
    
}