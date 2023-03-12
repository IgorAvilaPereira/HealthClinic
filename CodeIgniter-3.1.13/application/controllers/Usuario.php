<?php

class Usuario extends CI_Controller {

    
        

    public function index()
    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM usuario');
        $data['vetUsuario'] = $query->result();
        $this->load->view('usuario/index', $data);        
    }
    public function tela_adicionar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();     
        $this->load->view('usuario/tela_adicionar', $data);
    }
    public function tela_editar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('usuario/tela_editar', $data);
    }
    public function editar()    {
        $this->load->database();
        $this->load->helper('url'); 
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM usuario WHERE id = ".$id.";");        
        // header("Location: index");
    }
    public function adicionar()    {        
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $setor_id = $this->input->post("setor_id");
        $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES ('".$nome."', '".$email."', md5('".$senha."'), ".$setor_id.");");        
        // $this->index();
        // header("Location: index");
    }
}