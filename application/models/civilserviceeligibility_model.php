<?php 
class civilserviceeligibility_model extends CI_Model {
	var $ParentID = 0; 
	var $CareerService = ''; 
	var $Rating  = '';
	var $DateOfExam = '';
	var $PlaceOfExam = '';
	var $ExamNo = '';
	var $DateOfRelease  = '';
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function save(){
    	$this->db->insert('civilserviceeligibility', $this);
    }
    
    function getcivilservicebyid($id){
    	return $this->db->where('ParentID', $id)->get('civilserviceeligibility');
    }
    
    function deletecivilservicebyid($id){
    	$this->db->where('ParentID', $id);
    	$this->db->delete('civilserviceeligibility');
    }
}