<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$data['pinfo'] = $this->getallpds();
		$this->load->view('home_page', $data);
	}
	
	function getallpds(){
		$this->load->model('personalinfo_model');
		return  $this->personalinfo_model->getall();
	}
}