<?php

class Usuario extends CI_Controller {     
    // public $baseURL = 'https://mydomain.com/path/'; 
      

    public function index($offset = 0)
    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 

        
        $this->load->library('pagination');
        $limit = 10;
        $config['base_url'] = '/usuario/index/';
        $query = $this->db->query('SELECT count(*) as qtde FROM usuario');        
        $config['total_rows'] = $query->result()[0]->qtde;
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);                
        $query = $this->db->query('SELECT * FROM usuario order by nome LIMIT ? OFFSET ?', array($limit, $offset*$limit));

        $data['pagination'] = $this->pagination->create_links();
                
        $data['usuario_id'] = $this->session->userdata('usuario')->id;
        $data['vetUsuario'] = $query->result();

        $this->load->view('innerpages/header');
        $this->load->view('usuario/index', $data);        
        $this->load->view('innerpages/footer');
    }
    public function tela_adicionar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['vetSetor'] = $query->result();  
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();  
        $this->load->view('innerpages/header');   
        $this->load->view('usuario/tela_adicionar', $data);
        $this->load->view('innerpages/footer');
    }
    public function tela_editar($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $query = $this->db->query('SELECT * FROM setor');
        $data['error'] = "";
        $data['vetSetor'] = $query->result();  
        // $query = $this->db->query('SELECT * FROM usuario WHERE usuario.id = '.$id);
        $query = $this->db->query("SELECT * FROM usuario WHERE usuario.id = ?", array($id));    
        $data['usuario'] = $query->result()[0];
        $query = $this->db->query('SELECT * FROM perfil');
        $data['vetPerfil'] = $query->result();  
        // $query = $this->db->query('SELECT perfil_id as id FROM usuario_perfil where usuario_id='.$id);
        $query = $this->db->query("SELECT perfil_id as id FROM usuario_perfil where usuario_id=?", array($id));    
        $vetUsuarioPerfil = $query->result();  
        $data['vetUsuarioPerfil'] = [];
        foreach($vetUsuarioPerfil as $perfil){
            $data['vetUsuarioPerfil'][] = (int) $perfil->id;
        }        
        $this->load->view('innerpages/header'); 
        $this->load->view('usuario/tela_editar', $data);
        $this->load->view('innerpages/footer');
    }
    public function editar()    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $id = $this->input->post("id");
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $setor_id = $this->input->post("setor_id");
        // $senha_antiga = $this->input->post("senha_antiga");
        $senha = $this->input->post("senha");        
        // $senha_nova =  ((empty($this->input->post("senha_nova"))) ? $this->input->post("senha_antiga") : $this->input->post("senha_nova"));
        
        // $query = $this->db->query("SELECT * FROM usuario WHERE id = ? and senha = md5(?);", array($id, $senha_antiga));               
        // if (count($query->result()) > 0){
            $query = $this->db->query("UPDATE usuario SET nome = ?,  email = ?, senha = md5(?), setor_id = ? WHERE id = ?;", array($nome, $email, $senha, $setor_id, $id));       
            $vetPerfil = $this->input->post("perfil_id"); 
            $usuario_id = $id;    
            if (is_array($vetPerfil)){
                if (count($vetPerfil)>0){                                   
                    $sql = "";
                    foreach($vetPerfil as $perfil_id){
                        $sql.="INSERT INTO usuario_perfil (usuario_id, perfil_id) VALUES (".$usuario_id.",".$perfil_id.");";
                    }
                    $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";".$sql."COMMIT;");        
                } else {
                    $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";COMMIT;");        
                }
            }
            else {
                $query = $this->db->query("BEGIN; DELETE FROM usuario_perfil where usuario_id = ".$usuario_id.";COMMIT;");        
            }
            header("Location: /usuario/index");               
        /*} else {
            $data['error'] = "senha antiga incorreta";
            $query = $this->db->query('SELECT * FROM setor');
            // $data['error'] = "";
            $data['vetSetor'] = $query->result();  
            // $query = $this->db->query('SELECT * FROM usuario WHERE usuario.id = '.$id);
            $query = $this->db->query("SELECT * FROM usuario WHERE usuario.id = ?", array($id));    
            $data['usuario'] = $query->result()[0];
            $query = $this->db->query('SELECT * FROM perfil');
            $data['vetPerfil'] = $query->result();  
            // $query = $this->db->query('SELECT perfil_id as id FROM usuario_perfil where usuario_id='.$id);
            $query = $this->db->query("SELECT perfil_id as id FROM usuario_perfil where usuario_id=?", array($id));    
            $vetUsuarioPerfil = $query->result();  
            $data['vetUsuarioPerfil'] = [];
            foreach($vetUsuarioPerfil as $perfil){
                $data['vetUsuarioPerfil'][] = (int) $perfil->id;
            }        
            $this->load->view('innerpages/header'); 
            $this->load->view('usuario/tela_editar', $data);
            $this->load->view('innerpages/footer');
        }   */    
    }
    public function remover($id)    {
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }
        $this->load->database();
        $this->load->helper('url');         
        // if ($this->session->usuario->id != $id) {            
            $query = $this->db->query("DELETE FROM usuario WHERE id = ?", array($id));       
        /*} else {
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }*/
        header("Location: /usuario/index");    
    }
    public function logout()    {                
        $this->load->database();
        $this->load->helper('url');      
        $this->load->library('session'); 
        $this->load->helper('captcha');             
        if($this->session->userdata('captcha_filename')) {
            if (file_exists("./captcha/".$this->session->captcha_filename)) {
                unlink("./captcha/".$this->session->captcha_filename);            
            }
        }
        $this->session->sess_destroy();
        echo "<h1>Logout realizado com Sucesso!</h1> <a href='/welcome/index'> Entrar novamente?</a>";
        // session_start();
        // $word = array_merge(range('a', 'z'), range('A', 'Z'));
        // shuffle($word);    	
        // $word = substr(implode($word), 0, 5);
        // $vals = array(
        //     'word'          => trim($word),
        //     'img_path'      => './captcha/',
        //     'img_url'       => '/captcha/',
        //     'font_path'     => './path/to/fonts/texb.ttf',
        //     'img_width'     => '150',
        //     'img_height'    => 30,
        //     'expiration'    => 7200,
        //     'word_length'   => 5,
        //     'font_size'     => 16,
        //     'img_id'        => 'Imageid',
        //           'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

    
        //     // White background and border, black text and red grid
        //     'colors'        => array(
        //             'background' => array(255, 255, 255),
        //             'border' => array(255, 255, 255),
        //             'text' => array(0, 0, 0),
        //             'grid' => array(255, 40, 40)
        //     )
        // );	
        // $cap = @create_captcha($vals);
        // $this->session->captcha = trim($word);
        // $data['error'] = "";
        // $data['captcha'] = $cap['image'];	
        // $this->session->captcha_filename = $cap['filename'];	
        // echo trim($word);
        // $this->load->view('usuario/tela_login', $data);
    }
    public function tela_login(){          
            $this->load->database();
            $this->load->helper('url');      
            $this->load->library('session'); 
            $this->load->helper('captcha');
            if($this->session->userdata('captcha_filename')) {
                if (file_exists("./captcha/".$this->session->captcha_filename)) {
                    unlink("./captcha/".$this->session->captcha_filename);           
                } 
            }                    
            $this->session->sess_destroy();
            session_start();
            $word = array_merge(range('a', 'z'), range('A', 'Z'));
            shuffle($word);    	
            $word = substr(implode($word), 0, 5);
            $vals = array(
                'word'          => trim($word),
                'img_path'      => './captcha/',
                'img_url'       => '/captcha/',
                'font_path'     => './path/to/fonts/texb.ttf',
                'img_width'     => '150',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 5,
                'font_size'     => 16,
                'img_id'        => 'Imageid',
                      'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        
                // White background and border, black text and red grid
                'colors'        => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 40, 40)
                )
            );	
            $cap = @create_captcha($vals);
            $this->session->captcha = trim($word);
            $data['error'] = "";
            $data['captcha'] = $cap['image'];	            
            $this->session->captcha_filename = $cap['filename'];	
            echo trim($word);
            $this->load->view('usuario/tela_login', $data);
        
    }
    //     $this->load->helper('captcha');
	// 	$word = array_merge(range('a', 'z'), range('A', 'Z'));
    // 	shuffle($word);    	

	// 	$word = substr(implode($word), 0, 5);
	// 	$vals = array(
	// 		'word'          => $word,
	// 		'img_path'      => './captcha/',
	// 		'img_url'       => 'http://localhost:8081/captcha/',
	// 		'font_path'     => './path/to/fonts/texb.ttf',
	// 		'img_width'     => '150',
	// 		'img_height'    => 30,
	// 		'expiration'    => 7200,
	// 		'word_length'   => 5,
	// 		'font_size'     => 16,
	// 		'img_id'        => 'Imageid',
	// 		'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzAB',
	
	// 		// White background and border, black text and red grid
	// 		'colors'        => array(
	// 				'background' => array(255, 255, 255),
	// 				'border' => array(255, 255, 255),
	// 				'text' => array(0, 0, 0),
	// 				'grid' => array(255, 40, 40)
	// 		)
	// 	);	
	// 	$cap = @create_captcha($vals);

    //     // $this->load->view('innerpages/header');
	// 	// $this->load->view('home');
    //     // $this->load->view('innerpages/footer');

	// 	$this->load->library('session');
    //     if(!$this->session->userdata('usuario')){
    //         $this->session->sess_destroy();
    //         // header("Location: /usuario/tela_login");
	// 		$data['error'] = "";	
	// 		$this->session->captcha = $word;
	// 		// echo $this->session->captcha;
	// 		$data['captcha'] = $cap['image'];			
	// 		$this->load->view('usuario/tela_login', $data);
	// 		// echo var_dump($cap);
    //     }  else {
	// 		$this->load->view('innerpages/header');
	// 	    $this->load->view('home');
    //         $this->load->view('innerpages/footer');
	// 	}
    // }

    public function login()    {        
        $this->load->database();
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->load->helper('captcha');

        $form_data = $this->input->post(); 
        $email = $this->input->post("email");        
        $senha = $this->input->post("senha");      
        $captcha = $this->input->post("captcha");  
        echo "preenchido".$captcha."<br>";
        echo "sessao".	$this->session->captcha;
        // die();

        if ($this->session->userdata('captcha')){
            if (strcmp($this->session->captcha, $captcha) == 0){        
                $query = $this->db->query("SELECT * FROM usuario WHERE email = ? and senha = md5(?);", array(trim($email), trim($senha)));       
                if (count($query->result()) > 0){                    
                    $this->session->usuario = $query->result()[0];
                    // pendente => colocar os perfis na sessao e permitir ou de acordo.
                    // $query = $this->db->query("SELECT perfil.id, perfil.nome, perfil.adicionar, perfil.visualizar, perfil.remover, perfil.editar FROM usuario inner join usuario_perfil on (usuario.id = usuario_perfil.usuario_id) inner join perfil on (perfil.id = usuario_perfil.perfil_id) WHERE usuario.id = ?;", array($this->session->usuario->id));       
                    // $this->session->vetPerfil = $query->result();
                    // echo "<pre>";
                    //     print_r($this->session->vetPerfil);
                    // echo "</pre>";
                    // echo var_dump($query->result());            
                    // if (!empty($foto)) {
                        // if($this->session->userdata('captcha_filename')) {
                        //     unlink("./captcha/".$this->session->captcha_filename);            
                        // }         
                        // $query = $this->db->query("UPDATE pessoa SET foto = NULL WHERE id = ?;", array($id));       
                    // }

                    $this->load->view('innerpages/header');
                    $this->load->view('home');
                    $this->load->view('innerpages/footer');
                } else {
                    // return redirect()->to('/welcome/index'); 
                    if($this->session->userdata('captcha_filename')) {
                        if (file_exists("./captcha/".$this->session->captcha_filename)) {
                            unlink("./captcha/".$this->session->captcha_filename);           
                        }
                    }
                    $this->session->sess_destroy();
                    session_start();


                    // echo "login icorreto";
                    $data['error'] = "Login incorreto e/ou captcha incorreta";

                    $word = array_merge(range('a', 'z'), range('A', 'Z'));
                    shuffle($word);    	
                    $word = substr(implode($word), 0, 5);
                  
                    $vals = array(
                        'word'          => trim($word),
                        'img_path'      => './captcha/',
                        'img_url'       => '/captcha/',
                        'font_path'     => './path/to/fonts/texb.ttf',
                        'img_width'     => '150',
                        'img_height'    => 30,
                        'expiration'    => 7200,
                        'word_length'   => 5,
                        'font_size'     => 16,
                        'img_id'        => 'Imageid',
                              'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                
                        // White background and border, black text and red grid
                        'colors'        => array(
                                'background' => array(255, 255, 255),
                                'border' => array(255, 255, 255),
                                'text' => array(0, 0, 0),
                                'grid' => array(255, 40, 40)
                        )
                    );	
                    $cap = @create_captcha($vals);
                    $this->session->captcha = trim($word);
                    echo trim($word);

                    $data['captcha'] = $cap['image'];	
                    $this->session->captcha_filename = $cap['filename'];	
                    $this->load->view('usuario/tela_login', $data);
                } 
            } else {
                if($this->session->userdata('captcha_filename')) {
                    if (file_exists("./captcha/".$this->session->captcha_filename)) {
                        unlink("./captcha/".$this->session->captcha_filename);            
                    }
                }   

                // return redirect()->to('/welcome/index'); 
                // echo "captcha n bate";
                // $this->session->sess_destroy();
                $this->session->sess_destroy();
                session_start();
                $data['error'] = "Login incorreto e/ou captcha incorreta";
                $word = array_merge(range('a', 'z'), range('A', 'Z'));
                shuffle($word);    	
                $word = substr(implode($word), 0, 5);
                $vals = array(
                    'word'          => trim($word),
                    'img_path'      => './captcha/',
                    'img_url'       => '/captcha/',
                    'font_path'     => './path/to/fonts/texb.ttf',
                    'img_width'     => '150',
                    'img_height'    => 30,
                    'expiration'    => 7200,
                    'word_length'   => 5,
                    'font_size'     => 16,
                    'img_id'        => 'Imageid',
                          'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            
                    // White background and border, black text and red grid
                    'colors'        => array(
                            'background' => array(255, 255, 255),
                            'border' => array(255, 255, 255),
                            'text' => array(0, 0, 0),
                            'grid' => array(255, 40, 40)
                    )
                );	
                $cap = @create_captcha($vals);
                $this->session->captcha = trim($word);
                echo trim($word);

                $data['captcha'] = $cap['image'];	
                $this->session->captcha_filename = $cap['filename'];	
                $this->load->view('usuario/tela_login', $data);
            } 
        }
        else {
            if($this->session->userdata('captcha_filename')) {
                if (file_exists("./captcha/".$this->session->captcha_filename)) {
                    unlink("./captcha/".$this->session->captcha_filename);            
                }
            }      

            // return redirect()->to('/welcome/index'); 
            // echo "captcha n esta na sessao";
            // $this->session->sess_destroy();
            $this->session->sess_destroy();
			session_start();
            $word = array_merge(range('a', 'z'), range('A', 'Z'));
            shuffle($word);    	
            $word = substr(implode($word), 0, 5);
            $vals = array(
                'word'          => trim($word),
                'img_path'      => './captcha/',
                'img_url'       => '/captcha/',
                'font_path'     => './path/to/fonts/texb.ttf',
                'img_width'     => '150',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 5,
                'font_size'     => 16,
                'img_id'        => 'Imageid',
                      'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        
                // White background and border, black text and red grid
                'colors'        => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 40, 40)
                )
            );	
            $cap = @create_captcha($vals);
            $this->session->captcha = trim($word);
            $data['captcha'] = $cap['image'];	
            $this->session->captcha_filename = $cap['filename'];	
            echo trim($word);

            $data['error'] = "Login incorreto e/ou captcha incorreta";
            $this->load->view('usuario/tela_login', $data);
        } 
    }
    public function adicionar()    {   
        $this->load->library('session');
        if(!$this->session->userdata('usuario')){
            $this->session->sess_destroy();
            header("Location: /usuario/tela_login");
        }     
        $this->load->database();
        $this->load->helper('url'); 
        $form_data = $this->input->post();        
        $nome = $this->input->post("nome");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $setor_id = $this->input->post("setor_id");
        $vetPerfil = $this->input->post("perfil_id");        
        // $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES ('".$nome."', '".$email."', md5('".$senha."'), ".$setor_id.") RETURNING id;");        
        $query = $this->db->query("INSERT INTO usuario (nome, email, senha, setor_id) VALUES (?, ?, md5(?), ?) RETURNING id;", array($nome, $email, $senha, $setor_id));       
        if (count($vetPerfil)>0){
            $usuario_id = (int) $query->result()[0]->id;            
            $sql = "";
            foreach($vetPerfil as $perfil_id){
                $sql.="INSERT INTO usuario_perfil (usuario_id, perfil_id) VALUES (".$usuario_id.",".$perfil_id.");";
            }
            $query = $this->db->query("BEGIN;".$sql."COMMIT;");        
        }
        header("Location: /usuario/index");    
    }
}