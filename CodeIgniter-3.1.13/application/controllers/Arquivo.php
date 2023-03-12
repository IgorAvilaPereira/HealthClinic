<?php
// atendimento_arquivo
class Arquivo extends CI_Controller {

    public function index($atendimento_id = 0)
    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("SELECT * FROM arquivo WHERE atendimento_id = ".$atendimento_id.";");        
        $data['vetArquivo'] = $query->result();
        $data['atendimento_id'] = $atendimento_id;
        $this->load->view('innerpages/header');
        $this->load->view('arquivo/index', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar($atendimento_id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $data['atendimento_id'] = $atendimento_id;
        $data['error'] = "";
        $data['upload_data'] = [];
        $this->load->view('innerpages/header');
        $this->load->view('arquivo/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id, $atendimento_id)      {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        $query = $this->db->query("SELECT * FROM arquivo WHERE id = ".$id.";");        
        $data['arquivo'] = $query->result()[0];
        $data['atendimento_id'] = $atendimento_id;
        $this->load->view('arquivo/tela_editar', $data);        
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $id = $this->input->post("id");
        $atendimento_id = $this->input->post("atendimento_id");
        $query = $this->db->query("UPDATE arquivo SET nome = '".$nome."' WHERE id = ".$id.";");
        header("Location: /arquivo/index/".$atendimento_id);
    }

    public function remover($id, $atendimento_id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM arquivo WHERE id = ".$id.";");        
        header("Location: /arquivo/index/".$atendimento_id);
    }

    public function adicionar()    {     
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $atendimento_id = $this->input->post("atendimento_id");

        $config['upload_path']          = './arquivos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 3000;
        $config['max_height']           = 3000;        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('arquivo'))
        {
                $data = array('error' => $this->upload->display_errors());
                $data['atendimento_id'] = $atendimento_id;
                $data['upload_data'] = [];
                $this->load->view('innerpages/header');        
                $this->load->view('arquivo/tela_adicionar', $data);
                $this->load->view('innerpages/footer');
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $data['atendimento_id'] = $atendimento_id;
                $data['error'] = "";
                $this->load->view('innerpages/header');
                $this->load->view('arquivo/tela_adicionar', $data);
                $this->load->view('innerpages/footer');                
                // $query = $this->db->query("INSERT INTO arquivo (nome, arquivo, atendimento_id) VALUES('".$nome."', '".uniqid(true)."', ".$atendimento_id.");");
        
        }
    }

}