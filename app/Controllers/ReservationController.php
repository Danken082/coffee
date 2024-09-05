<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\ProductModel;
use App\Models\ItemsModel;
use App\Models\CartModel;

use DateTime;

class ReservationController extends BaseController
{

    private $rsv;
    private $prod;
    private $raw;
    private $crt;

    public function __construct()
    {

        date_default_timezone_set('Asia/Manila');
        $this->raw = new ItemsModel();
        $this->rsv = new ReservationModel();
        $this->prod = new ProductModel();
        $this->crt = new CartModel();

        helper('DateTime');
    }
    public function reservation()
    {
        $session = session();
        $user = $session->get('UserID');
        if (!$user) {
            $session->setFlashdata('error', 'You need to login first');
            return redirect()->to('/login');
        }

          $reservation = new ReservationModel(); 

            $data = [
            'CustomerID' => $this->request->getVar('CustomerID'),
            'apppointmentDate' => $this->request->getVar('apppointmentDate'),
            'Message' => $this->request->getVar('message'),
            'TableType' => $this->request->getVar('TableType')
                  ];

            $reservation->save($data);
        return redirect()->to('mainhome');
    }
    //for order
    public function viewProd($prod)
    {
        $data['prod'] =  $this->prod->where('prod_id', $prod)->findAll();
        
        return view('user/order', $data);
        
    }


    public function getResevartion()
    {

        $firstname = $this->request->getVar('FirstName');
        $lastname = $this->request->getVar('LastName');
        $contact = $this->request->getVar('contact');
        $HC = $this->request->getVar('hc');
        $email = $this->request->getVar('email');
        $date = $this->request->getVar('date');
        $message = $this->request->getVar('message');
        
        $menu = new ProductModel();
        $session = session();



        $getReservation = [
            'firstname'        => $firstname, 
            'lastname'         => $lastname,
            'contact'          => $contact,
            'hc'               => $HC,
            'email'            => $email,
            'date'             => $date,
            'message'          => $message, 
            'ProductID'        => $this->request->getVar('ProductID'),
            'HCustomer'        => $this->request->getVar('HCustomer'),
            'EventTitle'       => $this->request->getVar('EventTitle'),
            'EventDate'        => $this->request->getVar('EventDate'),
            'UpdatedContactNo' => $this->request->getVar('updatedContactNo'),
            'meal'             => $menu->products('Meals'),
            'pasta'            =>  $menu->products('Pasta'),
            'app' => $menu->products('Appetizer'),
            'salad' => $menu->products('Salad'),
            'soup' => $menu->products('Soup'),
            'sand' => $menu->products('Sandwich'),
            'hot' => $menu->products('Hot Coffee'),
            'iced' => $menu->products('Iced Coffee'),
            'flav' => $menu->products('Flavored Coffee'),
            'non' =>  $menu->products('Non Coffee Frappe'),
            'coffee' =>$menu->products('Coffee Frappe'),
            'other' => $menu->products('Others'),
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];

        return view('user/ProdReservation/reservationWorderingProduct', $getReservation);
    }

  

 
    public function previewReservation()
    {
       $session = session();
       $user = $session->get('UserID');
       $lastname  = $this->request->getPost('LastName');
       $firstname = $this->request->getVar('FirstName');
       $email     = $this->request->getVar('Email');
       $date      = $this->request->getVar('apppointmentDate');
       $contact   = $this->request->getVar('ContactNo');
       $HC        = $this->request->getVar('HCustomer');
       $date      = $this->request->getVar('apppointmentDate');
       $message   = $this->request->getVar('message');


       $cartItems = $this->crt->where('CustomerID', $user)->findAll();

       $cartItemCount = count($cartItems);

       $dateFormat = new DateTime($date);
       $dFormat    = $dateFormat->format('F j, Y, H:i:s');

       $data = [
        'lastname'  => $lastname,
        'firstname' => $firstname,
        'email'     => $email,
        'contact'   => $contact,
        'hc'        => $HC,
        'message'   => $message,
        'date'      => $dFormat,
        'cartItemCount' => $cartItemCount,
        'cartItems' => $cartItems
       ];

    //    echo $lastname;
        return view('user/previewReservation', $data);
    }

    //get the data to save the data payment

    public function getResevartionData()
    {
        $productReservation = $this->request->getJSON();
        
        $getData = [];
        foreach($productReservation as $i)
        {
            $productID = $i->productId;
            $totalPrice = $i->totalPrice;
            $quantity = $i->totalquantity;

            $getData[] = ['productID' => $productID,
                          'totalPrice' => $totalPrice,
                          'quantity' => $quantity];
        }

        return $this->response->setJSON([
            'sucess' => true,
            'data' => $getData
        ]); 
    }

    public function paymentView()
    {   
        return view('user/ProdReservation/getdataTosave');
    }


    public function saveData()
    {
        $session = session();
        $user = $session->get('UserID');

        $CustomerID = $this->request->getVar($user);
        $lastname = $this->request->getVar('lastName');
        $firstname = $this->request->getVar('lirstName');
        $contact   = $this->request->getVar('contact');
        $email = $this->request->getVar('email');

        $hc = $this->request->getVar('hc');
        $date = $this->request->getVar('date');
        $message = $this->request->getVar('message');
        $productID = $this->request->getVar('productId');

        $products = $this->request->getPost('products');
        $formatDate = date('Y-m-d H:i:s', strtotime($date));



        if($products)
        {
            foreach($products as $item)
            {
                $productId = $item['productId'];
                $totalQuantity = $item['totalQuantity'];

                $data  = [
                    'ProductID' => $productID,
                    'CustomerID' => $user,
                    'HCustomer' => $hc,
                    'appointmentDate' => $formatDate,
                    'Message' => $message,
                    'ProductID' =>$productId,
                    'quantity' => $totalQuantity
                ];

                $this->rsv->insert($data);

            }
        }
        


        $data  = [
                  'ProductID' => $productID,
                  'CustomerID' => $user,
                  'HCustomer' => $hc,
                  'appointmentDate' => $formatDate,
                  'Message' => $message];
        //     $this->rsv->insert($prosu);
        //     var_dump($products);
            // return redirect()->to('/');
            
    }

} 



