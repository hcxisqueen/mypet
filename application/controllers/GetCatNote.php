<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCatNote extends CI_Controller {

		function GetCatNote(){
		parent::__construct();
		//1,如果不添加这个方法，在前端使用url的时候会出问题
		$this->load->helper('url');
		 $this->load->model('CatModel');

	}
	public function index()
	{
		$start=$_POST['start'];
		$note_type=$_POST['note_type'];
		if($note_type==9){	
		$morecatnote=$this->CatModel->getAllCatNote($start);
		echo json_encode($morecatnote);

	}else{
	$morecatnote=$this->CatModel->getTypeCatNote($note_type,$start);
		echo json_encode($morecatnote);
	}
	
	
		 
	}

	
}
