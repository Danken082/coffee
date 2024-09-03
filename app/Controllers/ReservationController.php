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

    public function saveReservation()
    {
        $requestData = $this->request->getJSON();

        $savedData = [];
         $barOrderCode = $this->getBarcodeByOrder();
 
        foreach ($requestData as $item) {
            $productID = $item->productId;
            $totalPrice = $item->totalPrice;
            $totalquantity = $item->totalquantity;
            $amountPaid = $item->amountPaid;
            $change = $item->change;
             $orderCode = $barOrderCode;
     
            $orderId = $this->history->insert([
                'ProductID' => $productID,
                'total_amount' => $totalPrice,
                'quantity' => $totalquantity,
                'amount_paid' => $amountPaid,
                'change_amount' => $change,
                'orderCode' => 'CrDSPOS-' .$orderCode   
                
            ]);
 
            $savedData[] = [
             'productID' => $productID,
             'total_ammount' => $totalPrice,
             'totalQuantity' => $totalquantity,
             'amountPaid' => $amountPaid,
             'change' => $change,
          ];
          $coffee = $this->raw->where('rawID', '9')->first();
          $milk = $this->raw->where('rawID', '10')->first();
          $smilk = $this->raw->where('rawID', '11')->first();
          $hcream = $this->raw->where('rawID', '12')->first();
          $wcream = $this->raw->where('rawID', '13')->first();
          $syrup = $this->raw->where('rawID', '14')->first();
          $sauce = $this->raw->where('rawID', '15')->first();
          $frPowder = $this->raw->where('rawID', '16')->first();
          $wsugar = $this->raw->where('rawID', '17')->first();
          $bsugar = $this->raw->where('rawID', '18')->first();
          $chicken = $this->raw->where('rawID', '19')->first();
          $pork = $this->raw->where('rawID', '20')->first();
          $beef = $this->raw->where('rawID', '21')->first();
          $tortillas = $this->raw->where('rawID', '22')->first();
          $echeese = $this->raw->where('rawID', '23')->first();
          $shrimp = $this->raw->where('rawID', '24')->first();
          $cfudge = $this->raw->where('rawID', '43')->first();
          $scheese = $this->raw->where('rawID', '44')->first();
          $qmelt = $this->raw->where('rawID', '45')->first();
          $egg = $this->raw->where('rawID', '46')->first();
          $lettuce = $this->raw->where('rawID', '47')->first();
          $tuna = $this->raw->where('rawID', '48')->first();
          $bacon = $this->raw->where('rawID', '49')->first();
          $ppork = $this->raw->where('rawID', '50')->first();
          $bratwurst = $this->raw->where('rawID', '51')->first();
          $smokedham = $this->raw->where('rawID', '52')->first();
          $porkRibs = $this->raw->where('rawID', '53')->first();
          $gbeef = $this->raw->where('rawID', '54')->first();
          $liempo = $this->raw->where('rawID', '55')->first();
          $tbeef = $this->raw->where('rawID', '56')->first();
          $tIslands = $this->raw->where('rawID', '57')->first();
          $cIslands = $this->raw->where('rawID', '58')->first();
          $mustart = $this->raw->where('rawID', '59')->first();
          $mupledsyrup = $this->raw->where('rawID', '60')->first();
          $mushroom = $this->raw->where('rawID', '61')->first();
          $onion = $this->raw->where('rawID', '62')->first();
          $garlic = $this->raw->where('rawID', '63')->first();
          $parsley = $this->raw->where('rawID', '64')->first();
          $spiringonion = $this->raw->where('rawID', '65')->first();
          $bellpepper = $this->raw->where('rawID', '66')->first();
          $oil = $this->raw->where('rawID', '67')->first();
          $soysouce = $this->raw->where('rawID', '68')->first();
          $vinigar = $this->raw->where('rawID', '69')->first();
          $knorseasoning = $this->raw->where('rawID', '70')->first();
          $KnorCube = $this->raw->where('rawID', '71')->first();
          $ketchup = $this->raw->where('rawID', '72')->first();
          $salt = $this->raw->where('rawID', '73')->first();
          $pepper = $this->raw->where('rawID', '74')->first();
          $butter = $this->raw->where('rawID', '75')->first();
          $mayonaise = $this->raw->where('rawID', '76')->first();
          $starmargarine = $this->raw->where('rawID', '77')->first();
          $icecream = $this->raw->where('rawID', '78')->first();
          $tomatosouce = $this->raw->where('rawID', '79')->first();
          $potato    = $this->raw->where('rawID', '80')->first();
          $pasta = $this->raw->where('rawID', '81')->first();
          $bfssandwich = $this->raw->where('rawID', '82')->first();
          $bfsoup = $this->raw->where('rawID', '83')->first();
          $coke1 = $this->raw->where('rawID', '84')->first();
      if ($productID == 1) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      
      elseif ($productID == 2) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
        
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
         
      }
      elseif ($productID == 3) {
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $pot = $totalquantity * .05;
          $changepot = $potato['stocks'] - $pot;
          $mus = $totalquantity * .004;
          $changemus = $mustart['stocks'] - $mus;
          
          
          $this->raw->update($potato['rawID'], ['stocks' => $changemus]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mustart['rawID'], ['stocks' => $changemus]);
         
      }
      elseif ($productID == 4) {
          $chick = $totalquantity * .1;
          $changech = $chicken['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
 
          $this->raw->update($chicken['rawID'], ['stocks' => $changech]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
      }
      elseif ($productID == 5) {
          $gar = $totalquantity * .06;
          $changegar = $garlic['stocks'] - $totalquantity;
          $chick = $totalquantity * .1;
          $changech = $chicken['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($garlic['rawID'], ['stocks' => $changegar]);
          $this->raw->update($chicken['rawID'], ['stocks' => $changech]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
          $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         
      }
      elseif ($productID == 6) {
          $gar = $totalquantity * .06;
          $changegar = $garlic['stocks'] - $totalquantity;
          $chick = $totalquantity * .1;
          $changech = $chicken['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 7) {
          $por = $totalquantity * .09;
          $changepor = $pork['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
         
      }
      elseif ($productID == 8) {
          $bef= $totalquantity * .09;
          $changebef = $beef['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $pep = $totalquantity * .26;
          $changeper = $pepper['stocks'] - $pep;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($beef['rawID'], ['stocks' => $changebef]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
          $this->raw->update($pepper['rawID'], ['stocks' => $changepep]);
 
      }
      elseif ($productID == 9) {
          $por = $totalquantity * .09;
          $changepor = $pork['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);            
      }
      elseif ($productID == 10) {
          $por = $totalquantity * .09;
          $changepor = $pork['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);   
      }
      elseif ($productID == 11) {
          $por = $totalquantity * .09;
          $changepor = $pork['stocks'] - $totalquantity;
          $ol = $totalquantity * .04;
          $changeol = $oil['stocks'] - $ol;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $cknor = $totalquantity * .01;
          $changecknor = $KnorCube['stocks'] - $cknor;
          $sal = $totalquantity * .009;
          $changesalt = $salt['stocks'] - $sal;
 
          $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
          $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);               
      }
      elseif ($productID == 12) {
          $eg = $totalquantity * .08;
          $changeeg = $egg['stocks'] - $totalquantity;
          $ol = $totalquantity * .03;
          $changeol = $oil['stocks'] - $ol;
          $bac = $totalquantity * .06;
          $changebac = $bacon['stocks'] - $bac;
          $ketc = $totalquantity * .06;
          $changeketc = $ketchup['stocks'] - $ketc;
 
          $this->raw->update($egg['rawID'], ['stocks' => $changeeg]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($bacon['rawID'], ['stocks' => $changebac]);
          $this->raw->update($ketchup['rawID'], ['stocks' => $changeketc]);
         
      }
      elseif ($productID == 13) {
          $eg = $totalquantity * .08;
          $changeeg = $egg['stocks'] - $totalquantity;
          $ol = $totalquantity * .03;
          $changeol = $oil['stocks'] - $ol;
          $ketc = $totalquantity * .06;
          $changeketc = $ketchup['stocks'] - $ketc;
 
          $this->raw->update($egg['rawID'], ['stocks' => $changeeg]);
          $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
          $this->raw->update($ketchup['rawID'], ['stocks' => $changeketc]);
         
      }
      elseif ($productID == 14) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 15) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 16) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 17) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 18) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 19) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 20) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 21) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }elseif ($productID == 22) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 23) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 24) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 25) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 26) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 27) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 28) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 29) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 30) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 31) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 32) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 33) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 34) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 35) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 36) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 37) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 38) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 39) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 40) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 41) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 42) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 43) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 44) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 45) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 46) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 47) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 48) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 49) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 50) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 51) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 52) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 53) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 54) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 55) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 57) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 58) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 59) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 60) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }elseif ($productID == 61) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 62) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 63) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }elseif ($productID == 64) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 65) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 66) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 67) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 68) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }elseif ($productID == 69) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $tor;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      
 
      elseif ($productID == 70) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $tor;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 71) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 72) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 73) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 74) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 75) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 76) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 77) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 78) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
      elseif ($productID == 79) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 80) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 81) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 82) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 83) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 84) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 85) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 86) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 87) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 88) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 89) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 90) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 91) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 92) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 93) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 94) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 95) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 96) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 97) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 98) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 99) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
      elseif ($productID == 100) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 101) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 102) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 103) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 104) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 105) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 106) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 100) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 100) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 107) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      elseif ($productID == 108) {
          $tor = $totalquantity * .03;
          $changetor = $tortillas['stocks'] - $totalquantity;
          $on = $totalquantity * .03;
          $changeon = $onion['stocks'] - $on;
          $mush = $totalquantity * .26;
          $changemush = $mushroom['stocks'] - $mush;
          $tomato = $totalquantity * .06;
          $changetomat = $tomatosouce['stocks'] - $tomato;
 
          $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
          $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
          $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
          $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
         
      }
 
 
      else {
          // Handle the case when no row is found for rawID = 9
          log_message('error', 'No row found for rawID = 9');
      }
      
          
        }
 
        return $this->response->setJSON([
            'success' => true,
            'data' => $savedData
        ]);
}

    public function reservationWithProducts()
    {
        // $requestJSON = $this->request->getJSON();
        // $lastname  = $this->request->getPost('LastName');
        // $firstname = $this->request->getVar('FirstName');
        // $email     = $this->request->getVar('Email');
        // $date      = $this->request->getVar('apppointmentDate');
        // $contact   = $this->request->getVar('ContactNo');
        // $HC        = $this->request->getVar('HCustomer');
        // $date      = $this->request->getVar('apppointmentDate');
        // $message   = $this->request->getVar('message');
 
        echo 'hello';

        // $saveData = [];

        // foreach($requestJSON as $userReservation)
        // {
        //     $productID = $userReservation->productId;
            

        // }
        // print($firstname);
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

} 



