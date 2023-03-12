<?php
// atendimento_arquivo
class Arquivo extends CI_Controller {

    public function index($atendimento_id)
    {
        $this->load->database();
        $this->load->helper('url'); 
        // $data['vetAtendimento'] = $query->result();
        $this->load->view('innerpages/header');
        // $this->load->view('atendimento/index', $data);
        $this->load->view('arquivo/index');
        $this->load->view('innerpages/footer');
    }
}