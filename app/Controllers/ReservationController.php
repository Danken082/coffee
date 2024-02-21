<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationModel;

class ReservationController extends BaseController
{

    private $rsv;

    public function __construct()
    {
        $this->rsv = new ReservationModel();
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
}
