<?php

class Usuario extends CI_Controller {           

    public function index($offset = 0)
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 

        
        $this->load->library('pagination');
        $limit = 10;
        $config['base_url'] = '/usuario/index/';
        $query = $this->db->query('SELECT count(*) as qtde FROM usuario');        
        $config['total_rows'] = $query->result()[0]->qtde;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);                
        $query = $this->db->query('SELECT * FROM usuario order by nome LIMIT ? OFFSET ?', array($limit, $offset*$limit));

        $data['pagination'] = $this->pagination->create_links();
                
        $data['usuario_id'] = $this->session->userdata('usuario')->id;
        $data['vetUsuario'] = $query->result();

        $this->load->view('innerpages/header');
        $this->load->view('usuario/index', $data);        
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();  
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();  
        $this->load->view('innerpages/header');   
        $this->load->view('usuario/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();  
        // $query = $this->db->query('SELECT * FROM usuario WHERE usuario.id = '.$id);
        $query = $this->db->query("SELECT * FROM usuario WHERE usuario.id = ?", array($id));    
        $data['usuario'] = $query->result()[0];
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();  
        // $query = $this->db->query('SELECT perfil_id as id FROM usuario_perfil where usuario_id='.$id);
        $query = $this->db->query("SELECT perfil_id as id FROM usuario_perfil where usuario_id=?", array($id));    
        $vetUsuarioPerfil = $query->result();  
        $data['vetUsuarioPerfil'] = [];
        foreach($vetUsuarioPerfil as $perfil){
            $data['vetUsuarioPerfil'][] = (int) $perfil->id;
        }        
        $this->load->view('innerpages/header'); 
        $this->load->view('usuario/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $setor_id = $this->input->post("setor_id");
        // $query = $this->db->query("UPDATE usuario SET nome='".$nome."',  email='".$email."', senha=Md5('".$senha."'), setor_id = ".$setor_id." WHERE id =".$id.";");        
        $query = $this->db->query("UPDATE usuario SET nome=?,  email=?, senha = md5(?), setor_id = ? WHERE id =?;", array($nome, $email, $senha, $setor_id, $id));       
        $vetPerfil = $this->input->post("perfil_id"); 
        $usuario_id = $id;    
        if (is_array($vetPerfil)){
            if (count($vetPerfil)>0){                                   
                $sql = "";
                foreach($vetPerfil as $perfil_id){
                    $sql.="INSERT INTO usuario_perfil (usuario_id, perfil_id) VALUES (".$usuario_id.",".$perfil_id.");";
                }
                $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";".$sql."COMMIT;");        
            } else {
                $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";COMMIT;");        
            }
        }
        else {
            $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";COMMIT;");        
        }
        header("Location: /usuario/index");    
    }
    public function remover($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        // $query = $this->db->query("DELETE FROM usuario WHERE id = ".$id.";");        
        $query = $this->db->query("DELETE FROM usuario WHERE id = ?", array($id));       
        header("Location: /usuario/index");    
    }
    public function logout()    {        
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->session->sess_destroy();
        $data['error'] = "";
        $this->load->view('usuario/tela_login', $data);
    }
    public function login()    {        
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post(); 
        $email = $this->input->post("email");        
        $senha = $this->input->post("senha");      
        
        $query = $this->db->query("SELECT * FROM usuario WHERE email = ? and senha = md5(?);", array(trim($email), trim($senha)));       
        if (count($query->result()) > 0){
            $this->load->library('session');
            $this->session->usuario = $query->result()[0];

            // $query = $this->db->query("SELECT perfil.id, perfil.nome, perfil.adicionar, perfil.visualizar, perfil.remover, perfil.editar FROM usuario inner join usuario_perfil on (usuario.id = usuario_perfil.usuario_id) inner join perfil on (perfil.id = usuario_perfil.perfil_id) WHERE usuario.id = ?;", array($this->session->usuario->id));       
            // echo var_dump($query->result());
            // // die();
            $this->load->view('innerpages/header');
		    $this->load->view('home');
            $this->load->view('innerpages/footer');
        } else {
            $data['error'] = "Login incorreto";
            $this->load->view('usuario/tela_login', $data);
        }        
    }
    public function adicionar()    {   
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }     
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $setor_id = $this->input->post("setor_id");
        $vetPerfil = $this->input->post("perfil_id");        
        // $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES ('".$nome."', '".$email."', md5('".$senha."'), ".$setor_id.") RETURNING id;");        
        $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES (?, ?, md5(?), ?) RETURNING id;", array($nome, $email, $senha, $setor_id));       
        if (count($vetPerfil)>0){
            $usuario_id = (int) $query->result()[0]->id;            
            $sql = "";
            foreach($vetPerfil as $perfil_id){
                $sql.="INSERT INTO usuario_perfil (usuario_id, perfil_id) VALUES (".$usuario_id.",".$perfil_id.");";
            }
            $query = $this->db->query("BEGIN;".$sql."COMMIT;");        
        }
        header("Location: /usuario/index");    
    }
}