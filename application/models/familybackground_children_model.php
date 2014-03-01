<?php
class familybackground_children_model extends CI_Model {
    var $NameOfChild = ''; 
	var $DateOfBirth = '';
	var $FamilyBackgroundID = 0;
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function saveallchildren($sql){
    	$this->db->query($sql);
    }
    
    function save(){
    	$this->db->insert('familybackground_children', $this);
    }
    
    function getchildrenbybackgroundid($id) {
    	return $this->db->where('FamilyBackgroundID', $id)->get('familybackground_children');
    }
    
    function deletebyfamilybackgroundid($id) {
    	$this->db->where('FamilyBackgroundID', $id);
    	$this->db->delete('familybackground_children');
    }
}