<?php

class Pessoa extends CI_Controller {

    public function foto($pessoa_id){
        $this->load->helper('download');
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM pessoa where id = ?;', array($pessoa_id));
        $pessoa = $query->result()[0];
        if (!empty($pessoa->foto)){
            force_download('./fotos/'.$pessoa->foto, NULL);
        } 
    }

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
        $config['base_url'] = '/pessoa/index/';
        $query = $this->db->query('SELECT count(*) as qtde FROM pessoa');        
        $config['total_rows'] = $query->result()[0]->qtde;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);                
        $query = $this->db->query('SELECT * FROM pessoa order by nome LIMIT ? OFFSET ?', array($limit, $offset*$limit));
        $data['pagination'] = $this->pagination->create_links();
        // $query = $this->db->query('SELECT * FROM pessoa order by nome');
        $data['vetPessoa'] = $query->result();       
        $this->load->view('innerpages/header');
        $this->load->view('pessoa/index', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $data['error'] = "";
        $data['upload_data'] = [];
        $this->load->view('innerpages/header');
        $this->load->view('pessoa/tela_adicionar', $data);        
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
        // $query = $this->db->query('SELECT * FROM pessoa WHERE id = '.$id);
        $query = $this->db->query("SELECT * FROM pessoa WHERE id = ?;", array($id));       
        $data['pessoa'] = $query->result()[0]; 
        $this->load->view('innerpages/header');
        $this->load->view('pessoa/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    public function editar()    
    {
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
        $data_nascimento = $this->input->post("data_nascimento");
        $cpf = $this->input->post("cpf");
        $rg = $this->input->post("rg");
        $rua = $this->input->post("rua");
        $bairro = $this->input->post("bairro");
        $complemento = $this->input->post("complemento");
        $cep =  $this->input->post("cep");
        $sexo =  $this->input->post("sexo");
    // Foto: <input type="file" name="foto">  <br>
        // $query = $this->db->query("UPDATE pessoa SET nome = '".$nome."',  data_nascimento = '".$data_nascimento."', cpf = '".$cpf."', rg='".$rg."', rua ='".$rua."', bairro = '".$bairro."', complemento = '".$complemento."', cep = '".$cep."', sexo = '".$sexo."' where id = ".$id.";");        
        $query = $this->db->query("UPDATE pessoa SET nome = ?,  data_nascimento = ?, cpf = '".$cpf."', rg=?, rua = ?, bairro = ?, complemento = ?, cep = ?, sexo = ? where id = ?;", array($nome, $data_nascimento, $rg, $rua, $bairro, $complemento, $cep, $sexo, $id));       
        header("Location: /pessoa/index");   
    }
    public function remover($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        // $query = $this->db->query("SELECT * FROM pessoa WHERE id = ".$id.";");        
        $query = $this->db->query("SELECT * FROM pessoa WHERE id = ?;", array($id));       

        $pessoa = $query->result()[0];    
        $foto = $pessoa->foto;
        if (!empty($foto)) {
            unlink("./fotos/".$foto);            
        }
        // $query = $this->db->query("SELECT * FROM documento WHERE pessoa_id = ".$id.";");        
        $query = $this->db->query("SELECT * FROM documento WHERE pessoa_id = ?;", array($id));       

        $vetDocumento = $query->result();               
        $query = ""; 
        if (count($vetDocumento) > 0) {
            foreach($vetDocumento as $documento){
                if (unlink("./documentos/".$documento->arquivo)) {
                    $query.="DELETE FROM documento WHERE id = ".$id.";";
                }
            }
        }        
        $query = $this->db->query("BEGIN;".$query."DELETE FROM pessoa WHERE id = ".$id."; COMMIT;");                
        header("Location: /pessoa/index");        
    }
    public function adicionar()    
    {      
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = ((empty($this->input->post("nome"))) ? NULL : $this->input->post("nome"));
        $data_nascimento = ((empty($this->input->post("data_nascimento"))) ? NULL : $this->input->post("data_nascimento"));       
        $cpf =  ((empty($this->input->post("cpf"))) ? NULL : $this->input->post("cpf"));       
        $rg =  ((empty($this->input->post("rg"))) ? NULL : $this->input->post("rg"));       
        $rua =  ((empty($this->input->post("rua"))) ? NULL : $this->input->post("rua"));       
        $bairro =  ((empty($this->input->post("bairro"))) ? NULL : $this->input->post("bairro"));       
        $complemento = ((empty($this->input->post("complemento"))) ? NULL : $this->input->post("complemento"));       
        $cep =  ((empty($this->input->post("cep"))) ? NULL : $this->input->post("cep"));       
        $sexo = ((empty($this->input->post("sexo"))) ? NULL : $this->input->post("sexo"));       

        $config['upload_path']          = './fotos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 3000;
        $config['max_height']           = 3000;    
        $config['encrypt_name'] = TRUE;
    
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
        {
                // $data = array('error' => $this->upload->display_errors());
                // $data['upload_data'] = [];
                // $this->load->view('innerpages/header');        
                // $this->load->view('documento/tela_adicionar', $data);
                // $this->load->view('innerpages/footer');
                // die("ok");
                // $query = $this->db->query("INSERT INTO pessoa (nome, data_nascimento, cpf, rg, rua, bairro, complemento, cep, sexo) VALUES ( '".$nome."', '".$data_nascimento."', '".$cpf."', '".$rg."','".$rua."','".$bairro."','".$complemento."', '".$cep."', '".$sexo."')");        
                $query = $this->db->query("INSERT INTO pessoa (nome, data_nascimento, cpf, rg, rua, bairro, complemento, cep, sexo) VALUES (?, ?, ?, ?,?,?,?, ?, ?)", array($nome, $data_nascimento, $cpf, $rg, $rua, $bairro, $complemento, $cep, $sexo));      
                header("Location: /pessoa/index");   
        }
        else
        {
                $file_name = $this->upload->data()["file_name"];          
                // $query = $this->db->query("INSERT INTO pessoa (foto, nome, data_nascimento, cpf, rg, rua, bairro, complemento, cep, sexo) VALUES ('".$file_name."', '".$nome."', '".$data_nascimento."', '".$cpf."', '".$rg."','".$rua."','".$bairro."','".$complemento."', '".$cep."', '".$sexo."')");        
                $query = $this->db->query("INSERT INTO pessoa (foto, nome, data_nascimento, cpf, rg, rua, bairro, complemento, cep, sexo) VALUES (?, ?, ?, ?, ?,?,?,?, ?, ?)", array($file_name, $nome, $data_nascimento, $cpf, $rg, $rua, $bairro, $complemento, $cep, $sexo));      
                header("Location: /pessoa/index");    
        }
    }
}