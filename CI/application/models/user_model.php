<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
    public function checkname($name){
        //通过$name去数据库查询(seleck * from user where uname='$name')
        $query=$this->db->query("seleck * from user where uname='$name'");
//        $query=$this->db
        return $query->row();
    }
    public function get_insert($name,$pass){
//        $query=$this->db->query("insert into user(uid,uname,pass) values(null,'$name','$pass')");
        $arr=array(
            'uname'=>$name,
            'pass'=>$pass
        );
        $query=$this->db->insert('user',$arr);
        return $query;
    }
}


?>