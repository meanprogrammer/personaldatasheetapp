<?php
class otherinformation_model extends CI_Model {
	var $ParentID = 0;
	var $SpecicalSkillsHobbies = ''; 
	var $NonAcademicDistinctionRecognition = ''; 
	var $OrganizationMembership = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('otherinformation', $this);
    }
}