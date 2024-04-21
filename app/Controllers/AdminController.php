<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminUserModel;
use App\Models\HistoryModel;
use App\Models\ProductModel;
use App\Models\PaymentModel;
use App\Models\TableModel;
class AdminController extends BaseController
{
    private $user;
    private $history;
    private $orderprod;
    private $load;
    private $payment;
    private $tbl;

    public function __construct(){
        $this->user = new AdminUserModel();
        $this->history = new HistoryModel();
        $this->orderprod = new ProductModel();
        $this->payment = new PaymentModel();
        $this->tbl = new TableModel();
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
       return view('/admin/home');
    }

    public function dashboard(){
        return view('/admin/dashboard');
    }

    public function inventory()
    {
        return view ('/admin/inventory');
    }

    public function equip(){
        return view('/admin/equipments');
    }

    public function products(){
        return view('/admin/product');
    }

    public function order(){
        return view('/admin/order');
    }

    public function orderpayment(){

        
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
        $history = new HistoryModel();
        $data['history'] = $history->findAll();
        return view ('/admin/history', $data);
    }

    public function getcustomeruser()
    {
        $role = 'Customer';
        $user = new AdminUserModel();
        $data['customer'] = $user->customeruser($role);
        return view ('/admin/customermanage_user', $data);
    }

    public function getmanageuser()
    {
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
        return view('/admin/pos');
    }

    public function product_item(){
        return view('/inventory/product_item/prod_items');
    }


}