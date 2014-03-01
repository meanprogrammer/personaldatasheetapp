<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		if($this->session->userdata('IsAdmin') == 1) {
			$data['pinfo'] = $this->getallpds();
			$this->load->view('homeview', $data);
		} else {
			$this->user();
		}
	}
	
	function getallpds(){
		$this->load->model('personalinfo_model');
		return  $this->personalinfo_model->getall();
	}
	
	public function user(){
		$this->load->view('userview');
	}
}