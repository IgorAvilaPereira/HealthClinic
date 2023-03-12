<?php
class Atendimento extends CI_Controller {


    public function index()
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("SELECT atendimento.observacao, atendimento.id as id,  to_char(data_hora, 'DD/MM/YYYY HH24:MI:SS') as data_hora, usuario.nome as usuario_nome, usuario.id as usuario_id, pessoa.nome as pessoa_nome, pessoa.id as pessoa_id FROM usuario inner join atendimento on (usuario.id = atendimento.usuario_id) inner join pessoa on (pessoa.id = atendimento.pessoa_id);");
        $data['vetAtendimento'] = $query->result();
        $this->load->view('innerpages/header');
        $this->load->view('atendimento/index', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            redirect('usuario/tela_login');
        }
        $this->load->database();
        $this->load->helper('url'); 
        $data = [];
        $query = $this->db->query('SELECT * FROM pessoa');
        $vetPessoa = $query->result();
        if (count($vetPessoa) > 0) {
            $data['vetPessoa'] = $query->result();
            $query = $this->db->query('SELECT * FROM usuario');
            $data['vetUsuario'] = $query->result();
            $this->load->view('innerpages/header');
            $this->load->view('atendimento/tela_adicionar', $data);
            $this->load->view('innerpages/footer');
        } else  {
            $data["mensagem"] = "nenhuma pessoa cadastrada";
            $this->load->view('innerpages/header');
            $this->load->view('erro', $data);
            $this->load->view('innerpages/footer');
        }
    }
    public function tela_editar($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM pessoa');
        $data['vetPessoa'] = $query->result();
        $query = $this->db->query('SELECT * FROM usuario');
        $data['vetUsuario'] = $query->result();
        $query = $this->db->query("SELECT *, to_char(data_hora, 'MM/DD/YYYY HH12:MI') as data_hora FROM atendimento WHERE id = ".$id);
        $data['atendimento'] = $query->result()[0]; 
        $this->load->view('innerpages/header');
        $this->load->view('atendimento/tela_editar', $data);
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
          $observacao = $this->input->post("observacao");
          $usuario_id = $this->input->post("usuario_id");
          $pessoa_id = $this->input->post("pessoa_id");
          $query = $this->db->query("UPDATE atendimento SET observacao = '".$observacao."', usuario_id = ".$usuario_id.", pessoa_id = ".$pessoa_id." WHERE id = ".$id.";");        
          header("Location: /atendimento/index");  
    }
    public function remover($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("SELECT * FROM arquivo WHERE atendimento_id = ".$id.";");        
        $vetArquivo = $query->result();       
        $query = ""; 
        if (count($vetArquivo) > 0) {
            foreach($vetArquivo as $arquivo){
                if (unlink("./arquivos/".$arquivo->arquivo)) {
                    $query.="DELETE FROM arquivo WHERE id = ".$id.";";
                }
            }
        }
        $query = $this->db->query("BEGIN;".$query."DELETE FROM atendimento WHERE id = ".$id."; COMMIT;");        
        header("Location: /atendimento/index");

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
        $observacao = $this->input->post("observacao");
        $usuario_id = $this->input->post("usuario_id");
        $pessoa_id = $this->input->post("pessoa_id");
        $query = $this->db->query("INSERT INTO atendimento (observacao, usuario_id, pessoa_id) VALUES('".$observacao."', ".$usuario_id.", ".$pessoa_id.");");
        header("Location: /atendimento/index");
    }
}