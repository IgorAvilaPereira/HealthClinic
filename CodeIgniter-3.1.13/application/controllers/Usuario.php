<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Usuario extends CI_Controller {
    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM usuario');
        $data['vetUsuario'] = $query->result();
        $this->load->view('usuario/index', $data);        
    }
    public function tela_adicionar()    {
        
        $this->load->view('usuario/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('usuario/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        // $this->load->view('tela_adicionar', $data);
    }
}