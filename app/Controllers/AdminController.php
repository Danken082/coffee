<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminUserModel;
use App\Models\HistoryModel;
use App\Models\ProductModel;

class AdminController extends BaseController
{
    private $user;
    private $history;
    private $orderprod;
    private $load;
    
    public function __construct(){
        $this->user = new UserModel();
        $this->history = new HistoryModel();
        $this->orderprod = new ProductModel();
    }

    public function edit($id)
    {
    
        $data = $this->user->where('user_id', $id)->findAll();

        var_dump($data);
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

    public function gethistory()
    {
        $history = new HistoryModel();
        $data['history'] = $history->findAll();
        return view ('/admin/history', $data);
    }

    public function getmanageuser()
    {
       
        $data['mnguser'] = $this->user->findAll();
        return view ('/admin/manage_user', $data);
    }

    public function mnguser(){
        return view('/admin/adduser');
    }

    public function adduser()
    {
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
        $this->user->save($data);
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
}