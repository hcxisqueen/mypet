<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexControler extends CI_Controller {
    
    function IndexControler(){
        parent::__construct();
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view('index');
	}
}
