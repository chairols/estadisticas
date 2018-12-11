<?php
class Tabla extends CI_Controller {
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
            $header['title'] = "Tabla General";
            $tabla['tabla'] = $this->tablas_model->get_general(); 
        } else {
            $header['title'] = "Tabla ".$anio;
            $tabla['tabla'] = $this->tablas_model->get_anio($anio);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('tablas/tabla', $tabla);
        $this->load->view('layout/footer');
    }
}
?>
