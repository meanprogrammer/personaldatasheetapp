<?php
class references_model extends CI_Model {
	var $ParentID = 0;
	var $Name = '';
	var $Address = ''; 
	var $ContactNo = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('references', $this);
    }
}