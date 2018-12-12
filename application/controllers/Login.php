<?php

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'form_validation',
            'session'
        ));
        $this->load->model(array(
            'login_model'
        ));
        $this->load->helper(array(
            'url'
        ));
    }
    
    public function index() {
        $header['title'] = 'Login';
        $header['session'] = $this->session->all_userdata();
        
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run() == FALSE) {
            
        } else {
            $usuario = $this->login_model->get_usuario($this->input->post('usuario'), $this->input->post('password'));
            
            if(!empty($usuario)) {
                $datos = array(
                    'SID' => $usuario['idusuario'],
                    'usuario' => $usuario['usuario']
                );
                $this->session->set_userdata($datos);      
                redirect('/partidos/', 'refresh');
            }
        }
        
        
        $this->load->view('layout/header', $header);
        $this->load->view('login/index');
        $this->load->view('layout/footer');
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('/login/', 'refresh');
    } 
}
?>
