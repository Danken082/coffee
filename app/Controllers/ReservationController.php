<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\ProductModel;
use App\Models\ItemsModel;

class ReservationController extends BaseController
{

    private $rsv;
    private $prod;
    private $raw;

    public function __construct()
    {
        $this->raw = new ItemsModel();
        $this->rsv = new ReservationModel();
        $this->prod = new ProductModel();
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
        $menu = new ProductModel();
        $session = session();

        $getReservation = [
            
            'ProductID' => $this->request->getVar('ProductID'),
            'HCustomer' => $this->request->getVar('HCustomer'),
            'EventTitle' => $this->request->getVar('EventTitle'),
            'EventDate' => $this->request->getVar('EventDate'),
            'UpdatedContactNo' => $this->request->getVar('updatedContactNo'),
            'meal' => $menu->products('Meals'),
            'pasta' =>  $menu->products('Pasta'),
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

    public function reservationWithProducts()
    {
        $requestJSON = $this->request->getJSON();


        $saveData = [];

        foreach($requestJSON as $userReservation)
        {
            $productID = $userReservation->productId;
            

        }
    }
} 



