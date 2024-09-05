<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
class ChatController extends BaseController
{
    // public function index()
    // {
    //     //
    // }
    // public function __construct()
    // {
    //     parent::__construct();
    // }
    // public function load_system_info()
    // {
    //     if()
    // }

    public function try()
    {
        $menu = new ProductModel();
        $prod['app'] = $menu->products('Appetizer');
        return view('user/pos', $prod);
    }
    public function sampleNotif()
    {
        return view("noticationtrial");
    }

}
