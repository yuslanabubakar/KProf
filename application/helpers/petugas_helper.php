<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function add_date($date, $add){
    $CI =& get_instance();
    $query = $CI->db->query("SELECT INTERVAL ".$add." DAY + '".$date."' AS hasil;")->row()->hasil;
    return $query;
}


