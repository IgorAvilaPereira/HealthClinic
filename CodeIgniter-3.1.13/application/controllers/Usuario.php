<?php

class Usuario extends CI_Controller {           

    public function index()
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM usuario');
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
        $query = $this->db->query('SELECT * FROM usuario /*inner join setor on (setor.id = usuario.setor_id)*/ WHERE usuario.id = '.$id);
        $data['usuario'] = $query->result()[0];
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();  
        $query = $this->db->query('SELECT perfil_id as id FROM usuario_perfil where usuario_id='.$id);
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
        $query = $this->db->query("UPDATE usuario SET nome='".$nome."',  email='".$email."', senha=Md5('".$senha."'), setor_id = ".$setor_id." WHERE id =".$id.";");        
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
        $query = $this->db->query("DELETE FROM usuario WHERE id = ".$id.";");        
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
        $query = $this->db->query("SELECT * FROM usuario WHERE email = '".$email."' and senha = md5('".$senha."');");
        if (count($query->result()) > 0){
            $this->load->library('session');
            $this->session->usuario = $query->result()[0];
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
        $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES ('".$nome."', '".$email."', md5('".$senha."'), ".$setor_id.") RETURNING id;");        
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