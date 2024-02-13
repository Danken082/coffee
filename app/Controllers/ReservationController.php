<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservationModel;

class ReservationController extends BaseController
{
    public function reservation(){


          $reservation = new ReservationModel(); 

            $data = [
            
            'CustomerID' => $this->request->getVar('CustomerID');
            'productID' => $this->request->getVar('productID');
            'totalPayment' => $this->request->getVar('totalPayment');
            'paymentStatus' => $this->request->getVar('paymentStatus');
            'TableCategory' => $this->request->getVar('TableCategory');
            'ReservationDate' => $this->request->getVar('ReservationDate');
        ];

        $reservation->save($data);
        
    }
}
