<?php
require_once 'C:\xampp\htdocs\GardenGURU\TCPDF-main\tcpdf.php';

// extend TCPF with custom functions
class MYPDF extends TCPDF
{

    // Load table data from file
    // public function LoadData($file) {
    //     // Read file lines
    //     $lines = file($file);
    //     $data = array();
    //     foreach($lines as $line) {
    //         $data[] = explode(';', chop($line));
    //     }
    //     return $data;
    // }

    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width, and bold font
        $this->SetFillColor(13, 201, 113);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        // Header
        $w = array(40, 35, 45); // Adjusted column widths
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();

        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');





        $total = 123;
        $text = "Total = $total";
        // Customer details
        $customerName = 'John Doe';
        $customerAddress = '123 Main Street, Cityville, State, ZIP';
        $customerEmail = 'johndoe@example.com';





        // Data
        $fill = 0;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row[3], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Customer details
        $this->Cell(0, 10, 'Bill To:', 0, 1);
        $this->Cell(0, 10, $customerName, 0, 1);
        $this->Cell(0, 10, $customerAddress, 0, 1);
        $this->Cell(0, 10, $customerEmail, 0, 1);
        $this->Ln();
        $this->Ln();
        
        
        $this->Cell(45, 10, 'Item', 1);
        $this->Cell(40, 10, 'Qty', 1);
        $this->Cell(40, 10, 'Unit Price', 1);
        $this->Cell(40, 10, 'Total', 1);
        
        $this->Ln();
        $this->Cell(45, 10, 'Item', 1);
        $this->Ln();
        $this->Cell(0, 10, $text, 1, 1, 'C', 0, '', 0);

        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('GardenGuru');
$pdf->SetTitle('GardenGuru');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "GardenGURU" . ' ', "Our Customers\nwww.gardenguru.lk");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Country', 'Capital', 'Area (sq km)', 'tttttt');

// data loading
////////////////////////////////////// $data = $pdf->LoadData('data/table_data_demo.txt');
$data = array(
    array('John', 'Doe', '30', 'dhdhe'),
    array('Alice', 'Smith', '25', 'dhethe'),
    array('Bob', 'Johnson', '28', 'erghe')
);
// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
