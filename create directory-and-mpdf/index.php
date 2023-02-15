<?php
// Define the prefix and format for the invoice number
$prefix = 'INV-';
$date_format = 'Ymd-His'; // YearMonthDay-HourMinuteSecond




// Define the invoice data
$client_name = 'jsaon';
//$invoice_number = 'INV-001';
$invoice_date = date('Y-m-d');
$invoice_amount = 100.00;

// Generate the invoice number based on the current date and time
$invoice_number = $prefix . date($date_format);

// Set up the directory structure
$invoices_dir = 'invoices';
$year_dir = date('Y');
$month_dir = date('m');
$client_dir = str_replace(' ', '', strtolower($client_name));
$directory = $invoices_dir . '/' . $year_dir . '/' . $month_dir . '/' . $client_dir;

// Create the directory if it doesn't exist
if (!is_dir($directory)) {
    mkdir($directory, 0777, true);
}

// Generate the invoice PDF file
$filename = $directory . '/' . $invoice_number . '.pdf';
// Code to generate the PDF file goes here...


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['autoPageBreak' => true]);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
//$mpdf->Output();

// Write the PDF to disk
file_put_contents($filename, $mpdf->Output('', 'S'));


// Save the invoice data to a database or other storage system
// Code to save the invoice data goes here...


?>