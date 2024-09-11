<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Printers extends BaseConfig
{
    public $printerPath;

    public function __construct()
    {
        // Load printer path dynamically from environment variable
        $this->printerPath = getenv('PRINTER_PATH') ?: 'smb://192.168.0.114/POS58_Printer'; // Fallback if env variable is not set
    }
}
