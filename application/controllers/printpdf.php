<?php
class printpdf extends  CI_Controller {
	
	function printpdf()
	{
		parent::__construct();
		$this->load->library('fpdf'); // Load library
		$this->fpdf->fontpath = 'font/'; // Specify font folder
	}
	
	public function index(){
		// Generate PDF by saying hello to the world
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('Arial','B',12);
		
		//$this->fpdf->MultiCell(300,10,'Personal Data Sheet');
		//$this->fpdf->MultiCell(40,10,'Hello World!');
		//$this->fpdf->MultiCell(40,10,'Hello World!');
		
		$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
		$data = array();
		
		$this->BasicTable($header, $data);
		
		$this->fpdf->Output();
	}
	
	function BasicTable($header, $data)
	{
	    // Header
	    foreach($header as $col)
	        $this->fpdf->Cell(40,7,$col,1);
	    $this->fpdf->Ln();
	    // Data
	    foreach($data as $row)
	    {
	        foreach($row as $col)
	            $this->fpdf->Cell(40,6,$col,1);
	        $this->fpdf->Ln();
	    }
	}
	
	function tempoprint(){
		$id = $this->uri->segment(3);
		$this->load->view('printpdsview');
	}
}