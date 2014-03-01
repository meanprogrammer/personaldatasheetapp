<?php
class trainingprograms_model extends CI_Model {
	var $ParentID = 0;
	var $TrainingTitle = '';
	var $StartDate = '';
	var $EndDate = '';
	var $NumberOfHours = ''; 
	var $ConductedSponsoredBy = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('trainingprograms', $this);
    }
    
    function gettrainingprogrambyid($id) {
    	return  $this->db->where('ParentID', $id)->get('trainingprograms');
    }
    
    function deletetrainingprogrambyid($id){
    	$this->db->where('ParentID', $id);
    	$this->db->delete('trainingprograms');
    }
}