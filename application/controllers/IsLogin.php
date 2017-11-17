<?php
class IsLogin extends CI_Controller{

    function IsLogin(){
        parent::__construct();
        $this->load->helper('url');
    }

     function index(){
        $isLogin=$this->session->userdata('user_id');
            if($isLogin){
                echo  json_encode(array('res'=>'ok'));
            }else{
                echo  json_encode(array('res'=>'no'));
            }
    

    }
}
?>