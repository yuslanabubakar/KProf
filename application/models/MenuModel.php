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
class MenuModel extends CI_Model{
    //put your code here
    function __construct(){
        parent::__construct();
    }
    function getAll($table){
        $data = array();
        $this->db->select("*");
        $this->db->from($table);
        $hasil = $this->db->get();
        if($hasil->num_rows() > 0){
                $data = $hasil->result();
        }
        $hasil->free_result();
        return $data;
    }
    function getMenu() {
        return $this->db->query("SELECT * FROM barang INNER JOIN jenis USING(idJenis) ")->result();
    }

    function getLastIdMenu()
    {
        $lastId = $this->db->query("SELECT * FROM barang ORDER BY idBarang DESC LIMIT 1")->row_array();
        $lastId = $lastId['idBarang'];

        //ref https://stackoverflow.com/questions/8529656/how-do-i-convert-a-string-to-a-number-in-php
        preg_match("/(\D+)(\d+)/", $lastId, $Matches); // Matches the PU and number

        $ProductCode = $Matches[1];

        $NewID = intval($Matches[2]);
        $NewID++;


        $BarcodeLength = 4;
        $CurrentLength = strlen($NewID);
        $MissingZeros = $BarcodeLength - $CurrentLength;

        for ($i=0; $i<$MissingZeros; $i++) $NewID = "0" . $NewID;

        $Result = $ProductCode . $NewID;
        return $Result;
    }
    function getMenuW($id) {
        $s= $this->db->query("SELECT * FROM barang INNER JOIN jenis USING(idJenis) where idBarang='$id'")->result();
        return $s;
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
    function getByRow( $limit){
        
        return $this->db->query("SELECT * FROM barang LIMIT $limit,1 ")->result();
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
