<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin extends CI_Controller{
 function __construct()
 {
  parent::__construct();
  $this->load->library('Authcode');
 }
function captcha(){
  if($_POST){
    if ($this->authcode->check($this->input->post('gd_pic'))) {
    echo "right";
   } else {
    echo '验证码不正确，请重新输入';
   }
  }else{
   $this->load->view('index');
  }
 }
 function show_captcha(){ //此方法用于显示验证码图片，归一个view中的img的src调用
  $this->authcode->show();
 }
}