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
            'app' => $menu->products('Appetizer'),
            'meal' => $menu->products('Meals'),
            'chicken' => $menu->products('Chicken'),
            'chickenfillet' => $menu->products('Chicken Fillet'),
            'pasta' => $menu->products('Pasta'),
            'salad' => $menu->products('Salad'),
            'sand' => $menu->products('Sandwich'),
            'hot' => $menu->products('Hot Coffee'),
            'iced' => $menu->products('Iced Coffee'),
            'flav' => $menu->products('Flavored Coffee'),
            'frap' =>$menu->products('Frappe'),
            'lemon' => $menu->products('Lemonade'),
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
            $productSize = $i->productSize;

            $getData[] = ['productID' => $productID,
                          'totalPrice' => $totalPrice,
                          'quantity' => $quantity,
                          'productSize' => $productSize];
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
    $barOrderCode = $this->getBarcodeByOrder();    
    
    if ($this->request->getMethod() === 'post') {

        // Retrieve general customer information
        $lastname = $this->request->getVar('lastName');
        $firstname = $this->request->getVar('firstName'); // Fixed typo
        $contact   = $this->request->getVar('contact');
        $email = $this->request->getVar('email');
        $hc = $this->request->getVar('hc');
        $date = $this->request->getVar('date');
        $message = $this->request->getVar('message');

        // Retrieve products data
        $products = $this->request->getPost('products');
        $formatDate = date('Y-m-d H:i:s', strtotime($date));

        // Handle file upload once
        $EPaymentFile = $this->request->getFile('payment');
        $gpayment = null;

        if ($EPaymentFile && $EPaymentFile->isValid() && !$EPaymentFile->hasMoved()) {
            $newName = uniqid() . '.' . $EPaymentFile->getClientExtension();
            if ($EPaymentFile->move(ROOTPATH . 'public/assets/user/Epayment/', $newName)) {
                $gpayment = $newName;
            } else {
                // Handle file move failure
                echo 'Failed to move uploaded file: ' . $EPaymentFile->getErrorString();
                return;
            }
        } else {
            // Handle invalid or missing file
            echo "No valid file was uploaded.";
            return;
        }

        // Check if products are available
        if ($products) {
            foreach ($products as $item) {
                $productId = $item['productId'];
                $totalQuantity = $item['totalQuantity'];
                $totalPrice = $item['totalPrice'];
                $prodSize = $item['productSize'];

                // Prepare data for each product
                $data = [
                    'ProductID'       => $productId,        // Corrected to use loop variable
                    'CustomerID'      => $user,              // Assuming $user is CustomerID
                    'HCustomer'       => $hc,
                    'appointmentDate' => $formatDate,
                    'Message'         => $message,
                    'totalPrice'      => $totalPrice,
                    'quantity'        => $totalQuantity,
                    'size'            => $prodSize,
                    'TableCode'       => $barOrderCode,
                    'paymentStatus'   => 'ForObservation',
                    'Gpayment'        => $gpayment          // Assign the uploaded file name
                ];

                // Insert each product into the database
                $this->rsv->insert($data);
            }
        } else {
            // Handle case when no products are submitted
            echo "No products were selected.";
            return;
        }

        // Redirect after successful insertion
        return redirect()->to('/');
    }
}

    private function getBarcodeByOrder($lengt = 10)
    {
        $characters = 'QWERTYUIO123PASFHGKLHG4567ZXCVVM8910';
        $barOder = '';
        for($i=0; $i < $lengt; $i++)
        {
            $barOder .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $barOder;
    }

    public function getReservationData($tableCode)
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ',
            'Raw Materials')->first(),
            'rsvData' => $this->rsv->select('tablereservation.quantity, tablereservation.size, tablereservation.TableCode, tablereservation.appointmentDate,
             tablereservation.totalPrice, tablereservation.Gpayment, tablereservation.paymentStatus,tablereservation.HCustomer, tablereservation.Message,
             tablereservation.reservationDate, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, product_tbl.prod_lprice, user.LastName, user.FirstName')
             ->join('product_tbl','product_tbl.prod_id = tablereservation.ProductID')
             ->join('user', 'user.UserID = tablereservation.CustomerID')
             ->where('tablereservation.TableCode', $tableCode)->first(),
             'prodData' => $this->rsv->select('tablereservation.quantity, tablereservation.size, tablereservation.TableCode, tablereservation.appointmentDate,
             tablereservation.totalPrice, tablereservation.Gpayment, tablereservation.TableID, tablereservation.paymentStatus,tablereservation.HCustomer, tablereservation.Message,
             tablereservation.reservationDate, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, product_tbl.prod_lprice, user.LastName, user.FirstName')
             ->join('product_tbl','product_tbl.prod_id = tablereservation.ProductID')
             ->join('user', 'user.UserID = tablereservation.CustomerID')
             ->where('tablereservation.TableCode', $tableCode)->findAll(),

             'prodpic' => $this->rsv->select('tablereservation.quantity, tablereservation.size, tablereservation.TableCode, tablereservation.appointmentDate,
             tablereservation.totalPrice, tablereservation.Gpayment, tablereservation.TableID, tablereservation.paymentStatus,tablereservation.HCustomer, tablereservation.Message,
             tablereservation.reservationDate, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, product_tbl.prod_lprice, user.LastName, user.FirstName')
             ->join('product_tbl','product_tbl.prod_id = tablereservation.ProductID')
             ->join('user', 'user.UserID = tablereservation.CustomerID')
             ->where('tablereservation.TableCode', $tableCode)->first(),

             'sumTotalOrder' => $this->rsv->select('SUM(totalPrice) as totalPrice')->where('tablereservation.TableCode', $tableCode)->first()
                ];

        return view('admin/secondphase/viewReservation', $data);


    }


    public function AcceptReservation()
    {
      $reservationId = $this->request->getVar('reservationID');
      $AcceptAndDeclined = $this->request->getVar('action');
      $updateAccept =  $this->updateToAccept($reservationId);
                       $this->updateMyPending($updateAccept, $reservationId, $AcceptAndDeclined);     
    return redirect()->to('/viewuserReservation');   
    }
    
    private function updateToAccept($reservationId)
    {
        $updateAccept = $this->rsv->find($reservationId);

        return $updateAccept;
    }

    private function updateMyPending($updateAccept, $reservationId, $AcceptAndDeclined)
    {
        $data = [
                'paymentStatus' => $AcceptAndDeclined,
        ];

        $this->rsv->update($reservationId, $data);
        
    }

    public function viewMyReservation()
    {
        $session = session();
        $user = $session->get('UserID');
    
        // Retrieve cart item count
        $cartItems = $this->crt->where('CustomerID', $user)->findAll();
        $cartItemCount = count($cartItems);
    
        // Retrieve reservations with necessary details
        $reservations = $this->rsv->select('tablereservation.*, 
                                            product_tbl.prod_name, 
                                            product_tbl.prod_lprice, 
                                            product_tbl.prod_mprice, 
                                            product_tbl.prod_img')
                                ->join('product_tbl', 'product_tbl.prod_id = tablereservation.ProductID', 'left')
                                ->where('tablereservation.CustomerID', $user)
                                ->findAll();
    

                                
        $data = [
            'cartItemCount' => $cartItemCount,
            'cartItems' => $cartItems,
            'myReservation' => $this->rsv->select('tablereservation.quantity, tablereservation.size, tablereservation.TableCode, tablereservation.appointmentDate,
                                                  tablereservation.totalPrice, tablereservation.Gpayment, tablereservation.paymentStatus, tablereservation.Message, tablereservation.reservationDate,
                                                  product_tbl.prod_name, product_tbl.prod_lprice, product_tbl.prod_mprice, product_tbl.prod_img')
                                           ->join('product_tbl', 'product_tbl.prod_id = tablereservation.ProductID', 'left')
                                           ->where('tablereservation.CustomerID', $user)
                                           ->findAll(),
            'getCode' => $reservations,
        ];
    
        return view('user/myReservation', $data);
    }
    
    public function cancelReservation($reservationCode)
    {

        $data = [
            'paymentStatus' => 'CancelledReservation'
        ];
        $this->rsv->where('TableCode', $reservationCode)->set($data)->update();

        return redirect()->to('myReservation');
    }
} 



