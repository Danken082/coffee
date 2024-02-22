<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationModel;
use App\Models\ProductModel;

class ReservationController extends BaseController
{

    private $rsv;
    private $prod;
    public function __construct()
    {
        $this->rsv = new ReservationModel();
        $this->prod = new ProductModel();
    }
    public function reservation(){


          $reservation = new ReservationModel(); 

            $data = [
            
            'LastName' => $this->request->getVar('LastName'),
            'FirstName' => $this->request->getVar('FirstName'),
            'email' => $this->request->getVar('email'),
            'contactNo' => $this->request->getVar('contactNo'),
            'appointmentDate' => $this->request->getVar('appointmentDate'),
            'totalPayment' => $this->request->getVar('totalPayment'),
            'paymentStatus' => $this->request->getVar('paymentStatus'),
            'TableCategory' => $this->request->getVar('TableCategory'),
            'ReservationDate' => $this->request->getVar('ReservationDate'),
            ];

        $reservation->save($data);
        
    }
    //for order
    public function viewProd($prod)
    {
        $data['prod'] =  $this->prod->where('prod_id', $prod)->findAll();

        return view('user/order', $data);
        
    }

    
}
