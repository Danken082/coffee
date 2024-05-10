<?php

namespace App\Controllers;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use App\Libraries\ThermalPrinter\ThermalPrinter;

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
class AdminController extends BaseController
{
    private $user;
    private $history;
    private $orderprod;
    private $load;
    private $payment;
    private $tbl;
    private $fb;
    private $order;
    private $raw;
    public function __construct(){
        $this->user = new AdminUserModel();
        $this->history = new HistoryModel();
        $this->orderprod = new ProductModel();
        $this->payment = new PaymentModel();
        $this->tbl = new TableModel();
        $this->fb = new FeedbackModel();
        $this->order = new OrderModel();
        $this->raw = new ItemsModel();
    }
    

    public function printReceipt()
    {
        $printer = new ThermalPrinter();
        
        // Example receipt content
        $receipt_content = "
            Your Store Name
            ----------------
            Item:         $10.00
            Item:         $15.00
            Total:        $25.00
            ----------------
            Thank you for shopping!
        ";

        try {
            $result = $printer->printReceipt($receipt_content);
            if ($result === true) {
                echo "Receipt printed successfully.";
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
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
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
            'tomatosouce' => $this->raw->where('rawID', '79')->first(),
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
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        return view ('/admin/inventory', $data);
    }

    public function equip(){
        return view('/admin/equipments');
    }

    public function products(){
        return view('/admin/product');
    }

    public function order(){
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        return view('/admin/order', $data);
    }

    public function orderpayment(){

        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $data['order'] = $this->payment->select('order.orderID,order.barcode, user.UserID, product_tbl.prod_id, order.CustomerID, order.ProductID, order.total, order.orderStatus, 
        order.quantity, order.size, order.orderDate, order.orderType, order.paymentStatus, user.LastName, 
        user.FirstName, user.Username, user.ContactNo, user.address, user.gender, 
        product_tbl.prod_img, product_tbl.prod_name, product_tbl.prod_mprice', 'product_tbl.prod_lprice, product_tbl.prod_decs')
        ->join('product_tbl', 
        'order.ProductID = product_tbl.prod_id')
        ->join( 'user', 'order.CustomerID = user.UserID')
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
 
   
    public function gethistory()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $history = new HistoryModel();
        $data['history'] = $history->findAll();
        return view ('/admin/history', $data);
    }

    public function getcustomeruser()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        $role = 'Customer';
        $user = new AdminUserModel();
        $data['customer'] = $user->customeruser($role);
        return view ('/admin/customermanage_user', $data);
    }

    public function getmanageuser()
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
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

    public function edituser($id)
    {
        $data['euser'] = $this->user->find($id);
        return view('/admin/edituser', $data);
    }

    public function updateuser($id)
    {
        $user = new AdminUserModel();
        $data = [
            'LastName' => $this->request->getVar('LastName'),
            'FirstName' => $this->request->getVar('FirstName'),
            'gender' => $this->request->getVar('gender'),
            'email' => $this->request->getVar('email'),
            'ContactNo' => $this->request->getVar('ContactNo'),
            'UserRole' => $this->request->getVar('UserRole'),
            'Username' => $this->request->getVar('Username'),
            'Password' => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
            'address' => $this->request->getVar('address'),
            'birthdate' => $this->request->getVar('birthdate'),
        ];
        $user->update($id, $data);
        return redirect()->to(base_url('adminmanage_user'));
    }
    
    public function deleteuser($id)
    {  
        $this->user->delete($id);
        return redirect()->to(base_url('adminmanage_user'));
    }

    public function pos(){
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
        ];
        return view('/admin/pos', $data);
    }

    public function product_item(){
        return view('/inventory/product_item/prod_items');
    }
    public function getPendingOrders()
    {
        $getID = $this->request->getPost('orderID');
        $getRaw = $this->request->getPost('');        

        $myOrders = $this->viewPendingOrders($getID);
                    $this->AcceptOrders($myOrders, $getID);

        return redirect()->to('adminorderpayment')->with('msg', 'Order is now Accepted');
        
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

                $this->raw->update($tortillas['rawID'], ['stocks' => $changetor]);
                $this->raw->update($onion['rawID'], ['stocks' => $changeon]);
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($tomatosouce['rawID'], ['stocks' => $changetomat]);
               
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
                $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
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
                $this->raw->update($mushroom['rawID'], ['stocks' => $changemush]);
                $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
                $this->raw->update($KnorCube['rawID'], ['stocks' => $changecknor]);
                $this->raw->update($pepper['rawID'], ['stocks' => $changepep]);
    
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
                $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
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
                $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
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
                $this->raw->update($salt['rawID'], ['stocks' => $changetosalt]);
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
        elseif(session()->get('UserRole') == 'Admin')
        {
            return redirect()->to('/login');
        }
    }
    public function viewToAcceptorders($barcode)
    {
        $data= [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(), 
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



}
