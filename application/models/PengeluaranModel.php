<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Penjualan
 *
 * @author -K-
 */
class PengeluaranModel extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getAll($table) {
        $data = array();
        $this->db->select("*");
        $this->db->from($table);

        $hasil = $this->db->get();
        if ($hasil->num_rows() > 0) {
            $data = $hasil->result();
        }
        $hasil->free_result();
        return $data;
    }

    function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    function search_hari_pengeluaran($hari) {
        $this->db->select('namaBarang, SUM(jumlah) as jumlah, harga, SUM(totalHarga) as totalHarga');
        $this->db->from('pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal, '%d %M %Y') = ", $hari);
        $this->db->group_by('namaBarang,harga');
        return $this->db->get()->result();
    }

    function search_bulan_pengeluaran($bulan) {
        $this->db->select('tanggal, namaBarang, SUM(jumlah) as jumlah, harga, SUM(totalHarga) as totalHarga');
        $this->db->from('pengeluaran');
        $this->db->where("DATE_FORMAT(tanggal, '%M %Y') = ", $bulan);
        $this->db->group_by('namaBarang,harga');
        return $this->db->get()->result();
    }
}