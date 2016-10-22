<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Akun extends CI_Model {

    public function countAkun_by_kode($kode) {
        $query = $this->db->get_where('simkeu.akun', array('kode' => $kode));
        return $query->num_rows();
    }

    public function getAkun_up() {
        $this->db->select("kode, nama");
        $this->db->from('simkeu.akun');
        $this->db->where('kode_up IS NULL');
        $this->db->order_by('kode ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAkun_group_up() {
        $i = 0;
        $up_temp = "-";
        $data = array();
        $this->db->select("kode, nama, CASE WHEN kode_up IS NULL THEN '-' ELSE kode_up END as kode_up");
        $this->db->from('simkeu.akun');
        $this->db->order_by('kode ASC');
        $query = $this->db->get();
        foreach ($query->result() as $val) {
            if ($up_temp != $val->kode_up) {
                $i = 0;
                $up_temp = $val->kode_up;
            }

            $data[$up_temp]['kode'][$i] = $val->kode;
            $data[$up_temp]['nama'][$i] = $val->nama;
            $i++;
        }
        return $data;
    }

    public function getAkun_by_up($kode_up) {
        $this->db->select("kode, nama");
        $this->db->from('simkeu.akun');
        $this->db->where('kode_up', $kode_up);
        $query = $this->db->get();
        return $query->result();
    }

    public function tambahAkun($kode, $nama, $kode_up) {
        if ($this->countAkun_by_kode($kode) == 0 && ($kode_up == 0 || $this->countAkun_by_kode($kode_up) == 1)) {
            $kode_up = $kode_up == 0 ? NULL : $kode_up;
            $data = array(
                'kode' => $kode,
                'nama' => $nama,
                'kode_up' => $kode_up
            );

            $this->db->insert('simkeu.akun', $data);
        }
    }

    public function ubahAkun($kode, $nama) {
        $data = array(
            'nama' => $nama
        );

        $this->db->where('kode', $kode);
        $this->db->update('simkeu.akun', $data);
    }

    public function hapusAkun($kode) {
        $this->db->where('kode', $kode);
        $this->db->delete('simkeu.akun');
    }

}
