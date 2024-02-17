<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->load->library('/user/cart');
        $this->load->model('ProductModel');
    }

    public function addtocart($productId)
    {
        $cart = \Config\Services::cart(); // Assuming you've set up a Cart Service
        $product = $this->product->find($productId); // Assuming you have a ProductModel
        $cart->add($product);

        // Redirect back to product page or cart page
        return redirect()->to('/user/shop')->with('success', 'Item added to cart successfully!');
    }
}
