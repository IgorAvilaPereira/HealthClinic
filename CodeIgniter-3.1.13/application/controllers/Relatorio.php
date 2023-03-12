<?php
class Relatorio extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $this->load->helper('url'); 
        // $data['vetAtendimento'] = $query->result();
        $this->load->view('innerpages/header');
        // $this->load->view('atendimento/index', $data);
        $this->load->view('relatorio/index');
        $this->load->view('innerpages/footer');
    }
}