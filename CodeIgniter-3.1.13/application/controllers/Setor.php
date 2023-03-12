<?php 

class Setor extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();
        $this->load->view('innerpages/header');
        $this->load->view('setor/index', $data);        
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->view('innerpages/header');
        $this->load->view('setor/tela_adicionar');
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor WHERE id = '.$id);
        $data['setor'] = $query->result()[0]; 
        $this->load->view('innerpages/header');
        $this->load->view('setor/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    public function editar()    {

        $this->load->database();
        $form_data = $this->input->post();        
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $endereco = $this->input->post("endereco");
        $telefone = $this->input->post("telefone");
        $query = $this->db->query("UPDATE setor SET nome='".$nome."',  email='".$email."', endereco='".$endereco."', telefone='".$telefone."' WHERE id = ".$id.";");
        header("Location: /setor/index");
        
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("select * from setor inner join usuario on (setor.id = usuario.setor_id) WHERE setor.id = ".$id.";");        
        $total = count($query->result());
        if ($total == 0) {
            $query = $this->db->query("DELETE FROM setor WHERE id = ".$id.";");        
            header("Location: /setor/index");
        } else {
            $data['mensagem'] = "nao pode excluir setor antes de excluir os usuarios do setor";
            $this->load->view('innerpages/header');
            $this->load->view('erro', $data);          
            $this->load->view('innerpages/footer');  
        }        

    }
    public function adicionar()    {        
        $this->load->database();
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $endereco = $this->input->post("endereco");
        $telefone = $this->input->post("telefone");
        $query = $this->db->query("INSERT INTO setor (nome, email, endereco, telefone) VALUES ('".$nome."','".$email."','".$endereco."','".$telefone."');");     
        header("Location: /setor/index");
    }
}