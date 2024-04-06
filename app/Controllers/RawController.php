<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RawModel;

class RawController extends BaseController
{
    
    private $raw;
    public function __construct()
    {
        $this->raw = new RawModel();
    }

    public function dataUpdating()
    {
        $d1 = 1;
        $d2 = 2;

        $data = $d1 - $d2;

        echo $data;
    }
}
