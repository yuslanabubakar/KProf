<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Petugas
 *
 * @author Kurniawan
 */
class PetugasModel extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
    }
    function getAll($table,$limit){
        $data = array();
        $this->db->select("*");
        $this->db->from($table);
        $this->db->limit($limit);
        $hasil = $this->db->get();
        if($hasil->num_rows() > 0){
                $data = $hasil->result();
        }
        $hasil->free_result();
        return $data;
    }
    function getPetugas() {
        return $this->db->query("SELECT * FROM transaksi INNER JOIN karyawan USING(idKaryawan) ")->result();
    }
    function getWhere($table, $where){
        return $this->db->get_where($table, $where);
    }
    function getOne($table, $where){
        return $this->db->get_where($table, $where)->row();
    }
    
    function countAll($table){
        return $this->db->count_all($table);
    }
    function insert($table, $data){
        return $this->db->insert($table, $data); 
    }
    function update($table,$data,$where){
        return $this->db->update($table,$data,$where);
//        echo $this->db->last_query();
//        die;
    }
    function checkId($table, $id){
        $this->db->where($id);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    function delete($table, $where){
        return $this->db->delete($table, $where);
    }
}
