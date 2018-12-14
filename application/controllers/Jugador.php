<?php
class Jugador extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'jugadores_model',
            'partidos_jugadores_model'
        ));
        $this->load->library(array(
            'session',
            'form_validation'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index($id) {
        $header['title'] = "Ficha";
        $header['session'] = $this->session->all_userdata();
        $data['jugador'] = $this->jugadores_model->get_jugador($id);
        $data['ganados'] = $this->partidos_jugadores_model->get_partidos_por_resultado($id, 1);
        $data['empatados'] = $this->partidos_jugadores_model->get_partidos_por_resultado($id, 2);
        $data['perdidos'] = $this->partidos_jugadores_model->get_partidos_por_resultado($id, 3);
        $data['golesF'] = $this->partidos_jugadores_model->goles_a_favor($id);
        $data['golesC'] = $this->partidos_jugadores_model->goles_en_contra($id);
        $data['figura'] = $this->partidos_jugadores_model->cantidad_de_veces_figura($id);
        $data['racha'] = $this->partidos_jugadores_model->racha_goles($id);
        
        $this->load->view('layout/header', $header);
        $this->load->view('jugador/index', $data);
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/login/', 'refresh');
        }
        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('apodo', 'Apodo', 'required');
        
        if($this->form_validation->run() == FALSE) {
             
        } else {
            $data['nombre'] = $this->input->post('nombre');
            $data['apellido'] = $this->input->post('apellido');
            $data['apodo'] = $this->input->post('apodo');
            
            $this->jugadores_model->set_jugador($data);
        }
        $header['title'] = 'Agregar Jugador';
        $header['session'] = $session;
        
        
        $this->load->view('layout/header', $header);
        $this->load->view('jugador/agregar');
        $this->load->view('layout/footer');
    }
    
    public function editar($id = null) {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/login/', 'refresh');
        }
        
        $data = null;
        if($id == null) {
            $data['jugadores'] = $this->jugadores_model->get_jugadores();
        } else {
            $data['jugador'] = $this->jugadores_model->get_jugador($id);
        }
        
        
        if($id != null) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('apodo', 'Apodo', 'required');

            if($this->form_validation->run() == FALSE) {

            } else {
                $datos['nombre'] = $this->input->post('nombre');
                $datos['apellido'] = $this->input->post('apellido');
                $datos['apodo'] = $this->input->post('apodo');

                $this->jugadores_model->update($datos, $id);
                redirect('/jugador/editar/', 'refresh');
            }
        }
        
        
        $header['title'] = 'Editar Jugador';
        $header['session'] = $session;
        
        $this->load->view('layout/header', $header);
        if($id == null) {
            $this->load->view('jugador/editar', $data);
        } else {
            $this->load->view('jugador/edit', $data);
        }
        $this->load->view('layout/footer');
    }
}
?>
