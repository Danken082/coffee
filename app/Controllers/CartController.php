<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
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
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first before proceeding to the cart.');
            return redirect()->to('/login');
        }
        $cartItems = $this->crt->where('CustomerID', $user)->findAll();

        $cartItemCount = count($cartItems);

        $data = [
            'cartItemCount' => $cartItemCount,
            'cartItems' => $cartItems
        ];
    
        $data['myCart'] = $this->crt->select('cart_tbl.id, cart_tbl.size, cart_tbl.ProductID, cart_tbl.CustomerID, cart_tbl.total, cart_tbl.quantity, product_tbl.prod_id, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice')
        ->join('product_tbl', 'product_tbl.prod_id = cart_tbl.ProductID')
        ->where('cart_tbl.CustomerID', $user)
        ->findAll();
    
        $data['mycart'] = $this->crt->select('(SUM(total)) as sum')->where('cart_tbl.CustomerID', $user)->findAll();    
        
        
        return view('/user/cart', $data);
    }
    

    public function addtocart($price)
    { 

        $existCart = $this->product->where('prod_id', $price)->first();
        $myExist = $this->request->getVar('ProductID');
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
        return redirect()->to('/mainshop');
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
        return redirect()->to('/mainshop');
      }  
      else 
      {
        return redirect()->to('/mainshop')->with('msg', 'Please Check Your Product');
      }
      
    }



    public function remove($id)
    {
      $this->crt->delete($id);
      return redirect()->to(base_url('/cart'));
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

      public function getmeal($productID)
      {
        $session = session();
        $user = $session->get('UserID');
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first');
            return redirect()->to('/login');
        }
      
          $data['cart'] =  $this->product->where('prod_id', $productID)->first();
                          
          return view('user/addtocartmeal', $data);
      }

      public function getdrink($productID)
      {
        $session = session();
        $user = $session->get('UserID');
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first');
            return redirect()->to('/login');
        }
      
          $data['cart'] =  $this->product->where('prod_id', $productID)->first();
                          
          return view('user/addtocartdrink', $data);
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

      public function GotoCheckOut()
      {
        $selectedItemsOnly = $this->request->getVar('items');

          if(empty($selectedItemsOnly))
          {
            return redirect()->to('/cart')->with('msg', 'No items selected for checkOut');
          }

          $getSelected = $this->getItems($selectedItemsOnly);    
          return view('user/checkout', $getSelected);
      }

      private function getItems($selectedItemsOnly)
      {
        $getSelected['carts'] = $this->crt->whereIn('id', $selectedItemsOnly)->get()->getResultArray();

        return $getSelected;
      }



      // app/Controllers/CartController.php

      public function placeOrder()
      {
          $selectedItems = $this->request->getVar('items');

          if (empty($selectedItems)) {
              return redirect()->to('/cart')->with('msg', 'No items selected for order');
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

      public function addquantity($cartID)
{
    $updateQuantityadd = $this->updatequantity($cartID);
    $this->newQuantity($updateQuantityadd, $cartID); 
    return redirect()->to('cart')->with('msg', 'Product is now available');     

}

private function updatequantity($cartID)
{
    $updateQuantityadd = $this->crt->find($cartID);

    return $updateQuantityadd;
}

          private function newQuantity($updateQuantityadd, $cartID)
          {
          // Get the new quantity from the POST data
          $addQuantity = $this->request->getPost('newquantity');

          // Calculate the new quantity
          $newQuantity = $addQuantity + $updateQuantityadd['quantity'];

          // Update the quantity and total based on the size
          if ($updateQuantityadd['size'] === 'Medium') {
              $medium = $this->request->getPost('mprice');
              $newTotal = $medium * $newQuantity;
          } elseif ($updateQuantityadd['size'] === 'Large') {
              $large = $this->request->getPost('lprice');
              $newTotal = $large * $newQuantity;
          }

          // Prepare data to update
          $data = [
              'quantity' => $newQuantity,
              'total' => $newTotal
          ];

          // Update the cart item
          $this->crt->update($cartID, $data);
          }

        public function addToQuantity($cart)
        {
            $this->crt->where('id', $cart)->first();            
                
        }        

        public function countOnCart()
        {
          $session = session();

          $user = $session->get('UserID');

          $data = $this->crt->select('Count(*) as countCart')->findAll();

          var_dump($data);
        }
}
