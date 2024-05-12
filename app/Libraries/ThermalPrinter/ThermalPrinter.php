<?php
// app/Libraries/ThermalPrinter/ThermalPrinter.php

namespace App\Libraries\ThermalPrinter;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class ThermalPrinter
{
    protected $printerDevice;

    public function __construct($printerDevice = 'USB001')
    {
        $this->printerDevice = $printerDevice;
    }

    public function printReceipt($content)
    {
        try {
            // Initialize printer connection
            $connector = new FilePrintConnector($this->printerDevice);
            $printer = new Printer($connector);

            // Print content
            $printer->text($content);

            // Cut paper
            $printer->cut();

            // Close connection
            $printer->close();
            
            return true; // Print successful
        } catch (\Exception $e) {
            // Handle exceptions
            return $e->getMessage(); // Return error message
        }
    }
}
