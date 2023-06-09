<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Perfil extends CI_Controller {


    public function index($offset = 0)
    {
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 


        $this->load->library('pagination');
        $limit = 10;
        $config['base_url'] = '/perfil/index/';
        $query = $this->db->query('SELECT count(*) as qtde FROM perfil');        
        $config['total_rows'] = $query->result()[0]->qtde;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);                
        $query = $this->db->query('SELECT * FROM perfil order by nome LIMIT ? OFFSET ?', array($limit, $offset*$limit));
        $data['pagination'] = $this->pagination->create_links();
        // $query = $this->db->query('SELECT * FROM perfil');
        // $query = $this->db->query("SELECT * FROM perfil WHERE id = ?;", array($id));       
        $data['vetPerfil'] = $query->result();
        $this->load->view('innerpages/header');
        $this->load->view('perfil/index', $data);
        $this->load->view('innerpages/footer');
        
    }

    public function tela_adicionar()    {
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->view('innerpages/header');
        $this->load->view('perfil/tela_adicionar');
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        // $query = $this->db->query('SELECT * FROM perfil WHERE id = '.$id);        
        $query = $this->db->query("SELECT * FROM perfil WHERE id = ?;", array($id));       
        $data['perfil'] = $query->result()[0];      
        $this->load->view('innerpages/header');
        $this->load->view('perfil/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    // bug
    public function editar()    {
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        // $adicionar = $this->input->post("adicionar");
        // $visualizar = $this->input->post("visualizar");
        // $editar = $this->input->post("editar");
        // $remover = $this->input->post("remover");
        // // if (empty($adicionar)) $adicionar = FALSE;
        // if (empty($visualizar)) $visualizar = FALSE;
        // if (empty($editar)) $editar = FALSE;        
        // if (empty($remover)) $remover = FALSE;
        // $query = $this->db->query("UPDATE perfil SET nome = '".$nome."' WHERE id = ".$id.";");
        $query = $this->db->query("UPDATE perfil SET nome = ? WHERE id = ?;", array($nome, $id));       
        header("Location: /perfil/index");
    }
    public function remover($id)    {
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("select * from perfil inner join usuario_perfil on (perfil.id = usuario_perfil.perfil_id) WHERE perfil.id = ?;", array($id));        
        $total = count($query->result());
        if ($total == 0) {
            // $query = $this->db->query("DELETE FROM perfil WHERE id = ".$id.";");        
            $query = $this->db->query("DELETE FROM perfil WHERE id = ?;", array($id));       
            header("Location: /perfil/index");
        } else {
            $data['mensagem'] = "nao pode excluir perfis que possuem usuários atrelados";
            $this->load->view('innerpages/header');
            $this->load->view('erro', $data);          
            $this->load->view('innerpages/footer');  
        }          
    }

    // bug
    public function adicionar()    {     
        $this->load->library('session');
              if(!$this->session->userdata('usuario') || $this->session->usuario->eh_admin == 0){

            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }  
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        // $adicionar = $this->input->post("adicionar");
        // $visualizar = $this->input->post("visualizar");
        // $editar = $this->input->post("editar");
        // $remover = $this->input->post("remover");
        // // if (empty($adicionar)) $adicionar = FALSE;
        // if (empty($visualizar)) $visualizar = FALSE;
        // if (empty($editar)) $editar = FALSE;        
        // if (empty($remover)) $remover = FALSE;
        // $query = $this->db->query("INSERT INTO perfil (nome, adicionar, visualizar, editar, remover) VALUES ('".$nome."', ".$adicionar.", ".$visualizar.", ".$editar.", ".$remover.");");
        // $query = $this->db->query("INSERT INTO perfil (nome) VALUES ('".$nome."');");
        $query = $this->db->query("INSERT INTO perfil (nome) VALUES (?);", array($nome));       
        header("Location: /perfil/index");

    }
}