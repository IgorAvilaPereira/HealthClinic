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
        $this->load->view('usuario/tela_adicionar');
        // $this->load->view('usuario/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('usuario/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        $this->load->database();
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $query = $this->db->query("INSERT INTO usuario (nome) VALUES ('".$nome."')");
        // redirect('/perfil/index');   
    }
}