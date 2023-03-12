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
        $this->load->view('innerpages/header');
        $data['atendimento_id'] = $atendimento_id;
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
        // colocar quase tudo isso modelo
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        // $usuario_id = $this->input->post("usuario_id");
        $atendimento_id = $this->input->post("atendimento_id");
        $query = $this->db->query("INSERT INTO arquivo (nome, arquivo, atendimento_id) VALUES('".$nome."', '".uniqid(true)."', ".$atendimento_id.");");
        header("Location: /arquivo/index/".$atendimento_id);
    }

}