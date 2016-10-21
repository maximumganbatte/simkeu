<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Akun $Akun
 * @property Auto_trx $Auto_trx
 */
class Pengeluaran_kas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function view() {
        $data['view'] = 'jurnal/pengeluaran/view';
        $this->load->view('layout', $data);
    }

}
