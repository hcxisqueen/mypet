<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller {

		function Cat(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('CatModel');

	}
	public function index()
	{

		$data['allcatsnote']=$this->CatModel->getAllCatNote();
		$this->load->view('cat',$data);
		 
	}
}
