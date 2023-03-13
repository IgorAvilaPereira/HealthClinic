<?php
// pessoa_documento
class Documento extends CI_Controller {

    public function baixar($id){
        $this->load->helper('download');
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM documento where id = ?;', array($id));
        $documento = $query->result()[0];
        if (!empty($documento->arquivo)){
            force_download('./documentos/'.$documento->arquivo, NULL);
        } 
    }
    
    public function index($pessoa_id = 0)
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        // $query = $this->db->query("SELECT * FROM documento WHERE pessoa_id = ".$pessoa_id.";");        
        $query = $this->db->query("SELECT * FROM documento WHERE pessoa_id = ?", array($pessoa_id));       
        $data['vetDocumento'] = $query->result();
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('innerpages/header');
        $this->load->view('documento/index', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar($pessoa_id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        $data['error'] = "";
        $data['upload_data'] = [];
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('documento/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id, $pessoa_id)      {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        // $query = $this->db->query("SELECT * FROM documento WHERE id = ".$id.";");        
        $query = $this->db->query("SELECT * FROM documento WHERE id = ?", array($id));       
        $data['documento'] = $query->result()[0];
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('documento/tela_editar', $data);        
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
        $nome = $this->input->post("nome");
        $id = $this->input->post("id");
        $pessoa_id = $this->input->post("pessoa_id");
        // $query = $this->db->query("UPDATE documento SET nome = '".$nome."' WHERE id = ".$id.";");
        $query = $this->db->query("UPDATE documento SET nome = ? WHERE id = ?", array($nome, $id));       
        header("Location: /documento/index/".$pessoa_id);
    }

    public function remover($id, $pessoa_id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        // $query = $this->db->query("SELECT * FROM documento WHERE id = ".$id.";");        
        $query = $this->db->query("SELECT * FROM documento WHERE id = ?", array($id));       
        $documento = $query->result()[0];        
        if (unlink("./documentos/".$documento->arquivo)) {
            $query = $this->db->query("DELETE FROM documento WHERE id = ".$id.";");        
        }
        header("Location: /documento/index/".$pessoa_id);
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
        $pessoa_id = $this->input->post("pessoa_id");

        $config['upload_path']          = './documentos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 3000;
        $config['max_height']           = 3000;    
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('documento'))
        {
                $data = array('error' => $this->upload->display_errors());
                $data['pessoa_id'] = $pessoa_id;
                $data['upload_data'] = [];
                $this->load->view('innerpages/header');        
                $this->load->view('documento/tela_adicionar', $data);
                $this->load->view('innerpages/footer');
        }
        else
        {
                $file_name = $this->upload->data()["file_name"];      
                $query = $this->db->query("INSERT INTO documento (nome, arquivo, pessoa_id) VALUES(?, ?, ?);", array($nome, $file_name, $pessoa_id));       
                // $query = $this->db->query("INSERT INTO documento (nome, arquivo, pessoa_id) VALUES('".$nome."', '".$file_name."', ".$pessoa_id.");");          
                header("Location: /documento/index/".$pessoa_id);
                // $data = array('upload_data' => $this->upload->data());                               
                // $data['pessoa_id'] = $pessoa_id;
                // $data['error'] = "";
                // $this->load->view('innerpages/header');
                // $this->load->view('documento/tela_adicionar', $data);
                // $this->load->view('innerpages/footer');                
                
        
        }
    }

}
        

/*
        $query = $this->db->query("INSERT INTO documento (nome, documento, pessoa_id) VALUES('".$nome."', '".uniqid(true)."', ".$pessoa_id.");");
        header("Location: /documento/index/".$pessoa_id);
    }

}*/