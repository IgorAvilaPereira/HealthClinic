<?php

// require_once ('./libraries/jpgraph-4.3.5/src/jpgraph.php');

// require_once ('./libraries/jpgraph-4.3.5/src/jpgraph_line.php');

class Relatorio extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $this->load->helper('url');         
        // $this->load->library('jpgraph-4.4.1');
 
        $data = [];
        $query = $this->db->query("SELECT sexo, count(*) as qtde FROM pessoa group by sexo order by sexo;");        
        $data['dados'] = $query->result();

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