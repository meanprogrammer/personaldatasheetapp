<?php
class workexperience_model extends CI_Model {
	var $ParentID = 0;
	var $StartDate = ''; 
	var $EndDate = '';
	var $PositionTitle = ''; 
	var $CompanyName = '';
	var $MonthlySalary = '';
	var $SalaryGradeStepIncrement = ''; 
	var $StatusOfAppointment = '';
	var $GovtService  = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('workexperience', $this);
    }
	
}