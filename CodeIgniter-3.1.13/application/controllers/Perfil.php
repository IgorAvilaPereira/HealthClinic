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
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();
        $this->load->view('perfil/index', $data);
        
    }
    public function tela_adicionar()    {
        $this->load->view('perfil/tela_adicionar');
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM perfil WHERE id = '.$id);
        $data['perfil'] = $query->result();        
        $this->load->view('perfil/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM perfil WHERE id = ".$id.";");        
        header("Location: /perfil/index");
    }
    public function adicionar()    {        
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $adicionar = $this->input->post("adicionar");
        $visualizar = $this->input->post("visualizar");
        $editar = $this->input->post("editar");
        $remover = $this->input->post("remover");
        // if (empty($adicionar)) $adicionar = FALSE;
        // if (empty($visualizar)) $visualizar = FALSE;
        // if (empty($editar)) $editar = FALSE;        
        // if (empty($remover)) $remover = FALSE;
        $query = $this->db->query("INSERT INTO perfil (nome, adicionar, visualizar, editar, remover) VALUES ('".$nome."', ".$adicionar.", ".$visualizar.", ".$editar.", ".$remover.");");
        header("Location: /perfil/index");

    }
}