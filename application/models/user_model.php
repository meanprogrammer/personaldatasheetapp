<?php
class user_model extends CI_Model {
	var $Username = ''; 
	var $Password = '';
	var $AssociatedPDS = 0; 
	var $LastUpdate = '';
	var $IsAdmin = '';
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getuser($username, $password) {
    	$this->db->where('Username', $username);
    	$this->db->where('Password', $password);
    	return $this->db->get('user');
    }
    
    function updateassociatedpds($userid){
    	//$this->db->query("UPDATE `user` SET `AssociatedPDS`=" + $id + " WHERE `RecordID`="  + $userid);
    	$this->db->where('RecordID',$userid);
    	$this->db->update('user', $this);
    }
    
    function getbyuserid($id) {
    	return $this->db->where('RecordID', $id)->get('user');
    }
}