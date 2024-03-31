<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Common\Mode;
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
<<<<<<< Updated upstream
        $data['myCart'] = $this->crt->select('cart_tbl.id, cart_tbl.ProductID, cart_tbl.CustomerID, cart_tbl.total, cart_tbl.quantity, product_tbl.prod_id, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice, product_tbl.product_status')
=======
        $data['myCart'] = $this->crt->select('cart_tbl.id, cart_tbl.size, cart_tbl.ProductID, cart_tbl.CustomerID, cart_tbl.total, cart_tbl.quantity, product_tbl.prod_id, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice, product_tbl.product_status', 'product_tbl.prod_mprice')
>>>>>>> Stashed changes
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

      // app/Controllers/CartController.php

      public function placeOrder()
      {
          $selectedItems = $this->request->getVar('items');

          if (empty($selectedItems)) {
              return redirect()->to('user/cart')->with('msg', 'No items selected for order');
          }

          $cartItems = $this->getCartItems($selectedItems);

          // Generate a single barcode for the entire order
          $orderBarcode = $this->generateAlphanumericBarcode();

          // Insert the same barcode for each item in the order
          foreach ($cartItems as &$item) {
              $item['barcode'] = $orderBarcode;
          }

          $this->insertOrder($cartItems);
          $this->removedItemsFromcart($selectedItems);

          return redirect()->to('user/cart')->with('msg', 'Order Placed successfully');
      }

      
      private function generateAlphanumericBarcode($length = 10)
      {
          $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $barcodeData = '';
      
          for ($i = 0; $i < $length; $i++) {
              $barcodeData .= $characters[rand(0, strlen($characters) - 1)];
          }
      
          return $barcodeData;
      }
      private function getCartItems($selectedItems)
      {
        $cartItems = $this->crt->whereIn('id', $selectedItems)->get()->getResultArray();

        return $cartItems;
      }
      private function insertOrder($cartItems)
      {
          $oData = [];
      
          foreach ($cartItems as $item) {
              $oData[] = [
                  'CustomerID' => $item['CustomerID'],
                  'ProductID' => $item['ProductID'],
                  'total' => $item['total'],
                  'quantity' => $item['quantity'],
                  'size' => $item['size'],
                  'orderStatus' => 'onProcess',
                  'paymentStatus' => 'notPaid',
                  'orderType' => 'onHouse',
                  'paymentStatus' => 'COD',
                  'barcode' => $item['barcode'],
                    ];
          }
      
          $this->order->insertBatch($oData);
      }
      
      private function removedItemsFromcart($selectedItems)
      {
          $this->crt->whereIn('id', $selectedItems)->delete();
      }
    }
