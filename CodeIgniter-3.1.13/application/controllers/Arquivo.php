<?php
// atendimento_arquivo
class Arquivo extends CI_Controller {

    public function index($atendimento_id = 0)
    {
        $this->load->database();
        $this->load->helper('url'); 
        // $data['vetAtendimento'] = $query->result();
        $this->load->view('innerpages/header');
        // $this->load->view('atendimento/index', $data);
        $this->load->view('arquivo/index');
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        // $this->load->view('arquivo/tela_adicionar', $data);
        $this->load->view('arquivo/tela_adicionar');
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        // $this->load->view('arquivo/tela_adicionar', $data);
        $this->load->view('arquivo/tela_editar');
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        // colocar quase tudo isso modelo
        $this->load->database();
        $this->load->helper('url'); 
        // $form_data = $this->input->post(); 
        header("Location: /arquivo/index/".$atendimento_id);
    }

    public function remover($id)    {
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
        // $observacao = $this->input->post("observacao");
        // $usuario_id = $this->input->post("usuario_id");
        // $pessoa_id = $this->input->post("pessoa_id");
        // $query = $this->db->query("INSERT INTO atendimento (observacao, usuario_id, pessoa_id) VALUES('".$observacao."', ".$usuario_id.", ".$pessoa_id.");");
        header("Location: /arquivo/index/".$atendimento_id);
    }

}