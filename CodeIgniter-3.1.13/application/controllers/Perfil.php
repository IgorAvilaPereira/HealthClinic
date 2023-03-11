<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Perfil extends CI_Controller {
    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();
        $this->load->view('perfil/index', $data);
        
    }
    public function tela_adicionar()    {
        $this->load->view('perfil/tela_adicionar');
        // $this->load->view('perfil/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('perfil/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        $this->load->database();
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $query = $this->db->query("INSERT INTO perfil (nome) VALUES ('".$nome."')");
        // redirect('/perfil/index');   
    }
}