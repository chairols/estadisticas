<?php
class Index extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array(
            'session'
        ));
    }
    
    public function index() {
        $title['session'] = $this->session->all_userdata();
        $title['title'] = "Straface.com.ar";
        $this->load->view('layout/header', $title);
        $this->load->view('index/index');
        $this->load->view('layout/footer');
    }
}
?>
