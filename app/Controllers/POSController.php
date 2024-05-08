<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class POSController extends BaseController
{

    private $prd;

    public function __construct()
    {
        $this->prd = new ProductModel();
    }
    public function product()
    {
        $menu = new ProductModel();
        $session = session();
    // $data = 
    // $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

    // $cartItems = $this->crt->where('CustomerID', $user)->findAll();

    // $cartItemCount = count($cartItems);

    $data = [
        // 'cartItemCount' => $cartItemCount,
        // 'cartItems' => $cartItems,
       'meal' => $menu->products('Meals'),
       'pasta' =>  $menu->products('Pasta'),
       'app' => $menu->products('Appetizer'),
       'salad' => $menu->products('Salad'),
       'soup' => $menu->products('Soup'),
       'sand' => $menu->products('Sandwich'),
       'hot' => $menu->products('Hot Coffee'),
       'iced' => $menu->products('Iced Coffee'),
       'flav' => $menu->products('Flavored Coffeee'),
        'non' =>  $menu->products('Non Coffee Frappe'),
        'coffee' =>$menu->products('Coffee Frappe'),
        'other' => $menu->products('Others'),


    ];   return view('/POS/POS', $data);
    }
}
