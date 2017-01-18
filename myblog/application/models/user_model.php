<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model
    {
        public function get_insert($arr){
            $query=$this->db->insert('myblog', $arr);
//            return $this->db->affected_rows();
            return $query->affected_rows();
        }
    }