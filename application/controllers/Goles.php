<?php

class Goles extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'partidos_model',
            'goleadores_model',
            'partidos_jugadores_model'
        ));
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index($anio = null) {
        $header['session'] = $this->session->all_userdata();
        if($anio == null) {
            $header['title'] = 'Goles / Asistencias';
        } else {
            $header['title'] = 'Goles / Asistencias '.$anio;
        }
        if($anio == null) {
            $data['partidos'] = $this->partidos_model->get_partidos();
        } else {
            $data['partidos'] = $this->partidos_model->get_partidos_por_anio($anio);
        }
        if($anio == null) {
            $data['jugadores'] = $this->goleadores_model->get_general();
        } else {
            $data['jugadores'] = $this->goleadores_model->get_anio($anio);
        }
            
        foreach ($data['jugadores'] as $key => $value) {
            $data['jugadores'][$key]['partidos'] = $this->partidos_jugadores_model->get_partidos_por_jugador($value['idJugadores']);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('goles/index', $data);
        $this->load->view('layout/footer');
    }
}
?>
