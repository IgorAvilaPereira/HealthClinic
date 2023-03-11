<?php

class Pages extends CI_Controller {

    // index.php/pages/view
    public function view($page = 'home2')
    {
        $data['teste'] = $page;
        $this->load->view('teste', $data);
    }
}