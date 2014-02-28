<?php
class questionaire_model extends CI_Model {
	var $ParentID = 0; 
	var $Q36aAns = '';
	var $Q36aDetails = ''; 
	var $Q36bAns = ''; 
	var $Q36bDetails = ''; 
	var $Q37aAns = ''; 
	var $Q37aDetails = ''; 
	var $Q37bAns = ''; 
	var $Q37bDetails = ''; 
	var $Q38Ans = ''; 
	var $Q38Details = ''; 
	var $Q39Ans = ''; 
	var $Q39Details = ''; 
	var $Q40Ans = ''; 
	var $Q40Details = ''; 
	var $Q41aAns = ''; 
	var $Q41aDetails = ''; 
	var $Q41bAns = ''; 
	var $Q41bDetails = ''; 
	var $Q41cAns = ''; 
	var $Q41cDetails = ''; 
	var $CommunityTaxCertNo = ''; 
	var $IssuedAt = ''; 
	var $IssuedOn = ''; 
	var $DateAccomplished = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('questionaire', $this);
    }
}