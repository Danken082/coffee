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
        $this->crt   = new CartModel();
        $this->prod  = new ProductModel();
        $this->order = new OrderModel();
        $this->fb    = new FeedbackModel();
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
        $user = session()->get('UserID');
        $data['order'] = $this->order->select('order.orderID, order.CustomerID, order.ProductID, 
        order.paymentStatus, order.orderType, order.orderDate, order.total, order.quantity, order.size,
        order.barcode, order.orderStatus, product_tbl.prod_id, product_tbl.prod_img, product_tbl.prod_name, 
        product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')->where('order.CustomerID', $user)->findAll();
    }


    public function inputFeedback()
    {
        return view('user/feedback');
    }

    public function feedBack()
    {
        $rules = [
         'comment' => 'required|min_length[5]|max_length[150]'
        ];

        if($this->validate($rules))
        {
            $data = [
                    'ratings' => $this->request->getVar('ratings'),
                    'CustomerID' => $this->request->getVar('CustomerID'),
                    'ProductID' => $this->request->getVar('ProductID'),
                    'orderID' => $this->request->getVar('orderID'),
                    'comment' => $this->request->getVar('comment') 
                    ];

                    $this->fb->insert($data);

                    return redirect()->to('myorder')->with('msg', 'Thank Your For Your Feedback');
        }

        else
        {
            $data['validator'] = $this->validator;

            return view('user/feedback', $data);
        }
    }
}
