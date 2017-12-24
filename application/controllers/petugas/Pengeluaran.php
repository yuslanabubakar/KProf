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
class Pengeluaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PengeluaranModel');
    }

    public function index() {
        $content['menu'] = $this->MenuModel->getMenu();
        $content['total_row'] = $this->MenuModel->countAll('barang');

        $content['penjualan'] = $this->PenjualanModel->getPenjualan();
        $content['total_rows'] = $this->PenjualanModel->countAll('transaksi');

        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/Pengeluaran", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    public function tambahPengeluaran() {
        $tgl = $this->input->post('tanggal');
        $namaBarang = $this->input->post('namaBarang');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $totalHarga = $this->input->post('totalHarga');

        $data = array(
            'tanggal' => $tgl,
            'namaBarang' => $namaBarang,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'totalHarga' => $totalHarga
        );

        $this->PengeluaranModel->insert('pengeluaran', $data);
        redirect('petugas/Pengeluaran');
    }
}