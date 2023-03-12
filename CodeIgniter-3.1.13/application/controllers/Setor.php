<?php 

class Setor extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();
        $this->load->view('setor/index', $data);        
    }
    public function tela_adicionar()    {
        $this->load->view('setor/tela_adicionar');
        // $this->load->view('setor/tela_adicionar', $data);
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor WHERE id = '.$id);
        $data['setor'] = $query->result();
        $this->load->view('setor/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM setor WHERE id = ".$id.";");        
        header("Location: /setor/index");

    }
    public function adicionar()    {        
        $this->load->database();
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $endereco = $this->input->post("endereco");
        $telefone = $this->input->post("telefone");
        $query = $this->db->query("INSERT INTO setor (nome, email, endereco, telefone) VALUES ('".$nome."','".$email."','".$endereco."','".$telefone."');");
        // redirect('/perfil/index');   
        // return redirect()->to('setor/index');
        // redirect('setor/index');
        header("Location: /setor/index");



    }
}