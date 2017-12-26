<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu
 *
 * @author -K-
 */
class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $content['menu'] = $this->MenuModel->getMenu();
        $content['total_row'] = $this->MenuModel->countAll('barang');

        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
                $data['content'] = $this->load->view("petugas/DaftarMenu", $content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
                $data['content'] = $this->load->view("petugas/DaftarMenuKaryawan", $content);
            }
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    function Add() {
        $table = 'barang';
        $where = array('idBarang' => $this->session->userdata('idBarang'));
        $content['jenis'] = $this->MenuModel->getAll('jenis');
        $content['lastIdMenu'] = $this->MenuModel->getLastIdMenu();
        $content['total_rowJ'] = $this->MenuModel->countAll('jenis');
        $content['data'] = $this->MenuModel->getOne($table, $where);
        $content['message'] = "Silahkan Tambahkan Menu dibawah ini!";
        $content['title'] = "Add Menu";
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/BuatMenu", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    function Edit($idBarang) {
        $content['editdata'] = $this->MenuModel->getMenuW( $idBarang);
        $jabatan = ($this->session->userdata['logged_in']['jabatan']);
            if ($jabatan == 'admin') {
                $data['header'] = $this->load->view("template/header",$content);
            }
            else {
                $data['header'] = $this->load->view("template/headerKaryawan",$content);
            }
        $data['content'] = $this->load->view("petugas/EditMenu", $content);
        $data['footer'] = $this->load->view("template/footer", $content);

        $this->load->view("template/petugas_view", $data);
    }

    function Insert() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idMenu', 'ID Menu', 'required');
        $this->form_validation->set_rules('namaMenu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $table = 'barang';
        $idBarang = $this->input->post('idMenu');
        $data = array(
            'idBarang' => $this->input->post('idMenu'),
            'namaBarang' => $this->input->post('namaMenu'),
            'idJenis' => $this->input->post('jenis'),
            'harga' => $this->input->post('harga')
        );
        $this->MenuModel->insert($table, $data);
        redirect('petugas/Menu');
    }
    function EditP() {
       
        $table = 'barang';
        $idBarang = $this->input->post('idMenu');
        $where = array('idBarang' => $idBarang);
        $s=$this->MenuModel->getOne($table, $where);
        $data = array(
            'idBarang' => $this->input->post('idMenu'),
            'namaBarang' => $this->input->post('namaMenu'),
            'idJenis' => $s->idJenis,
            'harga' => $this->input->post('harga')
        );
        
        $this->MenuModel->update($table,$data,$where);
        redirect('petugas/Menu');
    }

    function Delete($idMenu) {
        $table = 'barang';
        $where = array('idBarang' => $idMenu);
        $this->MenuModel->delete($table, $where);
        redirect('petugas/Menu');
    }

}
