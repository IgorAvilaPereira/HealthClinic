<?php

class Relatorio extends CI_Controller {

    public function index()
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url');         
        // $this->load->library('jpgraph-4.4.1');
 
        $data = [];
        $query = $this->db->query("SELECT sexo, count(*) as qtde FROM pessoa group by sexo order by sexo;");        
        $data['dados'] = $query->result();

        $query = $this->db->query("SELECT count(*) as qtde FROM atendimento;");        
        $data['qtde_atendimento'] = $query->result()[0];

        $query = $this->db->query("SELECT count(*) as qtde FROM atendimento where extract(month from data_hora) = extract(month from current_timestamp) and extract(year from data_hora) = extract(year from current_timestamp);");        
        $data['qtde_atendimento_mes_ano_corrente'] = $query->result()[0];

        $query = $this->db->query("SELECT sexo, count(*) as qtde FROM atendimento inner join pessoa on (pessoa.id = atendimento.pessoa_id) where extract(month from data_hora) = extract(month from current_timestamp) and extract(year from data_hora) = extract(year from current_timestamp) group by sexo order by sexo;");        
        $data['qtde_atendimento_mes_ano_corrente_por_sexo'] = $query->result();
        
        
        $query = $this->db->query("SELECT count(*) as qtde FROM pessoa;");        
        $data['qtde_pessoa'] = $query->result()[0];

        $this->load->view('innerpages/header');
        $this->load->view('relatorio/index', $data);        
        $this->load->view('innerpages/footer');
    }


    // public function sexo()
    // {
    //     $this->load->database();
    //     $this->load->helper('url'); 
    //     $data = [];
    //     $query = $this->db->query("SELECT sexo, count(*) FROM pessoa group by sexo order by sexo;");        
    //     $data['dados'] = $query->result();
    //     $this->load->view('innerpages/header');
    //     $this->load->view('relatorio/index', $data);        
    //     $this->load->view('innerpages/footer');
    // }
}