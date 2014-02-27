<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AddPds extends CI_Controller {
	
	public function index()
	{
		$this->load->view('add_pds');
	}
}