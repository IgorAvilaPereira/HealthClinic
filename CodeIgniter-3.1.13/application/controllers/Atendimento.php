<?php
class Atendimento extends CI_Controller {



    public function index()
    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT atendimento.id as id, data_hora, usuario.nome as usuario_nome, pessoa.nome as pessoa_nome FROM usuario inner join atendimento on (usuario.id = atendimento.usuario_id) inner join pessoa on (pessoa.id = atendimento.pessoa_id)');
        $data['vetAtendimento'] = $query->result();
        $this->load->view('atendimento/index', $data);
    }
    public function tela_adicionar()    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM pessoa');
        $data['vetPessoa'] = $query->result();
        $query = $this->db->query('SELECT * FROM usuario');
        $data['vetUsuario'] = $query->result();
        $this->load->view('atendimento/tela_adicionar', $data);
    }
    public function tela_editar()    
    {        
        $this->load->view('atendimento/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover($id)    {
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query("DELETE FROM atendimento WHERE id = ".$id.";");        
        // header("Location: index");
    }
    public function adicionar()    {        
        // colocar quase tudo isso modelo
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $observacao = $this->input->post("observacao");
        $usuario_id = $this->input->post("usuario_id");
        $pessoa_id = $this->input->post("pessoa_id");
        $query = $this->db->query("INSERT INTO atendimento (observacao, usuario_id, pessoa_id) VALUES('".$observacao."', ".$usuario_id.", ".$pessoa_id.");");
        // errado
        // $this->index();
        // header("Location: index");
    }
}