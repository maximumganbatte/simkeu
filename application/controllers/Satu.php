<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Satu extends CI_Controller {

    public function coba() {
        $data['view'] = 'satu/coba';
        $this->load->view('layout', $data);
    }
    
    public function cobalagi() {
        $data['view'] = 'satu/cobalagi';
        $this->load->view('layout', $data);
    }
    
    public function cobaterus() {
        $data['view'] = 'satu/cobaterus';
        $this->load->view('layout', $data);
    }

}
