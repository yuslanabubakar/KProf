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
class PenjualanModel extends CI_Model {

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

    function getPenjualan() {
        return $this->db->query("SELECT * FROM transaksi INNER JOIN detailtransaksi USING(idTransaksi)")->result();
    }

    // function getPetugas() {
    //     return $this->db->query("SELECT * FROM transaksi INNER JOIN karyawan USING(idKaryawan) ")->result();
    // }

    function getWhere($table, $where) {
        return $this->db->get_where($table, $where);
    }

    function getOne($table, $where) {
        return $this->db->get_where($table, $where)->row();
    }

    function countAll($table) {
        return $this->db->count_all($table);
    }

    function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    function update($table, $data, $where) {
        return $this->db->update($table, $data, $where);
//        echo $this->db->last_query();
//        die;
    }

    function checkId($table, $id) {
        $this->db->where($id);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function delete($table, $where) {
        return $this->db->delete($table, $where);
    }

    function getLastID() {
        return $this->db->query("SELECT MAX(ind) as ind FROM transaksi ")->result();
    }

    function search_bulan($bulan) {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where("DATE_FORMAT(tglTransaksi, '%M %Y') = ", $bulan);
       //  $this->db->where("month(tglTransaksi)= '" . $bulan . "'");
        return $this->db->get()->result();
    }

    function search_tahun($tahun) {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where("year(tglTransaksi)= '" . $tahun . "'");
        return $this->db->get();
    }


    function search_hari($hari) {
        $this->db->select('barang.namaBarang, SUM(detailtransaksi.jumlah) as quantity, barang.harga, sum(detailtransaksi.diskon) as diskon');
        $this->db->from('barang');
        $this->db->join('detailtransaksi','barang.idBarang = detailtransaksi.idBarang');
        $this->db->join('transaksi','detailtransaksi.idTransaksi = transaksi.idTransaksi');
        $this->db->where("DATE_FORMAT(tglTransaksi, '%d %M %Y') = ", $hari);
        $this->db->group_by('detailtransaksi.idBarang');
        return $this->db->get()->result();
    }
}
