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
class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('PengeluaranModel');
    }

    public function index() {
        $content['menu'] = $this->MenuModel->getMenu();
        $content['total_row'] = $this->MenuModel->countAll('barang');

        $content['penjualan'] = $this->PenjualanModel->getPenjualan();
        $content['total_rows'] = $this->PenjualanModel->countAll('transaksi');

        // $content['petugas'] = $this->PenjualanModel->getAll('karyawan');
        // $content['total_roww'] = $this->MenuModel->countAll('karyawan');
        // $content['kasir'] = $this->PenjualanModel->getPetugas();
        $jml = filter_input(INPUT_POST, 'qty');
        $dd = Array($jml);
        $content['dataPesan'] = $dd;
        $content['jumlah'] = $this->input->post('qty');
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/PilihBulan", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    public function cariTanggal() {
        $bulan = $this->input->post('bulan');
        $content['data'] = $this->PenjualanModel->search_bulan($bulan);
        $content['dataPengeluaran'] = $this->PengeluaranModel->search_bulan_pengeluaran($bulan);
        $content['tanga'] = $bulan;
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/Laporan", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    public function laporanPenjualanBulananExcel() {
        $bulan = $this->input->post('bulan');
        $content['data'] = $this->PenjualanModel->search_bulan($bulan);
        $content['tanga'] = $bulan;
        $this->load->view("petugas/laporanPenjualanBulananExcel",$content);
    }

     function PrintD($bulan) {
        
        $content['data'] = $this->PenjualanModel->search_bulan($bulan);
        $content['tanga'] = $bulan;
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/PrintLaporan", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

}
