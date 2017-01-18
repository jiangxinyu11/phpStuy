<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index(){

        }
        public function reg(){
            $this->load->view('reg.php');
        }
        public function do_reg(){
            $ACCOUNT=$this->input->post('email');
            $PASSWORD=$this->input->post('pwd');
            $NAME=$this->input->post('name');
            $GENDER=$this->input->post('gender');
            if($GENDER == 1){
                $GENDER='男';
            }else if($GENDER == 2){
                $GENDER='女';
            }
            $arr=array(
                'ACCOUNT'=>$ACCOUNT,
                'PASSWORD'=>$PASSWORD,
                'NAME'=>$NAME,
                'GENDER'=>$GENDER
            );
            $this->load->model ('user_model');
            $rs=$this->user_model->get_insert($arr);
            if($rs){
                echo 123;
            }else{
                echo 456;
            }
        }
    }

?>