<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Akun $Akun
 * @property Auto_trx $Auto_trx
 */
class Manajemen_akun extends CI_Controller {

    public function __construct() {
        parent::__construct(); 
        $this->load->model('Akun');
        $this->load->model('Auto_trx');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function view() {
        $aksi = $this->input->post('aksi', TRUE);
        $kode_akun = $this->input->post('kode_akun', TRUE);
        $nama_akun = $this->input->post('nama_akun', TRUE);
        $kode_akun_up = $this->input->post('kode-akun-up', TRUE);
        if ($aksi && $kode_akun) {
            if ($aksi === 'ubah') {
                $this->Akun->ubahAkun($kode_akun, $nama_akun);
            } else if ($aksi === 'hapus') {
                $this->Akun->hapusAkun($kode_akun);
            }
        } else {
            if ($kode_akun && $nama_akun) {
                $this->Akun->tambahAkun($kode_akun, $nama_akun, $kode_akun_up);
            }

            $data['view'] = 'manajemen_akun/tambah_akun';
            $this->load->view('layout', $data);
        }
    }

    public function auto() {
//        echo $this->Auto_trx->tambahTrx_auto("tes");
//        echo $this->Auto_trx->getUUID();
        
        $nama_transaksi = $this->input->post('nama_transaksi', TRUE);
        $nama_debet = $this->input->post('nama_debet', TRUE);
        $kode_akun_kredit = $this->input->post('kode_akun_kredit', TRUE);
        $nama_kredit = $this->input->post('nama_kredit', TRUE);
        $kode_akun_debet = $this->input->post('kode_akun_debet', TRUE);
        $aksi = $this->input->post('aksi', TRUE);

        if ($nama_transaksi && $nama_debet && $kode_akun_debet && $nama_kredit && $kode_akun_kredit && $aksi) {
            if($aksi === 'tambah'){
                $id_trx_auto = $this->Auto_trx->getUUID();
                $this->Auto_trx->tambahTrx_auto($id_trx_auto, $nama_transaksi);
                
                $id_trx_auto_jenis_d = $this->Auto_trx->getUUID();
                $this->Auto_trx->tambahTrx_auto_jenis($id_trx_auto_jenis_d, $id_trx_auto, "D", $nama_debet);
                $kode_akun_debets = explode(',', $kode_akun_debet);
                for($i = 0; $i < count($kode_akun_debets); $i++){
                    $this->Auto_trx->tambahAkun_trx_auto_jenis($kode_akun_debets[$i], $id_trx_auto_jenis_d);
                }
                
                $id_trx_auto_jenis_k = $this->Auto_trx->getUUID();
                $this->Auto_trx->tambahTrx_auto_jenis($id_trx_auto_jenis_k, $id_trx_auto, "K", $nama_kredit);
                $kode_akun_kredits = explode(',', $kode_akun_kredit);
                for($i = 0; $i < count($kode_akun_kredits); $i++){
                    $this->Auto_trx->tambahAkun_trx_auto_jenis($kode_akun_kredits[$i], $id_trx_auto_jenis_k);
                }
            }
        } else {
            $data['view'] = 'manajemen_akun/akun_otomatis';
            $this->load->view('layout', $data);
        }
    }

    //-------------------------------------------------------------------------

    public function dataakun_ct() {
        $i = 1;
        $data = array();
        $dataup = $this->Akun->getAkun_up();
        $data[0]['id'] = 0;
        $data[0]['text'] = "Tidak ada";

        foreach ($dataup as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->kode . ' - ' . $val->nama;
            $datadl = $this->dataakun_ct_dl($val->kode);
            if (count($datadl) > 0) {
                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        echo json_encode($data);
    }

    public function dataakun_tg() {
        $i = 0;
        $data = array();
        $dataup = $this->Akun->getAkun_up();
        foreach ($dataup as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->nama;
            $data[$i]['edit'] = '<button type="submit" class="btn btn-round btn-warning btn-xs"><i class="fa fa-pencil"></i></button>';
            $data[$i]['delete'] = '<button type="submit" class="btn btn-round btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $datadl = $this->dataakun_tg_dl($val->kode);
            if (count($datadl) > 0) {
//                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        echo json_encode($data);
    }

    public function dataakun_mct() {
        $i = 0;
        $data = array();
        $dataup = $this->Akun->getAkun_up();

        foreach ($dataup as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->kode . ' - ' . $val->nama;
            $datadl = $this->dataakun_mct_dl($val->kode);
            if (count($datadl) > 0) {
//                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        echo json_encode($data);
    }

    private function dataakun_mct_dl($kode_up) {
        $i = 0;
        $data = array();
        $datadl = $this->Akun->getAkun_by_up($kode_up);
        foreach ($datadl as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->kode . ' - ' . $val->nama;
            $data[$i]['delete'] = "x";
            $datadl = $this->dataakun_mct_dl($val->kode);
            if (count($datadl) > 0) {
//                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        return $data;
    }

    private function dataakun_ct_dl($kode_up) {
        $i = 0;
        $data = array();
        $datadl = $this->Akun->getAkun_by_up($kode_up);
        foreach ($datadl as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->kode . ' - ' . $val->nama;
            $data[$i]['delete'] = "x";
            $datadl = $this->dataakun_ct_dl($val->kode);
            if (count($datadl) > 0) {
                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        return $data;
    }

    private function dataakun_tg_dl($kode_up) {
        $i = 0;
        $data = array();
        $datadl = $this->Akun->getAkun_by_up($kode_up);
        foreach ($datadl as $val) {
            $data[$i]['id'] = $val->kode;
            $data[$i]['text'] = $val->nama;
            $data[$i]['edit'] = '<button type="submit" class="btn btn-round btn-warning btn-xs"><i class="fa fa-pencil"></i></button>';
            $data[$i]['delete'] = '<button type="submit" class="btn btn-round btn-danger btn-xs"><i class="fa fa-close"></i></button>';
            $datadl = $this->dataakun_tg_dl($val->kode);
            if (count($datadl) > 0) {
//                $data[$i]['state'] = "closed";
                $data[$i]['children'] = $datadl;
            }
            $i++;
        }

        return $data;
    }

}
