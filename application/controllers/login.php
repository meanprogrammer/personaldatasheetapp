<?php
class login extends CI_Controller {
	public function index()
	{
		$data['error'] = '';
		$this->load->view('loginview', $data);
	}
	
	function dologin() {
		$this->load->model('user_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');  
	
		$user = $this->user_model->getuser($username, $password);
		
		if($user->num_rows() > 0){
			$u = $user->row();
			$userdata = array(
							'UserID' => $u->RecordID,
							'Username' => $u->Username,
							'AssociatedPDS' => $u->AssociatedPDS,
							'LastUpdate' => $u->LastUpdate,
							'IsAdmin' => $u->IsAdmin
						);
			$this->session->set_userdata($userdata);
			if($u->IsAdmin == 1) {
				redirect('home/index');
			} else {
				redirect('home/user');
			}
		} else {
			$data['error'] = 'Invalid Username/Password';
			$this->load->view('loginview', $data);
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->load->view('logoutview');
	}
}