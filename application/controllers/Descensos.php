<?php

class Descensos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'tablas_model' 
        ));
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index($anio = null) {
        $header['session'] = $this->session->all_userdata();
        $tabla = null;
        if($anio == null) {
            $header['title'] = "Descensos General";
            $tabla['tabla'] = $this->tablas_model->get_general_descenso(); 
        } else {
            $header['title'] = "Descensos ".$anio;
            $tabla['tabla'] = $this->tablas_model->get_anio_descenso($anio);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('descensos/tabla', $tabla);
        $this->load->view('layout/footer');
    }
}
?>