<?php
/*
setor
usuario
perfil
pessoa
atendimento
*/
class Perfil extends CI_Controller {
    public function index()
    {
        $this->load->view('perfil/index');
    }
    public function tela_adicionar()    {
        
        $this->load->view('perfil/tela_adicionar', $data);
    }
    public function tela_editar()    {
        
        $this->load->view('perfil/tela_editar', $data);
    }
    public function editar()    {
    }
    public function remover()    {
    }
    public function adicionar()    {        
        // $this->load->view('tela_adicionar', $data);
    }
}