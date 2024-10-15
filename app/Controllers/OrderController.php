<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\FeedbackModel;


class OrderController extends BaseController
{
    private $prod;
    private $order;
    private $crt;
    private $fb;

    public function __construct()
    {
        helper('date');

        $this->crt   = new CartModel();
        $this->prod  = new ProductModel();
        $this->order = new OrderModel();
        $this->fb    = new FeedbackModel();
    }
   
    // In your CodeIgniter controller
        public function saveOrder()
        {
            // Retrieve the order data from the request
            $orderData = $this->request->getJSON();
            $orders = $orderData->orders;
            $total = $orderData->total;

            $this->order->insert(['total' => $total]);

            // Return a JSON response indicating success or failure
            return $this->response->setJSON(['success' => true, 'message' => 'Order saved successfully']);
        }


    public function getOrder($id)
    {
        $data['order'] = $this->prod->where('id', $id)->find();

        return view('user/order', $data);
    }

    public function confirm($price)
    {
        $mySize = $this->request->getVar('ProductID');
        $size = $this->request->getVar('size');
        $rules = [
            'prod_name' => 'required',
            'quantity' => 'required|numeric|greater_than[0]',
            'size' => 'required'
        ];
       
        if($this->validate($rules))
        {
           
            if($size === 'Medium')
            {
                $oprice = $this->prod->where('prod_mprice', $price)->find();

                $total = $this->request->getVar('quantity') * $oprice['prod_mprice'];

                $data = [
                    'ProductID'     => $this->request->getVar('ProductID'),
                    'CustomerID'    => $this->request->getVar('CustomerID'),
                    'prod_name'     => $this->request->getVar('prod_name'),
                    'size'          => $size,
                    'PaymentStatus' => 'NotPaid',
                    'total'         => $total,
                    'quantity'      => $this->request->getVar('quantity'),
                    'orderStatus'   => $this->request->getVar('Status')
                ];  

              $this->prod->save($data);
              return redirect()->to('user/shop')->with('msg', 'Your Order Has Been Successfully Ordered');


            }

            elseif($size == 'Large')
            {
                $oprice = $this->prod->where('prod_lprice', $price)->find();
                $total = $this->request->getVar('quantity') * $oprice['prod_mprice'];

                $data = [
                    'ProductID'     => $this->request->getVar('ProductID'),
                    'CustomerID'    => $this->request->getVar('CustomerID'),
                    'prod_name'     => $this->request->getVar('prod_name'),
                    'size'          => $size,
                    'PaymentStatus' => 'NotPaid',
                    'total'         => $total,
                    'quantity'      => $this->request->getVar('quantity'),
                    'orderStatus'   => $this->request->getVar('Status')
                    ];  
                    $this->prod->save($data);
                    return redirect()->to('user/shop')->with('msg', 'Your Order Has Been Successfully Ordered');
            }
            else{
                return redirect()->to('/shop')->with('msg', 'Ensure your Order is Correct');
              }
        }
    }


    public function placeToOrder()
    {
        $user = session()->get('UserID');  
        $cartItems = $this->crt->where('CustomerID', $user)->findAll();
        $cartItemCount = count($cartItems);
        $price  = $this->request->getPost('price');
        $quantity = $this->request->getPost('quantity');
        $prodName = $this->request->getPost('prodName');
        $total = $price * $quantity;

            $data = [
                     'ProductID' => $this->request->getPost('ProductID'),   
                     'size' => $this->request->getPost('size'),
                     'quantity'  => $this->request->getPost('quantity'),
                     'status'    =>$this->request->getPost('Status'),
                     'price'     => $this->request->getPost('price'),
                     'cartItemCount' => $cartItemCount,
                     'cartItems' => $cartItems,
                     'total' => $total,
                     'prodName' => $prodName
                     ]; 

                    return view('user/checkoutorder', $data);
    } 

    public function myOrdersmeal($prdOrder)
    {
        $session = session();
        $user = $session->get('UserID');
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first');
            return redirect()->to('/login');
        }
        $data['order'] = $this->prod->where('prod_id', $prdOrder)->first();

        return view('user/ordermeal', $data);
    }

    public function myOrdersdrink($prdOrder)
    {
        $session = session();
        $user = $session->get('UserID');
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first');
            return redirect()->to('/login');
        }
        $data['order'] = $this->prod->where('prod_id', $prdOrder)->first();

        return view('user/orderdrink', $data);
    }

    public function getOrderSave($id)
    {

        $data['order'] = $this->order->select('order.orderID, order.CustomerID, order.ProductID, 
        order.paymentStatus, order.orderType, order.orderDate, order.total, order.quantity, order.size,
        order.barcode, order.orderStatus, product_tbl.prod_id, product_tbl.prod_img, product_tbl.prod_name, 
        product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice, product_tbl.prod_desc')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')->first();

        return view('user/getOrder', $data);


    }

    public function saveOrders($price)
    {
        $existCart = $this->prod->where('prod_id', $price)->first();
        $myExist = $this->request->getVar('ProductID');
        $size = $this->request->getVar('size'); 
        
      if($size ==='Large'){
        $data = $this->prod->where('prod_id', $price)->first();
        $total = $data['prod_lprice'] * $this->request->getVar('quantity');
      
        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status'),
          'total' => $total,
          'size' => $size,
          'orderStatus' => 'onProcess',
          'orderType' => 'onHouse'
        ];
        
        $this->order->save($prod);
        return redirect()->to('/mainshop');
      }
      elseif($size === 'Medium'){
        $data = $this->prod->where('prod_id', $price)->first();
        $total = $this->request->getVar('quantity') * $data['prod_mprice']; 
        $prod = [
          'CustomerID' => $this->request->getVar('CustomerID'),
          'ProductID' => $this->request->getVar('ProductID'),
          'quantity' => $this->request->getVar('quantity'),
          'Status' => $this->request->getVar('Status'),
          'total' => $total,
          'size' => $size,
          'orderStatus' => 'onProcess',
          'orderType' => 'onHouse'
          
        ];
        
        $this->order->save($prod);
        return redirect()->to('/mainshop');
    }
}
    public function viewOrders()
    {
        $session = session();
        $user = $session->get('UserID');
        $cartItems = $this->crt->where('CustomerID', $user)->findAll();

        $cartItemCount = count($cartItems);

        $data = [
            'cartItemCount' => $cartItemCount,
            'cartItems' => $cartItems
        ];



        $data['order'] = $this->order->select('order.orderID, order.CustomerID, order.ProductID, 
        order.paymentStatus, order.orderType, order.orderDate, order.total, order.quantity, order.size,
        order.barcode, order.orderStatus, product_tbl.prod_id, product_tbl.prod_img, product_tbl.prod_name, 
        product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')->where('order.CustomerID', $user)->where('order.orderStatus', 'AcceptOrder')->orwhere('order.orderStatus', 'onProcess')->findAll();
        
        
        $data['orderhist'] = $this->order->select('order.ProductID,
            MAX(order.orderID) as orderID,
            order.CustomerID,
            MAX(order.paymentStatus) as paymentStatus,
            MAX(order.orderType) as orderType,
            MAX(order.orderDate) as orderDate,
            SUM(order.total) as total,
            SUM(order.quantity) as quantity,
            MAX(order.size) as size,
            MAX(order.barcode) as barcode,
            MAX(order.orderStatus) as orderStatus,
            product_tbl.prod_id,
            MAX(product_tbl.prod_img) as prod_img,
            MAX(product_tbl.prod_name) as prod_name,
            MAX(product_tbl.prod_mprice) as prod_mprice,
            MAX(product_tbl.product_status) as product_status,
            MAX(product_tbl.prod_lprice) as prod_lprice,
            MAX(product_tbl.prod_desc) as prod_desc')
            ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')
            ->where('order.CustomerID', $user)
            ->groupBy('order.ProductID, order.CustomerID, product_tbl.prod_id')
            ->findAll();
            
        return view('user/viewOrders', $data);  
    }


    
    public function feedBack()
    {
        $orderID = $this->request->getVar('orderID');
        $getID = $this->order->where('orderID', $orderID)->first();

        $rules = [
            'comment' => 'required|min_length[5]|max_length[150]',
            'ratings' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]'
        ];
        
        if ($this->validate($rules)) {
            $data = [
                'ratings' => $this->request->getVar('ratings'),
                'CustomerID' => $this->request->getVar('CustomerID'),
                'ProductID' => $this->request->getVar('ProductID'),
                'orderID' => $orderID,
                'comment' => $this->request->getVar('comment') 
            ];

            $upData = ['orderStatus' => 'OrderReceived'];
            $update = $this->order->update($getID['orderID'], $upData);
            
            $this->fb->insert($data);

            return redirect()->to('myOrders')->with('msg', 'Thank you for your feedback.');
        } else {
            return redirect()->to('myOrders')->with('msg', 'Invalid input. Feedback not submitted.');
        }
    }

    public function getProdUser()
    {
        $orderID = $this->request->getVar('orderID');
        $getID = $this->order->where('orderID', $orderID)->first();

        $data = [
            'ProductID' => $this->request->getPost('ProductID'),
            'orderID' => $this->request->getPost('orderID'),
        ];

       return view('user/feedback', $data);
    }

    public function coffeereceipt()
    {
        // Load necessary helpers

        // Sample data for receipt (you can fetch data from your database)
        $data = [
            'customer_name' => 'John Doe',
            'amount_paid' => 25.00,
            'items' => [
                ['name' => 'Coffee', 'price' => 5.00],
                ['name' => 'Sandwich', 'price' => 10.00],
                ['name' => 'Cake', 'price' => 10.00]
            ],
            'payment_date' => date('Y-m-d H:i:s')
        ];

        // Load the view and pass the data
        return view('user/receipt', $data);
    }


    public function viewFeedbackForCoffee($prodID)
    {
        $feedback = $this->fb->select('feedback_tbl.feedbackID, feedback_tbl.ratings, 
            feedback_tbl.comment, feedback_tbl.orderID, feedback_tbl.ProductID, feedback_tbl.CustomerID, feedback_tbl.created_at,
            user.UserID, user.Username, user.LastName, user.FirstName, product_tbl.prod_id, product_tbl.prod_name')
            ->join('user', 'user.UserID = feedback_tbl.CustomerID')
            ->join('product_tbl', 'product_tbl.prod_id = feedback_tbl.ProductID')
            ->where('feedback_tbl.ProductID', $prodID)
            ->findAll();
        
        usort($feedback, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
    
        $latestFeedback = [];
    
        foreach ($feedback as $customerComment) {
            $username = $customerComment['Username'];
            if (!isset($latestFeedback[$username])) {
                $latestFeedback[$username] = $customerComment;
            }
        }
        $latestFeedback = array_values($latestFeedback);
    
        $data = [
            'feedback' => $latestFeedback
        ];
        return view('user/forFeedback/viewfeedback', $data);
    }    

    public function receipt()
    {

        $barcode = $this->request->getVar('barcode');
     
         $data['single'] =  $this->order->select('order.orderID, order.CustomerID, order.ProductID, order.paymentStatus, 
         order.orderType, order.orderDate, order.total, order.quantity, order.size, order.barcode, order.orderStatus,
         product_tbl.prod_id, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, 
         product_tbl.prod_lprice, product_tbl.prod_desc, product_tbl.prod_img, product_tbl.prod_categ, product_tbl.prod_code,
         user.UserID, user.LastName, user.FirstName, user.email, user.address, user.ContactNo')
         ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')
         ->join('user', 'user.UserID = order.CustomerID')
         ->like('order.barcode', $barcode)
         ->where('order.orderStatus', 'acceptOrder')->first(); 
         
 
         //for Multi Data
        $data['barcode'] =  $this->order->select('order.orderID, order.CustomerID, order.ProductID, order.paymentStatus, 
         order.orderType, order.orderDate, order.total, order.quantity, order.size, order.barcode, order.orderStatus,
         product_tbl.prod_id, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, 
         product_tbl.prod_lprice, product_tbl.prod_desc, product_tbl.prod_img, product_tbl.prod_categ, product_tbl.prod_code,
         user.UserID, user.LastName, user.FirstName, user.email, user.address, user.ContactNo')
         ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')
         ->join('user', 'user.UserID = order.CustomerID')
         ->like('order.barcode', $barcode)
         ->where('order.orderStatus', 'acceptOrder')->findAll();
        return view('user/receipt', $data);

    }

    private function generateAlphanumericBarcode($length = 10)
    {
       $characters = 'QW123YOPP456ASKFJ789ZXCBN10LKJ';
       $barcodeData = '';
   
       for ($i = 0; $i < $length; $i++) {
           $barcodeData .= $characters[rand(0, strlen($characters) - 1)];
       }
   
       return $barcodeData;
   }

    public function paymentOrder()
    {
        $orderCode = $this->generateAlphanumericBarcode();

        $data = [
            'CustomerID' => $this->request->getVar('CustomerID'),
            'ProductID' => $this->request->getVar('ProductID'),
            'quantity' => $this->request->getVar('quantity'),
            'size' => $this->request->getVar('size'),
            'total' => $this->request->getVar('total'),
            'barcode' => 'CrossroadsOnline-' .$orderCode,
            'orderType' => 'DineIn',
            'orderStatus' => 'onProcess',
            'reference_number' => 'this is an Cash Payment',

        ];

        $this->order->insert($data);

        return redirect()->to('/');
    }




   
//    public function paymentOrder()
// {
//     // $totalPrice 
//     // $totalAmount = $this->request->getPost('total');
//     // $subPayment = $totalAmount * 100;

//     // $curl = curl_init();

//     // curl_setopt_array($curl, [
//     //     CURLOPT_URL => "https://api.paymongo.com/v1/links",
//     //     CURLOPT_RETURNTRANSFER => true,
//     //     CURLOPT_ENCODING => "",
//     //     CURLOPT_MAXREDIRS => 10,
//     //     CURLOPT_TIMEOUT => 30,
//     //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     //     CURLOPT_CUSTOMREQUEST => "POST",
//     //     CURLOPT_POSTFIELDS => json_encode([
//     //         'data' => [
//     //             'attributes' => [
//     //                 'amount' => $subPayment,
//     //                 'description' => 'Payment For Orders',
//     //                 'remarks' => 'Payment'
//     //             ]
//     //         ]
//     //     ]),
//     //     CURLOPT_HTTPHEADER => [
//     //         "accept: application/json",
//     //         "authorization: Basic c2tfdGVzdF90djNzdjRUSHhtR1ZaZWRIWjhwYlVBZjQ6",
//     //         "content-type: application/json"
//     //     ],
//     // ]);

//     // $response = curl_exec($curl);
//     // $decode = json_decode($response, TRUE);
//     // $err = curl_error($curl);

//     // curl_close($curl);

//     // if ($err) {
//     //     echo "cURL Error #:" . $err . " Please Check Your Internet Connection";
//     // } 
//     // else {
//     //     if (isset($decode['data']['attributes']['reference_number'])) { 
//     //         $reference_number = $decode['data']['attributes']['reference_number'];

//             $data = [
//                 'ProductID' => $this->request->getPost('ProductID'),
//                 'paymentStatus' => 'checking',
//                 'orderStatus' => 'onProcess',
//                 'CustomerID' => $this->request->getPost('CustomerID'),
//                 'quantity' => $this->request->getPost('quantity'),
//                 'total' => $this->request->getPost('total'),
//                 'size' => $this->request->getPost('size'),
//                 'reference_number' => '$reference_number'
//             ];
//             $this->order->insert($data);

//             foreach ($decode as $key => $value) {
//                 $name = $decode[$key]["attributes"]["checkout_url"];
//                 $age = $decode[$key]["type"];
//                 return redirect()->to($name);
//             }
//         }
        
//         // else {
//         //     // Handle the case where the reference number is null
//         //     echo "Error: Reference number is not available. Please try again.";
//         // }
//     }
}


// }
