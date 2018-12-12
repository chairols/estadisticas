<?php

class Figuras extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'figuras_model'
        ));
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index($anio = null) {
        $header['session'] = $this->session->all_userdata();
        $tabla = null;
        if($anio == null) {
            $header['title'] = "Tabla Figuras General";
            $tabla['tabla'] = $this->figuras_model->get_general(); 
        } else {
            $header['title'] = "Tabla Figuras ".$anio;
            $tabla['tabla'] = $this->figuras_model->get_anio($anio);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('figuras/index', $tabla);
        $this->load->view('layout/footer');
    }
}
?>