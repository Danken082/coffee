<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\OrderModel;
class CartController extends BaseController
{
    private $product;
    private $crt;
    private $order;
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->crt = new CartModel();
        $this->order = new OrderModel();
            // $this->load->library('/user/cart');
            // $this->load->model('ProductModel');
    }

    
   
    public function home_cart()
    {
        
        $session = session();
        $user = $session->get('UserID');
        $data['myCart'] = $this->crt->select('cart_tbl.id, cart_tbl.ProductID, cart_tbl.CustomerID, cart_tbl.total, cart_tbl.quantity, product_tbl.prod_id, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice', 'product_tbl.prod_mprice')
        ->join('product_tbl', 'product_tbl.prod_id = cart_tbl.ProductID')
        ->where('cart_tbl.CustomerID', $user)
        ->findAll();

       $data['mycart'] = $this->crt->select('(SUM(total)) as sum')->where('cart_tbl.CustomerID', $user)->findAll();    
    
     return view('/user/cart', $data);
    }

    public function addtocart($price)
    {   
    
       $size = $this->request->getVar('size'); 

      if($size ==='Large'){
        $data = $this->product->where('prod_id', $price)->first();
        $total = $data['prod_lprice'] * $this->request->getVar('quantity');
      
        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status'),
          'total' => $total,
          'size' => $size
        ];
        
        $this->crt->save($prod);
        return redirect()->to('user/cart');
      }  
      elseif($size === 'Medium'){
        $data = $this->product->where('prod_id', $price)->first();
     $total = $this->request->getVar('quantity') * $data['prod_mprice']; 
        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status'),
          'total' => $total,
          'size' => $size
        ];
        
        $this->crt->save($prod);
        return redirect()->to('user/cart');
      }  

      else 
      {
        return redirect()->to('/user/shop')->with('msg', 'Please Check Your Product');
      }
      
    }

    public function remove($id)
    {
      $this->crt->delete($id);
      return redirect()->to('/user/cart');
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
   
        $data['cart'] =  $this->product->where('prod_id', $productID)->first();
                        
        return view('user/addtocart', $data);
      }

      public function orderNow($price)
      {
        $this->product->where('prod_mprice', $price)->findAll();
        $size = $this->request->getVar('size');
        
        if($size === 'Large')
        {
        $oprice =  $this->product->where('prod_lprice', $price)->findAll();

          $total = $this->request->getVar('Quantity') * $oprice['prod_lprice']; 
          $data = [
            'ProductID' => $this->request->getVar('ProductID'),
            'CustomerID' => $this->request->getVar('CustomerID'),
            'Quantity' => $this->request->getVar('Quantity'),
            'PaymentStatus' => 'NotPaid',
            'orderType' => $this->request->getVar('orderType'),
            'orderDate' => $this->request->getVar('orderDate'),
            'totalPrice' => $total,
            'size' => $size
            
          ];
          $this->order->save($data);

          return redirect()->to('/pendingOrder');


        }
        elseif($size === 'Medium')
        {
        $oprice =  $this->product->where('prod_mprice', $price)->findAll();

          $total = $this->request->getVar('Quantity') * $oprice['prod_mprice']; 
          $data = [
            'ProductID' => $this->request->getVar('ProductID'),
            'CustomerID' => $this->request->getVar('CustomerID'),
            'Quantity' => $this->request->getVar('Quantity'),
            'PaymentStatus' => 'NotPaid',
            'orderType' => $this->request->getVar('orderType'),
            'orderDate' => $this->request->getVar('orderDate'),
            'totalPrice' => $total,
            'size' => $size
          ];
          $this->order->save($data);

          return redirect()->to('/pendingOrder');

        }
        else{
          return redirect()->to('/shop')->with('msg', 'Ensure your Order is Correct');
        }
      }

    //   public function prod()
    //   {

    //     $data = 
    //     [
    //         'CustomerID' => $this->request->getVar('CustomerID'),
    //         'ProductID' => $this->request
    //     ]
    //   }
}