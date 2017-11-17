<?php
class loginController extends CI_Controller{

    function loginController(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('LoginModel');
    }

     function index(){
         //1,获得提交的参数
             $user_name=$_POST['user_name'];
             
             $password=$_POST['password'];
         //2,插入产品
         $this->LoginModel->getUser($user_name,$password);
         
    

    }
}
?>