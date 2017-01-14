<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
//        echo 123;
    }

    public function reg()
    {
        //把view中的reg.php在浏览器最上展示出来
        $this->load->view('reg.php');
    }
    public function do_reg(){
        $name=$this->input->post('uname');
        $pass=$this->input->post('pass');
        //1、去数据库中查询$name是否存在
        //   加载user_model model类
//        $this->load->model('user_model');
        //调用user_model下的checkname方法
        $rs=$this->user_model->checkname($name);
        //2、如果存在重新加载reg()
        if($rs){
            redirect('user/reg');
//            $this->reg();
        }else{
            $rs=$this->user_model->get_insert($name,$pass);
            if($rs){
                redirect('user/login');
            }
        }
        //3、如果不存在 insert数据库---插入成功 跳转登录页
    }
    public function login(){

        $this->load->view('login.php');
    }
}


?>