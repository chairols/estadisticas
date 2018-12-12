<?php

class Goleadores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'goleadores_model'
        ));
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index($anio = null) {
        $header['session'] = $this->session->all_userdata();
        $tabla = null;
        if($anio == null) {
            $header['title'] = "Tabla Goleadores General";
            $tabla['tabla'] = $this->goleadores_model->get_general(); 
        } else {
            $header['title'] = "Tabla Goleadores ".$anio;
            $tabla['tabla'] = $this->goleadores_model->get_anio($anio);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('goleadores/index', $tabla);
        $this->load->view('layout/footer');
    }
}
?>
