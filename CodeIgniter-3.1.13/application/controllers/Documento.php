<?php
// pessoa_documento
class documento extends CI_Controller {

    public function index($pessoa_id = 0)
    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("SELECT * FROM documento WHERE pessoa_id = ".$pessoa_id.";");        
        $data['vetDocumento'] = $query->result();
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('innerpages/header');
        $this->load->view('documento/index', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar($pessoa_id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('documento/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id, $pessoa_id)      {
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->view('innerpages/header');
        $query = $this->db->query("SELECT * FROM documento WHERE id = ".$id.";");        
        $data['documento'] = $query->result()[0];
        $data['pessoa_id'] = $pessoa_id;
        $this->load->view('documento/tela_editar', $data);        
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $id = $this->input->post("id");
        $pessoa_id = $this->input->post("pessoa_id");
        $query = $this->db->query("UPDATE documento SET nome = '".$nome."' WHERE id = ".$id.";");
        header("Location: /documento/index/".$pessoa_id);
    }

    public function remover($id, $pessoa_id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM documento WHERE id = ".$id.";");        
        header("Location: /documento/index/".$pessoa_id);
    }

    public function adicionar()    {        
        // colocar quase tudo isso modelo
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        // $usuario_id = $this->input->post("usuario_id");
        $pessoa_id = $this->input->post("pessoa_id");
        $query = $this->db->query("INSERT INTO documento (nome, arquivo, pessoa_id) VALUES('".$nome."', '".uniqid(true)."', ".$pessoa_id.");");
        header("Location: /documento/index/".$pessoa_id);
    }

}