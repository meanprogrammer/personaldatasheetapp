<?php
class voluntaryworks_model extends CI_Model {
	var $ParentID = 0;
	var $NameAddressOfOrg = ''; 
	var $StartDate = '';
	var $EndDate = '';
	var $NumberOfHours = ''; 
	var $PositionOrNatureOfWork = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('voluntaryworks', $this);
    }
}