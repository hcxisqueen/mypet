<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailListController extends CI_Controller {
    
    function DetailListController(){
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('detail');
	}
}
