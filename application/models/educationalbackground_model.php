<?php
class educationalbackground_model extends CI_Model {
	var $Level = ''; 
	var $NameOfSchool = ''; 
	var $DegreeCourse = '';
	var $YearGraduated = '';
	var $HighestGradeLevelUnitsEarned = '';
	var $DateFrom = '';
	var $DateTo = '';
	var $ScholarshipAcademicHonorRecieved = ''; 
	var $ParentID = 0;
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('educationalbackground', $this);
    }
    
    function geteducationalbackgroundbyid($id){
    	return $this->db->where('ParentID', $id)->get('educationalbackground');
    }
    
   function deleteeducationalbackgroundbyid($id) {
    	$this->db->where('ParentID', $id);
    	$this->db->delete('educationalbackground');
   }
}