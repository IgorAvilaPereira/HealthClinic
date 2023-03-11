<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Setor extends CI_Controller {
    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();
        $this->load->view('setor/index', $data);        
    }
    public function tela_adicionar()    {
        
        $this->load->view('setor/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('setor/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        // $this->load->view('tela_adicionar', $data);
    }
}