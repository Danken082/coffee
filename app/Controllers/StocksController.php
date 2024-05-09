<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemsModel;
class StocksController extends BaseController
{

    private $item;

    public function __construct()
    {
        $this->item = new ItemsModel();
    }
    public function stocks()
{
    $coffee = $this->item->where('rawID', '9')->first();

    if ($coffee) {
        $change = $coffee['stocks'] - 3;
        $data = ['stocks' => $change];
    
        // Update the row in the database
        $this->item->update($coffee['rawID'], $data);
    } else {
        // Handle the case when no row is found for rawID = 9
        log_message('error', 'No row found for rawID = 9');
    }
}


}
