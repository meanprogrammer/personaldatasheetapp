<?php
class personalinfo_model extends CI_Model 
{
	//$this->RecordID = 0; 
	var $Surname = ''; 
	var $Firstname = '';
	var $Middlename = '';
	var $ExtensionName = '';
	var $DateOfBirth = '';
	var $PlaceOfBirth = '';
	var $Sex = '';
	var $CivilStatus = ''; 
	var $Citizenship = '';
	var $Height = '';
	var $Weight = '';
	var $BloodType = '';
	var $GSISNo = '';
	var $PAGIBIGNo = '';
	var $PhilHealthNo = '';
	var $SSSNo = '';
	var $ResidentialAddress = ''; 
	var $ResidentialZipcode = '';
	var $ResidentialContactNo = '';
	var $PermanentAddress = '';
	var $PermanentZipcode = '';
	var $PermanentContactNo = '';
	var $EmailAddress = '';
	var $MobileNo = '';
	var $AgencyEmployeeNo = ''; 
	var $TINNo  = '';
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function save() {
		$this->db->insert('personalinfo', $this);
		return $this->db->insert_id();
	}
}