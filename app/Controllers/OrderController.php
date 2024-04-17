<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    private $prod;
    private $order;
    public function __construct()
    {
        $this->prod = new ProductModel();
        $this->order = new OrderModel();
    }


    public function getOrder($id)
    {
        $data['order'] = $this->prod->where('id', $id)->find();

        return view('user/order', $data);
    }

    public function confirm($price)
    {
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

    public function myOrders($prdOrder)
    {
        $data['order'] = $this->prod->where('prod_id', $prdOrder)->first();

        return view('user/order', $data);
    }
    public function viewOrders()
    {
        $user = session()->get('UserID');
        $data['order'] = $this->order->select('order.orderID, order.CustomerID, order.ProductID, 
        order.paymentStatus, order.orderType, order.orderDate, order.total, order.quantity, order.size,
        order.barcode, order.orderStatus, product_tbl.prod_id, product_tbl.prod_img, product_tbl.prod_name, 
        product_tbl.prod_mprice, product_tbl.product_status, product_tbl.prod_lprice')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')->where('order.CustomerID', $user)->findAll();

        $data['mycart'] = $this->order->select('(SUM(total)) as sum')->where('order.CustomerID', $user)->findAll(); 

       return view('user/viewOrders', $data);
    }
        
}
