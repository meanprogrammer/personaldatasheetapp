<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pds extends CI_Controller {
	
	function Pds()
	{
		parent::__construct();
		//$this->output->cache(120);
	}
	
	public function index()
	{
		$this->load->view('addpdsview');
	}
	
	function detail(){
		$id = $this->uri->segment(3);
		$view = $this->uri->segment(4);
		$data['pinfo'] = $this->getpersonalinfobyid($id);
		$familybackground = $this->getfamilybackgroundbyid($id); 
		$data['family'] = $familybackground;
		$fid = $familybackground->row()->RecordID;
		$data['children'] = $this->getfamilybackground_children($fid);
		$data['education'] = $this->geteducationalbackgroundbyid($id);
		$data['civilservice'] = $this->getcivilservicebyid($id);
		$data['workexp'] = $this->getworkexperiencebyid($id);
		$data['vwork'] = $this->getvoluntaryworkbyid($id);
		$data['training'] = $this->gettrainingprogrambyid($id);
		$data['other'] = $this->getotherinfobyid($id);
		$data['reference'] = $this->getreferencebyid($id);
		$data['question'] =  $this->getquestionairebyid($id);
		$data['currentid'] = $id;
		if($view == '') {
			$this->load->view('detailspdsview', $data);
		} else {
			$this->load->view($view, $data);
		}
	}
	
	function savepds() {
		
		$id = $this->savepersonalinfo();
		$data['id'] = $id;
		
		$familybackgroundid = $this->savefamilybackground($id);

		$this->savechildren($familybackgroundid);
		$this->saveeducationalbackground($id);
		$this->savecivilserviceeligibility($id);
		$this->saveworkexperience($id);
		$this->savevoluntarywork($id);
		$this->savetrainingprogram($id);
		$this->saveotherinfo($id);
		$this->savereference($id);
		$this->savequestionaire($id);
		//$this->load->view('save_pds', $data);
		if($this->session->userdata('IsAdmin') == 0){
			$this->load->model('user_model');
			$uu = $this->user_model->getbyuserid($this->session->userdata('UserID'));
			$u1 = $uu->row();
			
			$this->user_model->Username = $u1->Username;
			$this->user_model->Password = $u1->Password;
			$this->user_model->AssociatedPDS = $id;
			$this->user_model->LastUpdate = $u1->LastUpdate;
			$this->user_model->IsAdmin = $u1->IsAdmin;
			
			$this->user_model->updateassociatedpds($this->session->userdata('UserID'));
			
			$user = $this->user_model->getbyuserid($this->session->userdata('UserID'));
			$u = $user->row();
			$userdata = array(
							'UserID' => $u->RecordID,
							'Username' => $u->Username,
							'AssociatedPDS' => $u->AssociatedPDS,
							'LastUpdate' => $u->LastUpdate,
							'IsAdmin' => $u->IsAdmin
						);
			$this->session->set_userdata($userdata);
		}
		redirect('pds/detail/'.$id);
	}
	
	function savepersonalinfo(){
		$this->load->model('personalinfo_model');
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

		return  $this->personalinfo_model->save();
	}
	
	function savefamilybackground($parendId) {
		$this->load->model('familybackground_model');
		$this->familybackground_model->SpouseSurname = $this->input->post('spousesurname');
		$this->familybackground_model->SpouseFirstname = $this->input->post('spousefirstname');
		$this->familybackground_model->SpouseMiddlename = $this->input->post('spousemiddlename');
		$this->familybackground_model->SpouseOccupation = $this->input->post('spouseoccupation');
		$this->familybackground_model->SpouseEmployerName = $this->input->post('spouseemployerbusinessname');
		$this->familybackground_model->SpouseEmployerAddress = $this->input->post('spouseemployerbusinessaddress');
		$this->familybackground_model->SpouseContactNo = $this->input->post('spousecontactno');
		$this->familybackground_model->FatherSurname = $this->input->post('fathersurname');
		$this->familybackground_model->FatherFirstname = $this->input->post('fatherfirstname');
		$this->familybackground_model->FatherMiddlename = $this->input->post('fathermiddlename');
		$this->familybackground_model->MotherMaidenName = $this->input->post('mothermaidenname');
		$this->familybackground_model->MotherLastname = $this->input->post('mothersurname');
		$this->familybackground_model->MotherFirstname = $this->input->post('motherfirstname');
		$this->familybackground_model->MotherMiddlename = $this->input->post('mothermiddlename');
		$this->familybackground_model->ParentID = $parendId;		
		
		return $this->familybackground_model->save();
	}
	
	function savechildren($familybackgroundid){
		
		$json = $this->input->post('childrenhidden');
		$children = json_decode($json);
		
		if(!$children){ return ; }
		
		foreach ($children as $c) {
			$this->load->model('familybackground_children_model');
			$this->familybackground_children_model->NameOfChild = $c->nameofchild;
			$this->familybackground_children_model->DateOfBirth = $c->childdateofbirth;
			$this->familybackground_children_model->FamilyBackgroundID = $familybackgroundid;
			$this->familybackground_children_model->save();
		}
	}
	
	function saveeducationalbackground($parentid) {
		$json = $this->input->post('educationhidden');
		$educ = json_decode($json);
		
		if(!$educ){ return ; }
		foreach ($educ as $e) {
			$this->load->model('educationalbackground_model');
			$this->educationalbackground_model->Level = $e->educationlevel;
			$this->educationalbackground_model->NameOfSchool = $e->nameofschool;
			$this->educationalbackground_model->DegreeCourse = $e->degreecourse;
			$this->educationalbackground_model->YearGraduated = $e->yeargraduated;
			$this->educationalbackground_model->HighestGradeLevelUnitsEarned = $e->highestgrade;
			$this->educationalbackground_model->DateFrom = date('Y-m-d', strtotime($e->educationfrom));
			$this->educationalbackground_model->DateTo = date('Y-m-d', strtotime($e->educationto));
			$this->educationalbackground_model->ScholarshipAcademicHonorRecieved = $e->academichonors;
			$this->educationalbackground_model->ParentID = $parentid;	
			
			$this->educationalbackground_model->save();
		}
	}
	
	function savecivilserviceeligibility($parentid) {
		$json = $this->input->post('civilservicehidden');
		$civilservice = json_decode($json);
		
		if(!$civilservice){ return ; }
		foreach ($civilservice as $cv) {
			$this->load->model('civilserviceeligibility_model');
			$this->civilserviceeligibility_model->CareerService = $cv->careerservice;
			$this->civilserviceeligibility_model->ParentID = $parentid;
			$this->civilserviceeligibility_model->Rating = $cv->civilrating;
			$this->civilserviceeligibility_model->DateOfExam = date('Y-m-d', strtotime($cv->dateofexam));
			$this->civilserviceeligibility_model->PlaceOfExam = $cv->placeofexam;
			$this->civilserviceeligibility_model->ExamNo = $cv->licenseno;
			$this->civilserviceeligibility_model->DateOfRelease = date('Y-m-d', strtotime($cv->licensereleasedate));
		  
			$this->civilserviceeligibility_model->save();
		}
	}
	
	function saveworkexperience($parentid) {
		$json = $this->input->post('workexphidden');
		$workexp = json_decode($json);
		
		if(!$workexp){return ;}
		foreach ($workexp as $we) {
			$this->load->model('workexperience_model');
			$this->workexperience_model->ParentID = $parentid;
			$this->workexperience_model->StartDate = date('Y-m-d', strtotime($we->workstart));
			$this->workexperience_model->EndDate = date('Y-m-d', strtotime($we->workend));
			$this->workexperience_model->PositionTitle = $we->positiontitle;
			$this->workexperience_model->CompanyName = $we->agencyname;
			$this->workexperience_model->MonthlySalary = $we->monthlysalary;
			$this->workexperience_model->SalaryGradeStepIncrement = $we->salaryincrement;
			$this->workexperience_model->StatusOfAppointment = $we->statusofappointment;
			$this->workexperience_model->GovtService = $we->govtservice;
		
			$this->workexperience_model->save();
		}
	}
	
	function savevoluntarywork($parentid) {
		$json = $this->input->post('voluntaryworkhidden');
		$vwork = json_decode($json);
		if(!$vwork){return ;}		
		foreach ($vwork as $vw) {
			$this->load->model('voluntaryworks_model');
			$this->voluntaryworks_model->ParentID = $parentid;
			$this->voluntaryworks_model->NameAddressOfOrg = $vw->voluntaryworkorg;
			$this->voluntaryworks_model->StartDate = date('Y-m-d', strtotime($vw->voluntaryworkfrom));
			$this->voluntaryworks_model->EndDate = date('Y-m-d', strtotime($vw->voluntaryworkto));
			$this->voluntaryworks_model->NumberOfHours = $vw->voluntaryworkhours;
			$this->voluntaryworks_model->PositionOrNatureOfWork = $vw->voluntaryworknature;
						
			$this->voluntaryworks_model->save();
		}
	}
	
	function savetrainingprogram($parentid) {
		$json = $this->input->post('trainingprogramhidden');
		$training = json_decode($json);
		
		if(!$training){return ;}
		foreach ($training as $tp) {
			$this->load->model('trainingprograms_model');
			$this->trainingprograms_model->ParentID = $parentid;
			$this->trainingprograms_model->TrainingTitle = $tp->titleofseminar;
			$this->trainingprograms_model->StartDate = date('Y-m-d', strtotime($tp->trainingfrom));
			$this->trainingprograms_model->EndDate = date('Y-m-d', strtotime($tp->trainingto));
			$this->trainingprograms_model->NumberOfHours = $tp->traininghours;
			$this->trainingprograms_model->ConductedSponsoredBy = $tp->trainingconducted;
					
			$this->trainingprograms_model->save();
		}
	}
	
	function saveotherinfo($parentid) {
		$json = $this->input->post('otherinfohidden');
		$otherinfo = json_decode($json);
		
		if(!$otherinfo){return ;}
		foreach ($otherinfo as $oi) {
			$this->load->model('otherinformation_model');
			$this->otherinformation_model->ParentID = $parentid;
			$this->otherinformation_model->SpecicalSkillsHobbies = $oi->specialskills;
			$this->otherinformation_model->NonAcademicDistinctionRecognition = $oi->nonacademicdistinction;
			$this->otherinformation_model->OrganizationMembership = $oi->membershipassoc;
					
			$this->otherinformation_model->save();
		}
	}
	
	function savereference($parentid) {
		$json = $this->input->post('referenceshidden');
		$references = json_decode($json);
		
		if(!$references){return ;}
		foreach ($references as $r) {
			$this->load->model('references_model');
			$this->references_model->ParentID = $parentid;
			$this->references_model->Name = $r->referencename;
			$this->references_model->Address = $r->referenceaddress;
			$this->references_model->ContactNo = $r->referencecontact;
					
			$this->references_model->save();
		}
	}
	
	function savequestionaire($parendId) {
		$this->load->model('questionaire_model');
		$this->questionaire_model->ParentID = $parendId;		
		$this->questionaire_model->Q36aAns = $this->input->post('q36aans');
		$this->questionaire_model->Q36aDetails = $this->input->post('q36adetails'); 
		$this->questionaire_model->Q36bAns = $this->input->post('q36bans');
		$this->questionaire_model->Q36bDetails = $this->input->post('q36bdetails'); 
		$this->questionaire_model->Q37aAns = $this->input->post('q37aans'); 
		$this->questionaire_model->Q37aDetails = $this->input->post('q37adetails'); 
		$this->questionaire_model->Q37bAns = $this->input->post('q37bans'); 
		$this->questionaire_model->Q37bDetails = $this->input->post('q37bdetails'); 
		$this->questionaire_model->Q38Ans = $this->input->post('q38ans'); 
		$this->questionaire_model->Q38Details = $this->input->post('q38details'); 
		$this->questionaire_model->Q39Ans = $this->input->post('q39ans'); 
		$this->questionaire_model->Q39Details = $this->input->post('q39details'); 
		$this->questionaire_model->Q40Ans = $this->input->post('q40ans'); 
		$this->questionaire_model->Q40Details = $this->input->post('q40details'); 
		$this->questionaire_model->Q41aAns = $this->input->post('q41aans'); 
		$this->questionaire_model->Q41aDetails = $this->input->post('q41adetails'); 
		$this->questionaire_model->Q41bAns = $this->input->post('q41bans'); 
		$this->questionaire_model->Q41bDetails = $this->input->post('q41bdetails'); 
		$this->questionaire_model->Q41cAns = $this->input->post('q41cans'); 
		$this->questionaire_model->Q41cDetails = $this->input->post('q41cdetails'); 
		$this->questionaire_model->CommunityTaxCertNo = $this->input->post('communitytaxcertno'); 
		$this->questionaire_model->IssuedAt = $this->input->post('issuedat'); 
		$this->questionaire_model->IssuedOn = date('Y-m-d', strtotime($this->input->post('issuedon')));
		$this->questionaire_model->DateAccomplished = date('Y-m-d', strtotime($this->input->post('dateaccomplished')));
		
		
		return $this->questionaire_model->save();
	}
	
	function getpersonalinfobyid($id){
		$this->load->model('personalinfo_model');
		return $this->personalinfo_model->getbyid($id);
	}
	
	function getfamilybackgroundbyid($id){
		$this->load->model('familybackground_model');
		return  $this->familybackground_model->getfamilybackgroundbyid($id);
	}
	
	function getfamilybackground_children($backgroundid) {
		$this->load->model('familybackground_children_model');
		return $this->familybackground_children_model->getchildrenbybackgroundid($backgroundid);
	}
	
	function geteducationalbackgroundbyid($id) {
		$this->load->model('educationalbackground_model');
		return $this->educationalbackground_model->geteducationalbackgroundbyid($id);
	}
	
	function getcivilservicebyid($id){
		$this->load->model('civilserviceeligibility_model');
		return  $this->civilserviceeligibility_model->getcivilservicebyid($id);
	}
	
	function getworkexperiencebyid($id) {
		$this->load->model('workexperience_model');
		return $this->workexperience_model->getworkexperiencebyid($id);
	}
	
	function getvoluntaryworkbyid($id) {
		$this->load->model('voluntaryworks_model');
		return $this->voluntaryworks_model->getvoluntaryworkbyid($id);
	}
	
	function gettrainingprogrambyid($id) {
		$this->load->model('trainingprograms_model');
		return $this->trainingprograms_model->gettrainingprogrambyid($id);
	}
	
	function getotherinfobyid($id) {
		$this->load->model('otherinformation_model');
		return $this->otherinformation_model->getotherinfobyid($id);
	}
	
	function getreferencebyid($id) {
		$this->load->model('references_model');
		return $this->references_model->getreferencebyid($id);
	}
	
	function getquestionairebyid($id) {
		$this->load->model('questionaire_model');
		return $this->questionaire_model->getquestionairebyid($id);
	}
	
	function edit() {
		$id = $this->uri->segment(3);;
		$data['pinfo'] = $this->getpersonalinfobyid($id);
		$familybackground = $this->getfamilybackgroundbyid($id); 
		$data['family'] = $familybackground;
		$fid = $familybackground->row()->RecordID;
		$data['children'] = $this->getfamilybackground_children($fid);
		$data['education'] = $this->geteducationalbackgroundbyid($id);
		$data['civilservice'] = $this->getcivilservicebyid($id);
		$data['workexp'] = $this->getworkexperiencebyid($id);
		$data['vwork'] = $this->getvoluntaryworkbyid($id);
		$data['training'] = $this->gettrainingprogrambyid($id);
		$data['other'] = $this->getotherinfobyid($id);
		$data['reference'] = $this->getreferencebyid($id);
		$data['question'] =  $this->getquestionairebyid($id);
		$data['currentid'] = $id;
		$this->load->view('editpdsview', $data);
	}
	
	function update() {
		$id = $this->uri->segment(3);
		$this->updatepersonalinfo($id);
		$this->updatefamilybackground($id);
		$familybackground = $this->getfamilybackgroundbyid($id); 
		$fid = $familybackground->row()->RecordID;
		//delete all children
		$this->deletedamilybackgroundchildrenbyid($fid);
		//save children again
		$this->savechildren($fid);
		//delete educational background
		$this->deleteeducationalbackgroundbyid($id);
		//add educational background again
		$this->saveeducationalbackground($id);
		//delete civil service
		$this->deletecivilservicebyid($id);
		//add civil service
		$this->savecivilserviceeligibility($id);
		//delete work exp
		$this->deleteworkexpbyid($id);
		//add work exp
		$this->saveworkexperience($id);
		//delete voluntary works
		$this->deletevoluntaryworkbyid($id);
		//add voluntary works
		$this->savevoluntarywork($id);
		//delete training program
		$this->deletetrainingprogrambyid($id);
		//add training program
		$this->savetrainingprogram($id);
		//delete other information
		$this->deleteotherinfobyid($id);
		//add other information
		$this->saveotherinfo($id);
		//delete references
		$this->deletereferencebyid($id);
		//add references
		$this->savereference($id);
		//update questionaire
		$this->updatequestionaire($id);
		redirect('pds/detail/'.$id);
	}
	
	function deletereferencebyid($id){
		$this->load->model('references_model');
		$this->references_model->deletereferencebyid($id);
	}
	
	function deleteotherinfobyid($id) {
		$this->load->model('otherinformation_model');
		$this->otherinformation_model->deleteotherinfobyid($id);
	}
	
	function deletetrainingprogrambyid($id) {
		$this->load->model('trainingprograms_model');
		$this->trainingprograms_model->deletetrainingprogrambyid($id);
	}
	
	function deletecivilservicebyid($id) {
		$this->load->model('civilserviceeligibility_model');
		$this->civilserviceeligibility_model->deletecivilservicebyid($id);
	}
	
	function deleteworkexpbyid($id) {
		$this->load->model('workexperience_model');
		$this->workexperience_model->deleteworkexpbyid($id);
	}
	
	function deletevoluntaryworkbyid($id){
		$this->load->model('voluntaryworks_model');
		$this->voluntaryworks_model->deletevoluntaryworkbyid($id);
	}
	
	function deleteeducationalbackgroundbyid($id) {
		$this->load->model('educationalbackground_model');
		$this->educationalbackground_model->deleteeducationalbackgroundbyid($id);
	}
	
	function deletedamilybackgroundchildrenbyid($id){
		$this->load->model('familybackground_children_model');
		$this->familybackground_children_model->deletebyfamilybackgroundid($id);
	}
	
	function updatepersonalinfo($id) {
		$this->load->model('personalinfo_model');
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

		return  $this->personalinfo_model->update($id);
	}
	
	function updatefamilybackground($id) {
		$this->load->model('familybackground_model');
		$this->familybackground_model->SpouseSurname = $this->input->post('spousesurname');
		$this->familybackground_model->SpouseFirstname = $this->input->post('spousefirstname');
		$this->familybackground_model->SpouseMiddlename = $this->input->post('spousemiddlename');
		$this->familybackground_model->SpouseOccupation = $this->input->post('spouseoccupation');
		$this->familybackground_model->SpouseEmployerName = $this->input->post('spouseemployerbusinessname');
		$this->familybackground_model->SpouseEmployerAddress = $this->input->post('spouseemployerbusinessaddress');
		$this->familybackground_model->SpouseContactNo = $this->input->post('spousecontactno');
		$this->familybackground_model->FatherSurname = $this->input->post('fathersurname');
		$this->familybackground_model->FatherFirstname = $this->input->post('fatherfirstname');
		$this->familybackground_model->FatherMiddlename = $this->input->post('fathermiddlename');
		$this->familybackground_model->MotherMaidenName = $this->input->post('mothermaidenname');
		$this->familybackground_model->MotherLastname = $this->input->post('mothersurname');
		$this->familybackground_model->MotherFirstname = $this->input->post('motherfirstname');
		$this->familybackground_model->MotherMiddlename = $this->input->post('mothermiddlename');
		$this->familybackground_model->ParentID = $id;		
		
		return $this->familybackground_model->update($id);
	}
	
	function updatequestionaire($parendId) {
		$this->load->model('questionaire_model');
		$this->questionaire_model->ParentID = $parendId;		
		$this->questionaire_model->Q36aAns = $this->input->post('q36aans');
		$this->questionaire_model->Q36aDetails = $this->input->post('q36adetails'); 
		$this->questionaire_model->Q36bAns = $this->input->post('q36bans');
		$this->questionaire_model->Q36bDetails = $this->input->post('q36bdetails'); 
		$this->questionaire_model->Q37aAns = $this->input->post('q37aans'); 
		$this->questionaire_model->Q37aDetails = $this->input->post('q37adetails'); 
		$this->questionaire_model->Q37bAns = $this->input->post('q37bans'); 
		$this->questionaire_model->Q37bDetails = $this->input->post('q37bdetails'); 
		$this->questionaire_model->Q38Ans = $this->input->post('q38ans'); 
		$this->questionaire_model->Q38Details = $this->input->post('q38details'); 
		$this->questionaire_model->Q39Ans = $this->input->post('q39ans'); 
		$this->questionaire_model->Q39Details = $this->input->post('q39details'); 
		$this->questionaire_model->Q40Ans = $this->input->post('q40ans'); 
		$this->questionaire_model->Q40Details = $this->input->post('q40details'); 
		$this->questionaire_model->Q41aAns = $this->input->post('q41aans'); 
		$this->questionaire_model->Q41aDetails = $this->input->post('q41adetails'); 
		$this->questionaire_model->Q41bAns = $this->input->post('q41bans'); 
		$this->questionaire_model->Q41bDetails = $this->input->post('q41bdetails'); 
		$this->questionaire_model->Q41cAns = $this->input->post('q41cans'); 
		$this->questionaire_model->Q41cDetails = $this->input->post('q41cdetails'); 
		$this->questionaire_model->CommunityTaxCertNo = $this->input->post('communitytaxcertno'); 
		$this->questionaire_model->IssuedAt = $this->input->post('issuedat'); 
		$this->questionaire_model->IssuedOn = date('Y-m-d', strtotime($this->input->post('issuedon')));
		$this->questionaire_model->DateAccomplished = date('Y-m-d', strtotime($this->input->post('dateaccomplished')));
		
		
		return $this->questionaire_model->update($parendId);
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->deletepersonalinfobyid($id);
		$this->deletefamilybackgroundbyid($id);
		$familybackground = $this->getfamilybackgroundbyid($id); 
		$fid = $familybackground->row()->RecordID;
		//delete all children
		$this->deletedamilybackgroundchildrenbyid($fid);
		//delete educational background
		$this->deleteeducationalbackgroundbyid($id);
		//delete civil service
		$this->deletecivilservicebyid($id);
		//delete work exp
		$this->deleteworkexpbyid($id);;
		//delete voluntary works
		$this->deletevoluntaryworkbyid($id);
		//delete training program
		$this->deletetrainingprogrambyid($id);
		//delete other information
		$this->deleteotherinfobyid($id);
		//add other information
		$this->deletereferencebyid($id);
		//update questionaire
		$this->deletequestionairebyid($id);
		redirect('home/index');
	}
	
	function deletepersonalinfobyid($id){
		$this->load->model('personalinfo_model');
		$this->personalinfo_model->deletebyid($id);
	}
	
	function deletefamilybackgroundbyid($id){
		$this->load->model('familybackground_model');
		$this->familybackground_model->deletebyid($id);
	}
	
	function deletequestionairebyid($id){
		$this->load->model('questionaire_model');
		$this->questionaire_model->deletebyid($id);
	}
	
	function printpdf(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$this->load->view('printpdf', $data);
	}
}