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

    
   
    public function home_cart()
    {
        
        $session = session();
        $user = $session->get('UserID');
        $data['myCart'] = $this->crt->select('cart_tbl.id, cart_tbl.ProductID, cart_tbl.CustomerID, cart_tbl.total, cart_tbl.quantity, product_tbl.prod_id, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice')
        ->join('product_tbl', 'product_tbl.prod_id = cart_tbl.ProductID')
        ->where('cart_tbl.CustomerID', $user)
        ->findAll();

       $data['mycart'] = $this->crt->select('(SUM(total)) as sum')->where('cart_tbl.CustomerID', $user)->findAll();    
    
     return view('/user/cart', $data);
    }

    public function addtocart($price)
    {   
    
       $data = $this->product->where('prod_mprice', $price)->first();
       $total = $data['prod_mprice'] * $this->request->getVar('quantity');
       

        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status'),
          'total' => $total
        ];
        
        $this->crt->save($prod);
        return redirect()->to('user/cart');
        
    }

    public function remove($id)
    {
      $this->crt->delete($id);
      return redirect()->to(base_url('user/cart'));
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
          
          $existingItem = $this->crt->where('CustomerID', $userID)->where('ProductID')->first();
  
          if($existingItem)
          {
              $update = $existingItem['quantity'] + 1;
              $this->crt->update($existingItem['id'], ['quantity' => $update]);
          }
          else
          {
              $data = [
                  'CustomerID' => $userID,
                  'ProductID' => $productID,
                  'qunatity' => 1,
                  'Status' => $this->request->getVar('Status')
              ];
              $this->crt->save($data);
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
        $this->product->where('')->findAll();
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
