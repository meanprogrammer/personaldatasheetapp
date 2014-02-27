<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SavePds extends CI_Controller 
{
	function SavePds()
	{
		parent::__construct();
		$this->load->model('personalinfo_model');
		//$this->output->cache(120);
	}
	
	
	function index()
	{
		$this->load->view('save_pds');
	}
	
	function savepersonalinfo() {
		$this->personalinfo_model->Surname =$this->input->post('surname');
		$this->personalinfo_model->Firstname =$this->input->post('firstname');
		$this->personalinfo_model->Middlename = $this->input->post('middlename');
		$this->personalinfo_model->ExtensionName = $this->input->post('nameextension');
		$this->personalinfo_model->DateOfBirth = $this->input->post('dateofbirth');
		$this->personalinfo_model->PlaceOfBirth = $this->input->post('placeofbirth');
		$this->personalinfo_model->Sex = $this->input->post('sex');
		$this->personalinfo_model->CivilStatus = $this->input->post('civilstatus');
		$this->personalinfo_model->Citizenship = $this->input->post('citizenship');
		$this->personalinfo_model->Height = $this->input->post('height');
		$this->personalinfo_model->Weight = $this->input->post('weight');
		$this->personalinfo_model->BloodType = $this->input->post('bloodtype');
		$this->personalinfo_model->GSISNo = $this->input->post('gsisidno');
		$this->personalinfo_model->PAGIBIGNo = $this->input->post('pagibigidno');
		$this->personalinfo_model->PhilHealthNo = $this->input->post('philhealthno');
		$this->personalinfo_model->SSSNo = $this->input->post('sssno');
		$this->personalinfo_model->ResidentialAddress = $this->input->post('residentialaddtress');
		$this->personalinfo_model->ResidentialZipcode = $this->input->post('residentialzipcode');
		$this->personalinfo_model->ResidentialContactNo = $this->input->post('residentialcontactno');
		$this->personalinfo_model->PermanentAddress = $this->input->post('permanentaddress');
		$this->personalinfo_model->PermanentZipcode = $this->input->post('permanentzipcode');
		$this->personalinfo_model->PermanentContactNo = $this->input->post('permanentcontactno');
		$this->personalinfo_model->EmailAddress = $this->input->post('emailaddress');
		$this->personalinfo_model->MobileNo = $this->input->post('mobileno');
		$this->personalinfo_model->AgencyEmployeeNo = $this->input->post('agencyemployeeno');
		$this->personalinfo_model->TINNo = $this->input->post('tinno');

		$this->personalinfo_model->save();
		
		$this->load->view('save_pds');
	}
}