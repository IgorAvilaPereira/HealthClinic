<?php 

class Setor extends CI_Controller {

    public function index($offset = 0)
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();

        $this->load->library('pagination');
        $limit = 10;
        $config['base_url'] = '/setor/index/';
        $query = $this->db->query('SELECT count(*) as qtde FROM setor');        
        $config['total_rows'] = $query->result()[0]->qtde;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);                
        $query = $this->db->query('SELECT * FROM setor order by nome LIMIT ? OFFSET ?', array($limit, $offset*$limit));
        $data['pagination'] = $this->pagination->create_links();

        // $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();
        $this->load->view('innerpages/header');
        $this->load->view('setor/index', $data);        
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->view('innerpages/header');
        $this->load->view('setor/tela_adicionar');
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("SELECT * FROM setor WHERE id = ?", array($id));
        
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
        // $query = $this->db->query("UPDATE setor SET nome='".$nome."',  email='".$email."', endereco='".$endereco."', telefone='".$telefone."' WHERE id = ".$id.";");
        $query = $this->db->query("UPDATE setor SET nome=?,  email=?, endereco=?, telefone=? WHERE id = ?;", array($nome, $email, $endereco, $telefone, $id));
        header("Location: /setor/index");
        
    }
    public function remover($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("select * from setor inner join usuario on (setor.id = usuario.setor_id) WHERE setor.id = ".$id.";");        
        $total = count($query->result());
        if ($total == 0) {
            // $query = $this->db->query("DELETE FROM setor WHERE id = ".$id.";");      
            $query = $this->db->query("DELETE FROM setor WHERE id = ?", array($id));  
            header("Location: /setor/index");
        } else {
            $data['mensagem'] = "nao pode excluir setor antes de excluir os usuarios do setor";
            $this->load->view('innerpages/header');
            $this->load->view('erro', $data);          
            $this->load->view('innerpages/footer');  
        }        

    }
    public function adicionar()    {      
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }  
        $this->load->database();
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $endereco = $this->input->post("endereco");
        $telefone = $this->input->post("telefone");
        // $query = $this->db->query("INSERT INTO setor (nome, email, endereco, telefone) VALUES ('".$nome."','".$email."','".$endereco."','".$telefone."');");     
        $query = $this->db->query("INSERT INTO setor (nome, email, endereco, telefone) VALUES (?,?,?,?);", array($nome, $email, $endereco, $telefone));  
        header("Location: /setor/index");
    }
}