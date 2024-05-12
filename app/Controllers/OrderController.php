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
        
            $data = [
                     'ProductID' => $this->request->getPost('ProductID'),
                     'size' => $this->request->getPost('size'),
                     'quantity'  => $this->request->getPost('quantity'),
                     'status'    =>$this->request->getPost('Status'),
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


        $user = session()->get('UserID');
        $data['order'] = $this->order->select('order.orderID, order.CustomerID, order.ProductID, 
        order.paymentStatus, order.orderType, order.orderDate, order.total, order.quantity, order.size,
        order.barcode, order.orderStatus, product_tbl.prod_id, product_tbl.prod_img, product_tbl.prod_name, 
        product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')->where('order.CustomerID', $user)->where('order.orderStatus', 'AcceptOrder')->orwhere('order.orderStatus', 'onProcess')->findAll();


        return view('user/viewOrders', $data);  
    }


    
    public function feedBack()
    {
        $orderID = $this->request->getVar('orderID');
        $getID = $this->order->where('orderID', $orderID)->first();
    
        $rules = [
            'comment' => 'required|min_length[5]|max_length[150]',
            'ratings' => 'required'
        ];
        
        if ($this->validate($rules)) {
            $data = [
                'ratings' => $this->request->getVar('ratings'),
                'CustomerID' => $this->request->getVar('CustomerID'),
                'ProductID' => $this->request->getVar('ProductID'),
                'orderID' => $orderID,
                'comment' => $this->request->getVar('comment') 
            ];
        //    var_dump($getID);         
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


}
