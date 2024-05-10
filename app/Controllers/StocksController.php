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
    public function stocknotif()
    { 

        $data = [
        'coffee' => $this->raw->where('rawID', '9')->first(),
        'milk' => $this->raw->where('rawID', '10')->first(),
        'smilk' => $this->raw->where('rawID', '11')->first(),
        'hcream' => $this->raw->where('rawID', '12')->first(),
        'wcream' => $this->raw->where('rawID', '13')->first(),
        'syrup' => $this->raw->where('rawID', '14')->first(),
        'sauce' => $this->raw->where('rawID', '15')->first(),
        'frPowder' => $this->raw->where('rawID', '16')->first(),
        'wsugar' => $this->raw->where('rawID', '17')->first(),
        'bsugar' => $this->raw->where('rawID', '18')->first(),
        'chicken' => $this->raw->where('rawID', '19')->first(),
        'pork' => $this->raw->where('rawID', '20')->first(),
        'beef' => $this->raw->where('rawID', '21')->first(),
        'tortillas' => $this->raw->where('rawID', '22')->first(),
        'echeese' => $this->raw->where('rawID', '23')->first(),
        'shrimp' => $this->raw->where('rawID', '24')->first(),
        'cfudge' => $this->raw->where('rawID', '43')->first(),
        'scheese' => $this->raw->where('rawID', '44')->first(),
        'qmelt' => $this->raw->where('rawID', '45')->first(),
        'egg' => $this->raw->where('rawID', '46')->first(),
        'lettuce' => $this->raw->where('rawID', '47')->first(),
        'tuna' => $this->raw->where('rawID', '48')->first(),
        'bacon' => $this->raw->where('rawID', '49')->first(),
        'ppork' => $this->raw->where('rawID', '50')->first(),
        'bratwurst' => $this->raw->where('rawID', '51')->first(),
        'smokedham' => $this->raw->where('rawID', '52')->first(),
        'porkRibs' => $this->raw->where('rawID', '53')->first(),
        'gbeef' => $this->raw->where('rawID', '54')->first(),
        'liempo' => $this->raw->where('rawID', '55')->first(),
        'tbeef' => $this->raw->where('rawID', '56')->first(),
        'tIslands' => $this->raw->where('rawID', '57')->first(),
        'cIslands' => $this->raw->where('rawID', '58')->first(),
        'mustart' => $this->raw->where('rawID', '59')->first(),
        'mupledsyrup' => $this->raw->where('rawID', '60')->first(),
        'mushroom' => $this->raw->where('rawID', '61')->first(),
        'onion' => $this->raw->where('rawID', '62')->first(),
        'garlic' => $this->raw->where('rawID', '63')->first(),
        'parsley' => $this->raw->where('rawID', '64')->first(),
        'spiringonion' => $this->raw->where('rawID', '65')->first(),
        'bellpepper' => $this->raw->where('rawID', '66')->first(),
        'oil' => $this->raw->where('rawID', '67')->first(),
        'soysouce' => $this->raw->where('rawID', '68')->first(),
        'vinigar' => $this->raw->where('rawID', '69')->first(),
        'knorseasoning' => $this->raw->where('rawID', '70')->first(),
        'KnorCube' => $this->raw->where('rawID', '71')->first(),
        'ketchup' => $this->raw->where('rawID', '72')->first(),
        'salt' => $this->raw->where('rawID', '73')->first(),
        'pepper' => $this->raw->where('rawID', '74')->first(),
        'butter' => $this->raw->where('rawID', '75')->first(),
        'mayonaise' => $this->raw->where('rawID', '76')->first(),
        'starmargarine' => $this->raw->where('rawID', '77')->first(),
        'icecream' => $this->raw->where('rawID', '78')->first(),
        'tomatosouce' => $this->raw->where('rawID', '79')->first(),
        'potato'    => $this->raw->where('rawID', '80')->first(),
        'pasta' => $this->raw->where('rawID', '81')->first(),
        'bfssandwich' => $this->raw->where('rawID', '82')->first(),
        'bfsoup' => $this->raw->where('rawID', '83')->first(),
        'coke1' => $this->raw->where('rawID', '84')->first(),
        ];
    }

}
