<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Pessoa extends CI_Controller {

    public function index()
    {
        $this->load->view('pessoa/index');
    }
    public function tela_adicionar()    {
        
        $this->load->view('pessoa/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('pessoa/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
       
    }
}