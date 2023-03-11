<?php
class Atendimento extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM atendimento');
        $data['vetAtendimento'] = $query->result();
        $this->load->view('atendimento/index', $data);
    }
    public function tela_adicionar()    {
        
        $this->load->view('atendimento/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('atendimento/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        // $this->load->view('tela_adicionar', $data);
    }
}