<?php

class Pessoa extends CI_Controller {

    public function index()
    {          
        $this->load->database();
        $query = $this->db->query('SELECT * FROM pessoa');
        $data['vetPessoa'] = $query->result();
        $this->load->view('pessoa/index', $data);
    }
    public function tela_adicionar()    {
        $this->load->view('pessoa/tela_adicionar');        
        // $this->load->view('pessoa/tela_adicionar', $data);
    }
    public function tela_editar()   
    {        
        $this->load->view('pessoa/tela_editar', $data);
    }
    public function editar()    
    {
    }
    public function remover()    
    {
    }
    public function adicionar()    
    {      
        $this->load->database();
        $this->load->helper('url'); 

        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $query = $this->db->query("INSERT INTO pessoa (nome) VALUES ('".$nome."')");        
        // erro
        redirect('./pessoa/index'); 

    }
}