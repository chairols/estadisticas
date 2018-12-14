<?php
class Partidos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'jugadores_model', 
            'partidos_model', 
            'partidos_jugadores_model'
        ));
        $this->load->library(array(
            'session'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/login/', 'refresh');
        }
        
        $data['jugadores'] = $this->jugadores_model->get_jugadores();
        
        if(!empty($_POST)) {
            
            $fecha = $this->input->post('fecha');
            
            if($fecha != '') {
                $idpartido = $this->partidos_model->set_partido($fecha);
                
                $equipo1 = array();
                $equipo1['jugadores'] = array();
                for($i = 0; $i < 7; $i++) {
                    $equipo1['jugadores'][$i]['idPartidos'] = $idpartido;
                    $equipo1['jugadores'][$i]['idJugadores'] = $this->input->post('jugador-e1-'.$i);
                    $equipo1['jugadores'][$i]['idResultados'] = $this->input->post('resultado-e1');
                    $equipo1['jugadores'][$i]['equipo'] = '1';
                    $equipo1['jugadores'][$i]['golesF'] = $this->input->post('golesF-e1-'.$i);
                    $equipo1['jugadores'][$i]['golesC'] = $this->input->post('golesC-e1-'.$i);
                    $figura = $this->input->post('figura-e1-'.$i);
                    if($figura == 'on') {
                        $equipo1['jugadores'][$i]['mejor'] = '1';
                    } else {
                        $equipo1['jugadores'][$i]['mejor'] = '0';
                    }    
                    $this->partidos_jugadores_model->set_partidos_jugadores($equipo1['jugadores'][$i]);
                }

                $equipo2 = array();
                $equipo2['jugadores'] = array();
                for($i = 0; $i < 7; $i++) {
                    $equipo2['jugadores'][$i]['idPartidos'] = $idpartido;
                    $equipo2['jugadores'][$i]['idJugadores'] = $this->input->post('jugador-e2-'.$i);
                    $equipo2['jugadores'][$i]['idResultados'] = $this->input->post('resultado-e2');
                    $equipo2['jugadores'][$i]['equipo'] = '2';
                    $equipo2['jugadores'][$i]['golesF'] = $this->input->post('golesF-e2-'.$i);
                    $equipo2['jugadores'][$i]['golesC'] = $this->input->post('golesC-e2-'.$i);
                    $figura = $this->input->post('figura-e2-'.$i);
                    if($figura == 'on') {
                        $equipo2['jugadores'][$i]['mejor'] = '1';
                    } else {
                        $equipo2['jugadores'][$i]['mejor'] = '0';
                    }    
                    $this->partidos_jugadores_model->set_partidos_jugadores($equipo2['jugadores'][$i]);
                }
                
            }
            
            
            
            
        }
        $header['title'] = "Cargar Partido";
        $header['session'] = $session;
        
        $this->load->view('layout/header', $header);
        $this->load->view('partidos/index', $data);
        $this->load->view('layout/footer');
    }
    
    public function resultado($id) {
        $header['title'] = 'Resultado';
        
        $data['partido'] = $this->partidos_model->get_partido($id);
        $data['equipo1'] = $this->partidos_jugadores_model->get_equipo(1, $id);
        $data['equipo2'] = $this->partidos_jugadores_model->get_equipo(2, $id);
        
        foreach ($data['equipo1'] as $key => $value) {
            $data['equipo1'][$key]['jugador'] = $this->jugadores_model->get_jugador($value['idJugadores']);
        }
        foreach ($data['equipo2'] as $key => $value) {
            $data['equipo2'][$key]['jugador'] = $this->jugadores_model->get_jugador($value['idJugadores']);
        }
        
        $this->load->view('layout/header', $header);
        $this->load->view('partidos/resultado', $data);
        $this->load->view('layout/footer');
    }
    
    public function agregar() {
        $session = $this->session->all_userdata();
        if(!isset($session['SID'])) {
            redirect('/login/', 'refresh');
        }
        
        $header['title'] = "Cargar Partido";
        $header['session'] = $session;
        
        $data['jugadores'] = $this->jugadores_model->get_jugadores();
        
        $this->load->view('layout/header', $header);
        $this->load->view('partidos/agregar', $data);
        $this->load->view('layout/footer');
    }
    
    public function agregar_ajax() {
        
    }
}
?>
