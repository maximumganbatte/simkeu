<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Auto_trx $Auto_trx
 */
class Pengeluaran_kas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auto_trx');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function view() {
        $data['view'] = 'jurnal/pengeluaran/view';
        $this->load->view('layout', $data);
    }

    public function auto() {
        $data['trx_auto'] = $this->Auto_trx->getTrx_auto();
        $data['view'] = 'jurnal/pengeluaran/auto';
        $this->load->view('layout', $data);
    }
    
    public function manual() {
        $data['view'] = 'jurnal/pengeluaran/manual';
        $this->load->view('layout', $data);
    }
    
}
