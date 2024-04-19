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

}
