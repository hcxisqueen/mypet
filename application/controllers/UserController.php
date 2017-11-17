<?php
class UserController extends CI_Controller{

    function UserController(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
    }

     function index(){
         //1,获得提交的参数
             $user_name=$_POST['user_name'];
             $nick_name=$_POST['nick_name'];
             $password=$_POST['password'];
         //2,插入产品
         $this->UserModel->insertUser($user_name,$nick_name,$password);
         //3，根据提交的参数查询产品的ID
/*
        // echo $title.":".$price."</br>";
        $product_id=$this->ProductModel->getId($title,$price);


       //  var_dump($product_id[0]['product_id']);
        // echo "00".$product_id;

         //$product_id = $db->dblink->query($sql);
         //4.插入颜色
        $this->ProductModel->insert1(color,$color,$product_id[0]['product_id']);
         //5.插入尺寸
         $this->ProductModel->insert2(size,$size,$product_id[0]['product_id']);
         //6,插入图片
         $this->ProductModel->insert3(images,$imgUrl,$product_id[0]['product_id']);*/


    }
}
?>