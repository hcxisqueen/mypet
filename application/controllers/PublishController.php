<?php
date_default_timezone_set("PRC");
class PublishController extends CI_Controller{

    function PublishController(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('PublishModel');
        /*加载日期函数*/
       $this->load->helper('date');
    }

     function index(){
         //1,获得提交的参数
                
             $user_id=$this->session->userdata('user_id');
             $note_content=$_POST['note_content'];
             $note_url=$_POST['note_url'];
             $note_title=$_POST['note_title'];
             $note_type=$_POST['note_type'];
              //使用日历创建时间            
            
            $note_time =date('Y-m-d h:i:s',time());          
          


         //2发表论坛
         $this->PublishModel->insert($user_id,$note_content,$note_url,$note_time,$note_type,$note_title);
         //3 从数据库里取得数据
         /*$data['notes']=$this->PublishModel->getnote($note_content,$note_url,$note_time,$note_type,$note_title);
        //4,把数据给视图显示出来
       $this->load->view('#',$data);*/


    }
}