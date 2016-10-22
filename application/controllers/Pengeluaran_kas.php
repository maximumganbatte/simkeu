<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Akun $Akun
 * @property Auto_trx $Auto_trx
 */
class Pengeluaran_kas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Akun');
        $this->load->model('Auto_trx');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function view() {
        $data['view'] = 'jurnal/pengeluaran/view';
        $this->load->view('layout', $data);
    }

    public function auto() {
        $aksi = $this->input->post('aksi', TRUE);
        $id_trx_auto = $this->input->post('id_trx_auto', TRUE);

        if ($aksi && $id_trx_auto) {
            if ($aksi === 'getakun') {
                $up = $this->Auto_trx->getKode_akun_up_by_id_trx_auto($id_trx_auto, "D");
                $akun = $this->Akun->getAkun_group_up();
                foreach ($up as $val) {
//                    echo "<optgroup label='" . ($val->nama == '' ? '-' : $val->nama) . "'>";
                    echo "<optgroup label='" . $val->nama  . "'>";
                    for ($i = 0; $i < count($akun[$val->kode]['kode']); $i++) {
                        echo "<option value='" . $akun[$val->kode]['kode'][$i] . "'>" . $akun[$val->kode]['nama'][$i] . "</option>";
                    }
                }
            }
        } else {
            $data['trx_auto'] = $this->Auto_trx->getTrx_auto();
            $data['view'] = 'jurnal/pengeluaran/auto';
            $this->load->view('layout', $data);
        }
    }

    public function manual() {
        $data['view'] = 'jurnal/pengeluaran/manual';
        $this->load->view('layout', $data);
    }

}
