<?php
class familybackground_model extends CI_Model {
	//var $RecordID = 0; 
	var $SpouseSurname = ''; 
	var $SpouseFirstname = '';
	var $SpouseMiddlename = '';
	var $SpouseOccupation = '';
	var $SpouseEmployerName = '';
	var $SpouseEmployerAddress = '';
	var $SpouseContactNo = '';
	var $FatherSurname = '';
	var $FatherFirstname = '';
	var $FatherMiddlename = '';
	var $MotherMaidenName = '';
	var $MotherLastname = '';
	var $MotherFirstname = ''; 
	var $MotherMiddlename = ''; 
	var $ParentID = 0;
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function save() {
		$this->db->insert('familybackground', $this);
		return $this->db->insert_id();
	}
	
	function getfamilybackgroundbyid($id) {
		return $this->db->where('ParentID', $id)->get('familybackground');
	}
	
	function update($id) {
		$this->db->where('ParentID', $id);
		$this->db->update('familybackground', $this);
	}
	
	function deletebyid($id) {
		$this->db->where('ParentID', $id)->delete('familybackground');
	}
}