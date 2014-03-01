
<h1> Hello, <?php echo $id ;?> </h1>
<?php 

require '/libraries/fpdf.php';

function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$data = array();

$pdf = new PDF();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data =  array();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
