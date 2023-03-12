<?php

class Pessoa extends CI_Controller {



    public function index()
    {          
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM pessoa');
        $data['vetPessoa'] = $query->result();
        $this->load->view('pessoa/index', $data);
    }
    public function tela_adicionar()    {
        $this->load->view('pessoa/tela_adicionar');        
        // $this->load->view('pessoa/tela_adicionar', $data);
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM pessoa WHERE id = '.$id);
        $data['pessoa'] = $query->result();
        $this->load->view('pessoa/tela_editar', $data);
    }
    public function editar()    
    {
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM pessoa WHERE id = ".$id.";");        
        header("Location: /pessoa/index");        }
    public function adicionar()    
    {      
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $data_nascimento = $this->input->post("data_nascimento");
        $cpf = $this->input->post("cpf");
        $rg = $this->input->post("rg");
        $rua = $this->input->post("rua");
        $bairro = $this->input->post("bairro");
        $complemento = $this->input->post("complemento");
        $cep =  $this->input->post("cep");
    // Foto: <input type="file" name="foto">  <br>
        $query = $this->db->query("INSERT INTO pessoa (nome, data_nascimento, cpf, rg, rua, bairro, complemento, cep) VALUES ('".$nome."', '".$data_nascimento."', '".$cpf."', '".$rg."','".$rua."','".$bairro."','".$complemento."', '".$cep."')");        
        header("Location: /pessoa/index");    
    }
}