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
class Penjualan extends CI_Controller {

    function __construct() {
        parent::__construct();
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
        $data['content'] = $this->load->view("petugas/Penjualan", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    function Check() {
        // $this->form_validation->set_rules('idKaryawan', 'Petugas', 'required');
        // $this->form_validation->set_rules('meja', 'No Meja', 'required');
        // if ($this->form_validation->run() == FALSE) {
        //     redirect('petugas/Penjualan');
        // } else {
            $content['menu'] = $this->MenuModel->getMenu();
            $content['total_row'] = $this->MenuModel->countAll('barang');
            // $idK = $this->input->post('idKaryawan');
            // $meja = $this->input->post('meja');
            $content['penjualan'] = $this->PenjualanModel->getPenjualan();
            $content['total_rows'] = $this->PenjualanModel->countAll('transaksi');
            // $content['meja'] = $meja;
            // $content['petugas'] = $this->PenjualanModel->getAll('karyawan');
            // $content['total_roww'] = $this->MenuModel->countAll('karyawan');
            // $where = array('idKaryawan' => $idK);
            // $content['kary'] = $this->PenjualanModel->getOne('karyawan', $where);
            $jml = $_POST['qty'];
            $diskon = $_POST['diskon'];
            $dis = Array();
            $dd = Array();
            foreach ($jml as $j => $value) {
                array_push($dd, $jml[$j]);
            }
            foreach ($diskon as $d => $value) {
                array_push($dis, $diskon[$d]);
            }

            $content['dataPesan'] = $dd;
            $content['dataDiskon'] = $dis;

            // $content['jumlah'] = $this->input->post('qty');
            $content['sum'] = 0;
            $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
            $data['content'] = $this->load->view("petugas/Check", $content);
            $data['footer'] = $this->load->view("template/footer", $content);

            $this->load->view("template/petugas_view", $data);
        // }
    }

    function Edit($idBarang) {
        $table = 'barang';
        $where = array('idBarang' => $idBarang);
        $content['data'] = $this->MenuModel->getOne($table, $where);
        $content['message'] = "Silahkan Edit Menu dibawah ini!";
        $content['title'] = "Edit Menu";
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/DaftarMenu", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    function addPesan() {

        $tgl = $this->input->post('tanggal');
        $row=$this->MenuModel->countAll('barang');
        // $idK = $this->input->post('idKaryawan');
        // $meja = $this->input->post('meja');
        $sum = $this->input->post('sum');
        $jml = $_POST['dt'];
        $diskon = $_POST['dtDiskon'];
        $dd = Array();
        $dis = Array();
        foreach ($jml as $j => $value) {
            array_push($dd, $jml[$j]);
        }
        foreach ($diskon as $d => $value) {
            array_push($dis,$diskon[$d]);
        }
        $dataPesan = $dd;
        $dataDiskon = $dis;
        $table = 'transaksi';
        $idT = $this->PenjualanModel->getLastID();

        $data = array(
            'idTransaksi' => 'TRS' . $idT[0]->ind,
            // 'idKaryawan' => $idK,
            'tglTransaksi' => $tgl,
            // 'noMeja' => $meja,
            'total' => $sum
        );
        $this->PenjualanModel->insert($table, $data);
        for ($i = 0; $i < $row; $i++) {
            if ($dataPesan[$i] != NULL) {
                $brg = $this->MenuModel->getByRow($i);
                $dataD = array(
                    'idTransaksi' => "TRS" . $idT[0]->ind,
                    'idBarang' => $brg[0]->idBarang,
                    'jumlah' => $dataPesan[$i],
                    'diskon' => $dataDiskon[$i]*$dataPesan[$i]
                );
                $this->PenjualanModel->insert('detailtransaksi', $dataD);
            }
        }

        redirect('petugas/Penjualan');
    }

    function PrintD() {
        $content['menu'] = $this->MenuModel->getMenu();
        $content['total_row'] = $this->MenuModel->countAll('barang');
        // $idK = $this->input->post('idKaryawan');
        // $meja = $this->input->post('meja');
        $content['penjualan'] = $this->PenjualanModel->getPenjualan();
        $content['total_rows'] = $this->PenjualanModel->countAll('transaksi');
        $content['meja'] = $meja;
        // $content['petugas'] = $this->PenjualanModel->getAll('karyawan');
        // $content['total_roww'] = $this->MenuModel->countAll('karyawan');
        // $where = array('idKaryawan' => $idK);
        // $content['kary'] = $this->PenjualanModel->getOne('karyawan', $where);
        $jml = $_POST['qty'];
        $dd = Array();
        foreach ($jml as $j => $value) {
            array_push($dd, $jml[$j]);
        }

        $content['dataPesan'] = $dd;

        $content['jumlah'] = $this->input->post('qty');
        $content['sum'] = 0;
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/PrintTransaksi", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    public function Delete($idBarang) {
        $table = 'barang';
        $where = array('idBarang' => $idBarang);
        $this->MenuModel->delete($table, $where);
        redirect('petugas/Penjualan');
    }

}
