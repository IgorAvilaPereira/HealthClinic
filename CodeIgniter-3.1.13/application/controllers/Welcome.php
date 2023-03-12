<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
        // $this->load->view('innerpages/header');
		// $this->load->view('home');
        // $this->load->view('innerpages/footer');

		$this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            // header("Location: /usuario/tela_login");
			$data['error'] = "";
			$this->load->view('usuario/tela_login', $data);
        }  else {
			$this->load->view('innerpages/header');
		    $this->load->view('home');
            $this->load->view('innerpages/footer');
		}
		
	}
}
