<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;
class CartController extends BaseController
{
    private $product;
    private $crt;
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->crt = new CartModel();
            // $this->load->library('/user/cart');
            // $this->load->model('ProductModel');
    }

    public function sum($id)
    {
        $data = $this->product->select('prod_mprice')->findAll();

        
    }
   
    public function home_cart()
    {

        $session = session();
        $user = $session->get('UserID');
        $data['myCart'] = $this->crt->select('cart_tbl.id, product_tbl.prod_id, product_tbl.prod_name, cart_tbl.quantity, cart_tbl.total, product_tbl.prod_img, product_tbl.prod_mprice')
        ->join('product_tbl', 'cart_tbl.id = product_tbl.prod_id')->where('cart_tbl.CustomerID', $user)
        ->findAll();

        return view('/user/cart', $data);
    }

    public function addtocart()
    {

       $data = $this->product->findAll();

          
        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status')
        ];
        
        $this->crt->save($prod);
        return redirect()->to('user/cart');
        
    }
    public function Cart($productID){
        $product=  $this->product->find($productID);
        
        if(!$product)
        {
          return redirect()->to('user/shop');
        }
  
        if (!session()->has('user_id')) {
          return redirect()->to('/login')->with('error', 'Please log in to add items to your cart.');
          }
  
          $userID = session('userID');
          
          $existingItem = $this->cart->where('CustomerID', $userID)->where('ProductID')->first();
  
          if($existingItem)
          {
              $update = $existingItem['quantity'] + 1;
              $this->cart->update($existingItem['id'], ['quantity' => $update]);
          }
          else
          {
              $data = [
                  'CustomerID' => $userID,
                  'ProductID' => $productID,
                  'qunatity' => 1,
                  'Status' => $this->request->getVar('Status')
              ];
              $this->cart->save($data);
          }
  
          return redirect()->to('user/cart');
      }
      public function getProd($productID)
      {
        $session = session();
        $data['cart'] =  $this->product->where('prod_id', $productID)->first();
                        
        return view('user/addtocart', $data);
      }
}
