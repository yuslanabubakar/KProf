<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Kurniawan
 */
class LoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function validasi($user, $pass) {

        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $query = $this->db->get();


        if ($query->num_rows() > 0) {
            // foreach ($query->result() as $row) {
            //     $data['role'] = $row->role;
            //     $data['nama'] = $row->nama;
            //     $data['idUser'] = $row->idUser;
                
            //     return $data;
            return true;
        } else {
            return false;
        }
    }

    public function validate() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $role = $this->input->post('role');

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get($role);

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($role == 'petugas') {
                $data = array(
                    'idPetugas' => $row->idPetugas,
                    'username' => $row->username,
                    'role' => $role,
                    'validated' => true
                );
                $this->session->set_userdata($data);
                return true;
            } else {
                $data = array(
                    'idAdministrator' => $row->idAdministrator,
                    'username' => $row->username,
                    'role' => $role,
                    'validated' => true
                );
                $this->session->set_userdata($data);
                return true;
            }
        }
        return false;
    }

    function updateSession($where, $role) {
        $this->db->where($where);
        $query = $this->db->get($role);
        $array = $this->session->all_userdata();
        echo element('idAdministrator', $array);
        echo element('username', $array);
        echo element('role', $array);
        echo element('validated', $array);
//        die;
        if ($query->num_rows() == 1) {
            if ($role == "petugas") {
                $row = $query->row();
                $data = array(
                    'idPetugas' => $row->idPetugas,
                    'username' => $row->username,
                    'role' => $role,
                    'validated' => true
                );
                $this->session->set_userdata($data);
//                return true;
            } elseif ($role == "administrator") {
                $row = $query->row();
                $data = array(
                    'idAdministrator' => $row->idAdministrator,
                    'username' => $row->username,
                    'role' => $role,
                    'validated' => true
                );
                $this->session->set_userdata($data);
//                return true;
            }
        }
//        return false;
    }

    public function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('login/login');
        }
    }

    public function get_user_info($username) {
        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        }
        else {
            return false;
        }
    }

}
