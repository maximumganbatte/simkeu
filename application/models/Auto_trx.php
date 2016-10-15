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

}
