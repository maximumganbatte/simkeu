<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Auto_trx extends CI_Model {

    public function getUUID() {
        $this->db->select("uuid_in(md5(random()::text || now()::text)::cstring) as uuid");
        $query = $this->db->get();
        return $query->row()->uuid;
    } 

    public function tambahTrx_auto($id, $nama) {
        $data = array(
            'id' => $id,
            'nama' => $nama
        );

        $this->db->insert('simkeu.trx_auto', $data);
    }
    
    public function tambahTrx_auto_jenis($id, $id_trx_auto, $kode_jenis, $nama) {
        $data = array(
            'id' => $id,
            'id_trx_auto' => $id_trx_auto,
            'kode_jenis' => $kode_jenis,
            'nama' => $nama
        );

        $this->db->insert('simkeu.trx_auto_jenis', $data);
    }
    
    public function tambahAkun_trx_auto_jenis($kode_akun, $id_trx_auto_jenis) {
        $data = array(
            'kode_akun' => $kode_akun,
            'id_trx_auto_jenis' => $id_trx_auto_jenis            
        );

        $this->db->insert('simkeu.akun_trx_auto_jenis', $data);
    }

}
