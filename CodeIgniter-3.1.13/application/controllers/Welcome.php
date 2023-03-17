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
	{	/*
		$this->load->helper('captcha');
		$vals = array(
			'word'          => 'Random word',
			'img_path'      => './captcha/',
			'img_url'       => 'http://localhost:8081/captcha/',
			'font_path'     => './path/to/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzAB',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
	);	*/
        // $this->load->view('innerpages/header');
		// $this->load->view('home');
        // $this->load->view('innerpages/footer');

		$this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            // header("Location: /usuario/tela_login");
			$data['error'] = "";
			// $cap = create_captcha($vals);
			// $data['cap'] = $cap;			
			// echo $cap['image'];
			$this->load->view('usuario/tela_login', $data);
        }  else {
			$this->load->view('innerpages/header');
		    $this->load->view('home');
            $this->load->view('innerpages/footer');
		}
		
	}
}
