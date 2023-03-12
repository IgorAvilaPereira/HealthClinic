<?php

class Usuario extends CI_Controller {   
        

    public function index()
    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM usuario');
        $data['vetUsuario'] = $query->result();
        $this->load->view('innerpages/header');
        $this->load->view('usuario/index', $data);        
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();  
        $this->load->view('innerpages/header');   
        $this->load->view('usuario/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();  
        $query = $this->db->query('SELECT * FROM usuario /*inner join setor on (setor.id = usuario.setor_id)*/ WHERE usuario.id = '.$id);
        $data['usuario'] = $query->result()[0];
        $this->load->view('innerpages/header'); 
        $this->load->view('usuario/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $setor_id = $this->input->post("setor_id");
        $query = $this->db->query("UPDATE usuario SET nome='".$nome."',  email='".$email."', senha=Md5('".$senha."'), setor_id = ".$setor_id." WHERE id =".$id.";");        
        header("Location: /usuario/index");    
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM usuario WHERE id = ".$id.";");        
        header("Location: /usuario/index");    
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
        header("Location: /usuario/index");    
    }
}