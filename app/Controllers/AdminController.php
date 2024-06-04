<?php

namespace App\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\CapabilityProfiles\SimpleCapabilityProfile;


use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminUserModel;
use App\Models\HistoryModel;
use App\Models\ProductModel;
use App\Models\PaymentModel;
use App\Models\TableModel;
use App\Models\FeedbackModel;
use App\Models\OrderModel;
use App\Models\ItemsModel;
use CodeIgniter\API\ResponseTrait;
class AdminController extends BaseController
{
    use ResponseTrait;
    private $user;
    private $history;
    private $orderprod;
    private $load;
    private $payment;
    private $tbl;
    private $fb;
    private $order;
    private $raw;
    private $connector;
    private $printer;

    public function __construct(){
        $this->user = new AdminUserModel();
        $this->history = new HistoryModel();
        $this->orderprod = new ProductModel();
        $this->payment = new PaymentModel();
        $this->tbl = new TableModel();
        $this->fb = new FeedbackModel();
        $this->order = new OrderModel();
        $this->raw = new ItemsModel();
        $this->connector = new WindowsPrintConnector("POS58 Printer");
        $this->printer  = new Printer($this->connector);

        date_default_timezone_set('Asia/Manila');
    }
    
    public function savePOSOrders()
    {

        try {


          
        $requestData = $this->request->getJSON();

        $savedData = [];


        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->text("Crossrods Coffee and Deli\n");
        $this->printer->text("Tawiran Calapan City\n");
        $this->printer->text("Oriental Mindoro\n");
        $this->printer->text("Receipt\n");
        $this->printer->text("\n");
        $this->printer->text("------------------------------\n");
        $this->printer->text("------------------------------\n");
        $this->printer->text(date('F j, Y, g:i a', strtotime(date('Y-m-d H:i:s'))) ."\n");
        $this->printer->text("------------------------------\n");
   
        $this->printer->text("Name    Quantity     Prize\n");
        $total = 0;
        foreach ($requestData as $item) {
            $this->printer->setJustification(Printer::JUSTIFY_LEFT);
            $productName = $item->productName;
            $productId = $item->productId;
            $totalPrice = $item->totalPrice;
            $totalquantity = $item->totalquantity;
            $amountPaid = $item->amountPaid;
            $change = $item->change;
            $DineTake = $item->DineTake;

            
            $this->printer->text(sprintf("%-12s x%-10d P%5.2f\n", $productName, $totalquantity, $totalPrice));

            $total += $totalPrice;

            $orderId = $this->history->insert([
                'ProductID' => $productId,
                'total_amount' => $totalPrice,
                'quantity' => $totalquantity,
                'amount_paid' => $amountPaid,
                'change_amount' => $change, 
            ]);
 
            $savedData[] = [
             'ProductID' => $productId,
             'total_amount' => $totalPrice,
             'quantity' => $totalquantity,
             'amount_paid' => $amountPaid,
             'change_amount' => $change,
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
     if ($productId == 1) {
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
     
     elseif ($productId == 2) {
         $tor = $totalquantity * .03;
         $changetor = $tortillas['stocks'] - $tor;
         $ol = $totalquantity * .04;
         $changeol = $oil['stocks'] - $ol;
       
         $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
         $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
        
     }
     elseif ($productId == 3) {
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
     elseif ($productId == 4) {
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
     elseif ($productId == 5) {
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
     elseif ($productId == 6) {
         $gar = $totalquantity * .06;
         $changegar = $garlic['stocks'] - $gar;
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
        
     }
     elseif ($productId == 7) {
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
        
     }
     elseif ($productId == 8) {
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);

     }
     elseif ($productId == 9) {
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);            
     }
     elseif ($productId == 10) {
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);   
     }
     elseif ($productId == 11) {
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
         $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
         $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);               
     }
     elseif ($productId == 12) {
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
     elseif ($productId == 13) {
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
     elseif ($productId == 14) {
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
     elseif ($productId == 15) {
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
     elseif ($productId == 16) {
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
     elseif ($productId == 17) {
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
     elseif ($productId == 18) {
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
     elseif ($productId == 19) {
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
     elseif ($productId == 20) {
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
     elseif ($productId == 21) {
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
        
     }elseif ($productId == 22) {
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
     elseif ($productId == 23) {
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
     elseif ($productId == 24) {
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
     elseif ($productId == 25) {
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
     elseif ($productId == 26) {
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
     elseif ($productId == 27) {
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
     elseif ($productId == 28) {
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
     elseif ($productId == 29) {
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
     elseif ($productId == 30) {
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
     elseif ($productId == 31) {
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
     elseif ($productId == 32) {
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
     elseif ($productId == 33) {
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
     elseif ($productId == 34) {
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
     elseif ($productId == 35) {
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
     elseif ($productId == 36) {
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
     elseif ($productId == 37) {
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
     elseif ($productId == 38) {
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
     elseif ($productId == 39) {
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
     elseif ($productId == 40) {
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
     elseif ($productId == 41) {
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
     elseif ($productId == 42) {
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
     elseif ($productId == 43) {
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
     elseif ($productId == 44) {
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
     elseif ($productId == 45) {
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
     elseif ($productId == 46) {
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
     elseif ($productId == 47) {
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
     elseif ($productId == 48) {
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
     elseif ($productId == 49) {
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

     elseif ($productId == 50) {
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
     elseif ($productId == 51) {
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
     elseif ($productId == 52) {
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
     elseif ($productId == 53) {
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
     elseif ($productId == 54) {
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
     elseif ($productId == 55) {
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
     elseif ($productId == 57) {
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

     elseif ($productId == 58) {
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
     elseif ($productId == 59) {
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
     elseif ($productId == 60) {
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
        
     }elseif ($productId == 61) {
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
     elseif ($productId == 62) {
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

     elseif ($productId == 63) {
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
        
     }elseif ($productId == 64) {
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

     elseif ($productId == 65) {
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
     elseif ($productId == 66) {
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
     elseif ($productId == 67) {
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

     elseif ($productId == 68) {
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
        
     }elseif ($productId == 69) {
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
     

     elseif ($productId == 70) {
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
     elseif ($productId == 71) {
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
     elseif ($productId == 72) {
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
     elseif ($productId == 73) {
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
     elseif ($productId == 74) {
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
     elseif ($productId == 75) {
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
     elseif ($productId == 76) {
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
     elseif ($productId == 77) {
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
     elseif ($productId == 78) {
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
     elseif ($productId == 79) {
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

     elseif ($productId == 80) {
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


     elseif ($productId == 81) {
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


     elseif ($productId == 82) {
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


     elseif ($productId == 83) {
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


     elseif ($productId == 84) {
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


     elseif ($productId == 85) {
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


     elseif ($productId == 86) {
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


     elseif ($productId == 87) {
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


     elseif ($productId == 88) {
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


     elseif ($productId == 89) {
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


     elseif ($productId == 90) {
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

     elseif ($productId == 91) {
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

     elseif ($productId == 92) {
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

     elseif ($productId == 93) {
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

     elseif ($productId == 94) {
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

     elseif ($productId == 95) {
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

     elseif ($productId == 96) {
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

     elseif ($productId == 97) {
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

     elseif ($productId == 98) {
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

     elseif ($productId == 99) {
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

     elseif ($productId == 100) {
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


     elseif ($productId == 101) {
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


     elseif ($productId == 102) {
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


     elseif ($productId == 103) {
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


     elseif ($productId == 104) {
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


     elseif ($productId == 105) {
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


     elseif ($productId == 106) {
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


     elseif ($productId == 100) {
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


     elseif ($productId == 100) {
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


     elseif ($productId == 107) {
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


     elseif ($productId == 108) {
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


     else {
         // Handle the case when no row is found for rawID = 9
         log_message('error', 'No row found for rawID = 9');
     }
     
         
       }
       $this->printer->text("------------------------------\n");
       $this->printer->text( $DineTake . "\n");
       $this->printer->text("------------------------------\n");
        $this->printer->text("Total: P" . number_format($total, 2) . "\n");   
       $this->printer->text("------------------------------\n");
       $this->printer->text("\nAmount Paid: P" . number_format($amountPaid, 2) . "\n");
       $this->printer->text("Change: P" . number_format($change, 2) . "\n");
       $this->printer->text("------------------------------\n");
       $this->printer->text("Thank you for choosing\n");
       $this->printer->text("Crossroards Coffee and Deli\n");
       $this->printer->text("Come Again\n");
       $this->printer->text("------------------------------\n");
  
       $this->printer->cut();
       $this->printer->close();

       return $this->response->setJSON([
           'success' => true,
           'data' => $savedData
       ]);


       
    } catch (\Throwable $th) {
        //throw $th;
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

    public function printReceipt()
    {
        $this->printer = new ThermalPrinter();
        
        // Example receipt content
        $receipt_content = "
            Hello
            --------------------------
            Item: 2 Boy Bawang  $10.00
            Item: 1 Pizza Hot   $15.00
            Total:              $25.00
            --------------------------
            Thank you for shopping!
        ";

        try {
            $result = $this->printer->printReceipt($receipt_content);
            if ($result === true) {
                echo "Receipt printed successfully.";
            $this->printer->printReceipt($receipt_content);
            } else {
                echo "Error: " . $result;
            }
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function viewAddTable()
    {
        return view('admin/addingTable');
    }
    public function addingTable()
    {
        $rules = [
                'table_Type' => 'required',
                'Status' => 'required'
        ];

        if($this->validate($rules))
        {
            $data = [
                'Status' => 'Available'

            ];

            $this->tbl->save($data);

            return redirect()->to('addingTable')->with('msg', 'This Table is Now Available');

        }
        else{
            $data['validation'] = $this->validator;
   
            return view('admin/addingTable', $data);
        }
    }

    public function admin_side(){
        return view('/admin/sidebar');
    }

    public function register(){
        return view('/admin/register');
    }

    public function login(){
        return view('/admin/login');
    }

    public function home(){
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
       return view('/admin/home', $data);
    }

    public function dashboard(){
        $data = [
            'coffee' => $this->raw->where('rawID', '9')->find(),
            'milk' => $this->raw->where('rawID', '10')->first(),
            'smilk' => $this->raw->where('rawID', '11')->first(),
            'hcream' => $this->raw->where('rawID', '12')->first(),
            'wcream' => $this->raw->where('rawID', '13')->first(),
            'syrup' => $this->raw->where('rawID', '14')->first(),
            'sauce' => $this->raw->where('rawID', '15')->first(),
            'frPowder' => $this->raw->where('rawID', '16')->first(),
            'wsugar' => $this->raw->where('rawID', '17')->first(),
            'bsugar' => $this->raw->where('rawID', '18')->first(),
            'chicken' => $this->raw->where('rawID', '19')->first(),
            'pork' => $this->raw->where('rawID', '20')->first(),
            'beef' => $this->raw->where('rawID', '21')->first(),
            'tortillas' => $this->raw->where('rawID', '22')->first(),
            'echeese' => $this->raw->where('rawID', '23')->first(),
            'shrimp' => $this->raw->where('rawID', '24')->first(),
            'cfudge' => $this->raw->where('rawID', '43')->first(),
            'scheese' => $this->raw->where('rawID', '44')->first(),
            'qmelt' => $this->raw->where('rawID', '45')->first(),
            'egg' => $this->raw->where('rawID', '46')->first(),
            'lettuce' => $this->raw->where('rawID', '47')->first(),
            'tuna' => $this->raw->where('rawID', '48')->first(),
            'bacon' => $this->raw->where('rawID', '49')->first(),
            'ppork' => $this->raw->where('rawID', '50')->first(),
            'bratwurst' => $this->raw->where('rawID', '51')->first(),
            'smokedham' => $this->raw->where('rawID', '52')->first(),
            'porkRibs' => $this->raw->where('rawID', '53')->first(),
            'gbeef' => $this->raw->where('rawID', '54')->first(),
            'liempo' => $this->raw->where('rawID', '55')->first(),
            'tbeef' => $this->raw->where('rawID', '56')->first(),
            'tIslands' => $this->raw->where('rawID', '57')->first(),
            'cIslands' => $this->raw->where('rawID', '58')->first(),
            'mustart' => $this->raw->where('rawID', '59')->first(),
            'mupledsyrup' => $this->raw->where('rawID', '60')->first(),
            'mushroom' => $this->raw->where('rawID', '61')->first(),
            'onion' => $this->raw->where('rawID', '62')->first(),
            'garlic' => $this->raw->where('rawID', '63')->first(),
            'parsley' => $this->raw->where('rawID', '64')->first(),
            'spiringonion' => $this->raw->where('rawID', '65')->first(),
            'bellpepper' => $this->raw->where('rawID', '66')->first(),
            'oil' => $this->raw->where('rawID', '67')->first(),
            'soysouce' => $this->raw->where('rawID', '68')->first(),
            'vinigar' => $this->raw->where('rawID', '69')->first(),
            'knorseasoning' => $this->raw->where('rawID', '70')->first(),
            'KnorCube' => $this->raw->where('rawID', '71')->first(),
            'ketchup' => $this->raw->where('rawID', '72')->first(),
            'salt' => $this->raw->where('rawID', '73')->first(),
            'pepper' => $this->raw->where('rawID', '74')->first(),
            'butter' => $this->raw->where('rawID', '75')->first(),
            'mayonaise' => $this->raw->where('rawID', '76')->first(),
            'starmargarine' => $this->raw->where('rawID', '77')->first(),
            'icecream' => $this->raw->where('rawID', '78')->first(),
            'tomatosouce' => $this->raw->where('r   awID', '79')->first(),
            'potato'    => $this->raw->where('rawID', '80')->first(),
            'pasta' => $this->raw->where('rawID', '81')->first(),
            'bfssandwich' => $this->raw->where('rawID', '82')->first(),
            'bfsoup' => $this->raw->where('rawID', '83')->first(),
            'coke1' => $this->raw->where('rawID', '84')->first(),
            ];
            return view('/admin/dashboard', $data);
        }

       
    

    public function inventory()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        return view ('/admin/inventory', $data);
    }

    public function equip(){
        return view('/admin/equipments');
    }

    public function products(){
        return view('/admin/product');
    }

    public function orderpayment(){

        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $data['order'] = $this->payment->select('order.orderID,order.barcode, user.UserID, product_tbl.prod_id, order.CustomerID, order.ProductID, order.total, order.orderStatus, 
        order.quantity, order.size, order.orderDate, order.orderType, order.paymentStatus, user.LastName, 
        user.FirstName, user.Username, user.ContactNo, user.address, user.gender, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice', 'product_tbl.prod_lprice, product_tbl.prod_decs')
        ->join('product_tbl', 'order.ProductID = product_tbl.prod_id')
        ->join( 'user', 'order.CustomerID = user.UserID')
        ->where('orderStatus', 'onProcess')
        ->groupBy('order.orderID','order.barcode')
        ->orderBy('order.orderID', 'ASC')
        ->findAll();
        return view('/admin/orderpayment', $data);
        
    }
    public function viewOrder()
    {
        
        if(isset($_POST['click_view_btn']))
        {
       $barcode = $this->request->getPost('barcode');
  $data['order'] = $this->payment->select('order.orderID,order.barcode, user.UserID, product_tbl.prod_id, order.CustomerID, order.ProductID, order.total, order.orderStatus, 
            order.quantity, order.size, order.orderDate, order.orderType, order.paymentStatus, user.LastName, 
            user.FirstName, user.Username, user.ContactNo, user.address, user.gender, 
            product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice', 'product_tbl.prod_lprice, product_tbl.prod_decs')
            ->join('product_tbl', 
            'order.ProductID = product_tbl.prod_id')
            ->join( 'user', 'order.CustomerID = user.UserID')
            ->where('order.barcode', $barcode)
            ->orderBy('order.orderID', 'ASC')
            ->findAll();      
            
       if(count($data['order']) > 0) {
        foreach ($data['order'] as $row) {
            echo '<h6>'.$row['orderID'].'</h6>';
         }
    } else {
        echo '<h4> no data found </h4>';
    }            
   
     }  
 }
 

    public function getcustomeruser()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $role = 'Customer';
        $user = new AdminUserModel();
        $data['customer'] = $user->customeruser($role);
        return view ('/admin/customermanage_user', $data);
    }

    public function getmanageuser()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $role = 'Admin';
        $user = new AdminUserModel();
        $data['admin'] = $user->adminuser($role);
        return view ('/admin/adminmanage_user', $data);
    }

    public function mnguser(){
        return view('/admin/adduser');
    }

    public function adduser()
    {
        $data = [
            'LastName' => $this->request->getVar('LastName'),
            'FirstName' => $this->request->getVar('FirstName'),
            'Username' => $this->request->getVar('Username'),
            'email' => $this->request->getVar('email'),
            'birthdate' => $this->request->getVar('birthdate'),
            'ContactNo' => $this->request->getVar('ContactNo'),
            'address' => $this->request->getVar('address'),
            'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            'UserRole' => $this->request->getVar('UserRole')
        ];
        $this->user->save($data);
        return redirect()->to(base_url('adminmanage_user'));
    }

    public function adminprofile()
    { 
        return view('/admin/adminprofile');
    }

    public function edit_profile($id)
    {
        $data['eprof'] = $this->user->find($id);
        return view('/admin/edit_adminprofile', $data);
    }

    public function updateadmin($id)
    {
        if ($this->request->getMethod() === 'post') {
            $userId = session()->get('UserID');
            $userModel = new UserModel();

            // Get the current user data
            $currentUser = $userModel->find($userId);
            $currentProfileImg = $currentUser['profile_img'];

            $data = [
                'LastName' => $this->request->getPost('LastName'),
                'FirstName' => $this->request->getPost('FirstName'),
                'gender' => $this->request->getPost('gender'),
                'email' => $this->request->getPost('email'),
                'ContactNo' => $this->request->getPost('ContactNo'),
                'Username' => $this->request->getPost('Username'),
                'address' => $this->request->getPost('address'),
                'birthdate' => $this->request->getPost('birthdate')
            ];

            $profileImg = $this->request->getFile('profile_img');
            if ($profileImg->isValid() && !$profileImg->hasMoved()) {
                $newName = $profileImg->getName();
                $profileImg->move(ROOTPATH . 'public/assets/user/images/', $newName);
                $data['profile_img'] = $newName;

                // Delete the old profile image if it's not the default image
                if ($currentProfileImg !== 'profile.png' && file_exists(ROOTPATH . 'public/assets/user/images/' . $currentProfileImg)) {
                    unlink(ROOTPATH . 'public/assets/user/images/' . $currentProfileImg);
                }
            }

            $userModel->update($userId, $data);
            session()->set($data);

            return redirect()->to(base_url('/adminprofile'));
        }
    }

    public function removeadminpf($userId)
    {
        $userModel = new UserModel();
        $currentUser = $userModel->find($userId);
        $profileImg = $currentUser['profile_img'];
    
        if (!empty($profileImg) && file_exists('assets/user/images/' . $profileImg)) {
            unlink('assets/user/images/' . $profileImg);
        }
    
        $userModel->update($userId, ['profile_img' => 'profile.png']);
        session()->set('profile_img', 'profile.png');
    
        return redirect()->to(base_url('/adminprofile'));
    }    
      
    public function deleteuser($id)
    {  
        $this->user->delete($id);
        return redirect()->to(base_url('adminmanage_user'));
    }

    public function pos()
    {
        $menu = new ProductModel();
        $session = session();
        // $data = 
        // $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

        // $cartItems = $this->crt->where('CustomerID', $user)->findAll();

        // $cartItemCount = count($cartItems);

        $data = [
            // 'cartItemCount' => $cartItemCount,
            // 'cartItems' => $cartItems,
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
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];   

        return view('/admin/pos', $data);
    }

    public function product_item(){
        return view('/inventory/product_item/prod_items');
    }
    public function getPendingOrders()
    {
        $getID = $this->request->getPost('orderID');

        $myOrders = $this->viewPendingOrders($getID);
                    $this->AcceptOrders($myOrders, $getID);
                    $this->AcceptAndPrintReceipt();

        return redirect()->to('adminpayment')->with('msg', 'Order is now Accepted');
        
    }

    private function AcceptAndPrintReceipt()
    {

        $name = $this->request->getPost('FirstName');
        $conNum = $this->request->getPost('ContatNo');
        $address = $this->request->getPost('address');
        $getData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'quantity' => $this->request->getPost('quantity'),
            'size'     => $this->request->getPost('size'),
            'total'    => $this->request->getPost('total')
        ];


        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->text("Crossrods Coffee and Deli\n");
        $this->printer->text("Tawiran Calapan City\n");
        $this->printer->text("Oriental Mindoro\n");
        $this->printer->text("Receipt\n");
        $this->printer->text("\n");
        $this->printer->text("------------------------------\n");
        $this->printer->text("Customer Name:" . $name . "\n");
        $this->printer->text("Address: " . $address . "\n");
        $this->printer->text("Contact Number: " . $conNum . "\n");
        $this->printer->text("------------------------------\n");
        $this->printer->text(date('F j, Y, g:i a', strtotime(date('Y-m-d H:i:s'))) ."\n");
        $this->printer->text("------------------------------\n");
   
        $this->printer->text("Name    Quantity     Prize\n");
        $prodNames = $getData['prod_name'];
        $quantities = $getData['quantity'];
        $sizes = $getData['size'];
        $totals = $getData['total'];
        
        // Iterate over the arrays
        for ($i = 0; $i < count($prodNames); $i++) {
            $prodName = $prodNames[$i];
            $quantity = $quantities[$i];
            $size     = $sizes[$i];
            $total    = $totals[$i];
        
            $this->printer->text(sprintf("%-12s x%-10d P%5.2f\n", $prodName, $quantity, $total));
        }

        $total = $this->request->getPost('sum');
        $this->printer->text("------------------------------\n");
        $this->printer->text("Total: P" . number_format($total, 2) . "\n");   
     
       $this->printer->text("------------------------------\n");
       $this->printer->text("Thank you for choosing\n");
       $this->printer->text("Crossroards Coffee and Deli\n");
       $this->printer->text("Come Again\n");
       $this->printer->text("------------------------------\n");
  

        $this->printer->cut();
        $this->printer->close();

    }

    private function viewPendingOrders($getID)
    {
        $myOrders = $this->order->whereIn('orderID', $getID)->get()->getResultArray();


        return $myOrders;
    }

    private function AcceptOrders($myOrders)
    {

            $orderIDs = [];
            $productID;
            foreach ($myOrders as $order) {
                $orderIDs[] = $order['orderID'];
                $productID = $order['ProductID'];
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
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            
            elseif ($productID == 2) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
              
                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
               
            }
            elseif ($productID == 3) {
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $pot = $order['quantity'] * .05;
                $changepot = $potato['stocks'] - $pot;
                $mus = $order['quantity'] * .004;
                $changemus = $mustart['stocks'] - $mus;
                
                
                $this->raw->update($potato['rawID'], ['stocks' => $changemus]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($mustart['rawID'], ['stocks' => $changemus]);
               
            }
            elseif ($productID == 4) {
                $chick = $order['quantity'] * .1;
                $changech = $chicken['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;

                $this->raw->update($chicken['rawID'], ['stocks' => $changech]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
            }
            elseif ($productID == 5) {
                $gar = $order['quantity'] * .06;
                $changegar = $garlic['stocks'] - $order['quantity'];
                $chick = $order['quantity'] * .1;
                $changech = $chicken['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($garlic['rawID'], ['stocks' => $changegar]);
                $this->raw->update($chicken['rawID'], ['stocks' => $changech]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
               
            }
            elseif ($productID == 6) {
                $gar = $order['quantity'] * .06;
                $changegar = $garlic['stocks'] - $order['quantity'];
                $chick = $order['quantity'] * .1;
                $changech = $chicken['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($garlic['rawID'], ['stocks' => $changegar]);
                $this->raw->update($chicken['rawID'], ['stocks' => $changech]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                              
            }
            elseif ($productID == 7) {
                $por = $order['quantity'] * .09;
                $changepor = $pork['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
               
            }
            elseif ($productID == 8) {
                $bef= $order['quantity'] * .09;
                $changebef = $beef['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $pep = $order['quantity'] * .26;
                $changeper = $pepper['stocks'] - $pep;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($beef['rawID'], ['stocks' => $changebef]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
              
            }
            elseif ($productID == 9) {
                $por = $order['quantity'] * .09;
                $changepor = $pork['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);            
            }
            elseif ($productID == 10) {
                $por = $order['quantity'] * .09;
                $changepor = $pork['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);   
            }
            elseif ($productID == 11) {
                $por = $order['quantity'] * .09;
                $changepor = $pork['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .04;
                $changeol = $oil['stocks'] - $ol;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $cknor = $order['quantity'] * .01;
                $changecknor = $KnorCube['stocks'] - $cknor;
                $sal = $order['quantity'] * .009;
                $changesalt = $salt['stocks'] - $sal;

                $this->raw->update($pork['rawID'], ['stocks' => $changepor]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($salt['rawID'], ['stocks' => $changesalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);               
            }
            elseif ($productID == 12) {
                $eg = $order['quantity'] * .08;
                $changeeg = $egg['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .03;
                $changeol = $oil['stocks'] - $ol;
                $bac = $order['quantity'] * .06;
                $changebac = $bacon['stocks'] - $bac;
                $ketc = $order['quantity'] * .06;
                $changeketc = $ketchup['stocks'] - $ketc;

                $this->raw->update($egg['rawID'], ['stocks' => $changeeg]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($bacon['rawID'], ['stocks' => $changebac]);
                $this->raw->update($ketchup['rawID'], ['stocks' => $changeketc]);
               
            }
            elseif ($productID == 13) {
                $eg = $order['quantity'] * .08;
                $changeeg = $egg['stocks'] - $order['quantity'];
                $ol = $order['quantity'] * .03;
                $changeol = $oil['stocks'] - $ol;
                $ketc = $order['quantity'] * .06;
                $changeketc = $ketchup['stocks'] - $ketc;

                $this->raw->update($egg['rawID'], ['stocks' => $changeeg]);
                $this->raw->update($oil['rawID'], ['stocks' => $changeol]);
                $this->raw->update($ketchup['rawID'], ['stocks' => $changeketc]);
               
            }
            elseif ($productID == 14) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 15) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 16) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 17) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 18) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 19) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 20) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 21) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }elseif ($productID == 22) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 23) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 24) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 25) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 26) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 27) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 28) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 29) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 30) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 31) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 32) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 33) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 34) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 35) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 36) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 37) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 38) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 39) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 40) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 41) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 42) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 43) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 44) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 45) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 46) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 47) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 48) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 49) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 50) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 51) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 52) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 53) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 54) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 55) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 57) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 58) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 59) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 60) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }elseif ($productID == 61) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 62) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 63) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }elseif ($productID == 64) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 65) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 66) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 67) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 68) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }elseif ($productID == 69) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            

            elseif ($productID == 70) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 71) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 72) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 73) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 74) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 75) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 76) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 77) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 78) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }
            elseif ($productID == 79) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 80) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 81) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 82) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 83) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 84) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 85) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 86) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 87) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 88) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 89) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 90) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 91) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 92) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 93) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 94) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 95) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 96) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 97) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 98) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 99) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }

            elseif ($productID == 100) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 101) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 102) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 103) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 104) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 105) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 106) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 100) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 100) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 107) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
                $changetomat = $tomatosouce['stocks'] - $tomato;

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
            }


            elseif ($productID == 108) {
                $tor = $order['quantity'] * .03;
                $changetor = $tortillas['stocks'] - $order['quantity'];
                $on = $order['quantity'] * .03;
                $changeon = $onion['stocks'] - $on;
                $mush = $order['quantity'] * .26;
                $changemush = $mushroom['stocks'] - $mush;
                $tomato = $order['quantity'] * .06;
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

    $data = ['orderStatus' => 'AcceptOrder'];
        $this->order->update($orderIDs, $data);

    }

    public function viewOrders()
    {

     $data['order'] = $this->order->select('barcode, COUNT(*) as total_orders')->where('orderStatus','onProcess')
        ->groupBy('barcode')
        ->orderBy('barcode', 'ASC')
        ->findAll();
    return view('admin/orderpayment', $data);
    }

    public function item()
    {
        return view('admin/items');
    }
    
    public function logout()
    {
        session()->destroy();
        if(session()->get('UserRole') == 'Customer')
        {
            return redirect()->to('/');  
        }
         
        elseif(session()->get('UserRole') == 'Admin' || session()->get('UserRole') == 'Staff')
        {
            return redirect()->to('/login');
        }
    }
    
    public function viewToAcceptorders($barcode)
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];

        //for Single data
        $data['single'] =  $this->order->select('order.orderID, order.CustomerID, order.ProductID, order.paymentStatus, 
        order.orderType, order.orderDate, order.total, order.quantity, order.size, order.barcode, order.orderStatus,
        product_tbl.prod_id, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, 
        product_tbl.prod_lprice, product_tbl.prod_desc, product_tbl.prod_img, product_tbl.prod_categ, product_tbl.prod_code,
        user.UserID, user.LastName, user.FirstName, user.email, user.address, user.ContactNo')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')
        ->join('user', 'user.UserID = order.CustomerID')
        ->where('order.barcode', $barcode)->first(); 
        

        //for Multi Data
       $data['barcode'] =  $this->order->select('order.orderID, order.CustomerID, order.ProductID, order.paymentStatus, 
        order.orderType, order.orderDate, order.total, order.quantity, order.size, order.barcode, order.orderStatus,
        product_tbl.prod_id, product_tbl.prod_name, product_tbl.prod_quantity, product_tbl.prod_mprice, 
        product_tbl.prod_lprice, product_tbl.prod_desc, product_tbl.prod_img, product_tbl.prod_categ, product_tbl.prod_code,
        user.UserID, user.LastName, user.FirstName, user.email, user.address, user.ContactNo')
        ->join('product_tbl', 'product_tbl.prod_id = order.ProductID')
        ->join('user', 'user.UserID = order.CustomerID')
        ->where('order.barcode', $barcode)->findAll();

        //for total
        $data['total'] = $this->order->select('(SUM(total)) as sum')->where('barcode', $barcode)->first();

        return view('admin/viewByBarcode', $data);
    }

    public function gethistory()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $history = new HistoryModel();
        $data['history'] = $history->findAll();
        return view ('/admin/history', $data);
    }

    public function viewhistory(){
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        
        $history = new HistoryModel();
        $data['history'] = $history->findAll();
        return view('admin/vieworderhistory' , $data);
    }
    public function Notification()
    {
        return view('user/ForNotif/Notif');
    }


    public function report()
    {
        $data['raw'] = $this->raw->findAll();

        return view('admin/report', $data);
    
    }

    public function notificationRaw($id)
    {
        $data = ['notif' => $this->raw->where('rawID', $id)->first()];


        return view('admin/rawmatsnotif', $data);
    }

    public function salesreport()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '10')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];

        return view('admin/salesreport', $data);
    }


        public function PaymentMethod()
        {
            $session = session();
            $totalAmount = $session->get('totalAmount');
        
            if (!$totalAmount) {
                // Handle the case where totalAmount is not set
                $session->setFlashdata('error', 'Total amount not found. Please try again.');
                return redirect()->to('/cart');
            }
        
            $subPayment = $totalAmount * 100;
        
            $curl = curl_init();
        
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.paymongo.com/v1/links",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'data' => [
                        'attributes' => [
                            'amount' => $subPayment,
                            'description' => 'Trial',
                            'remarks' => 'Payment'
                        ]
                    ]
                ]),
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Basic c2tfdGVzdF90djNzdjRUSHhtR1ZaZWRIWjhwYlVBZjQ6",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $decode = json_decode($response, TRUE);
            $err = curl_error($curl);
            $reference_number = $decode['data']['attributes']['reference_number'];


        
            curl_close($curl);
        
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                foreach($decode as $key => $value)
                {
    
                    $name = $decode[$key]["attributes"]["checkout_url"];
                    $age = $decode[$key]["type"];
                    return redirect()->to($name);


                  }
    
            }
        }
        
    
}