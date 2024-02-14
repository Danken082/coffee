<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
class UserController extends BaseController
{
    private $user;

    public function __construct(){
        $this->user = new UserModel();

        helper(['form']);
    }
    public function register()
    {
        $rules = [

            'LastName' => 'required|min_length[2]',
            'FirstName' => 'required|min_length[2]',
            'gender' => 'required|min_length[2]',
            'email' => 'required|min_length[4]|valid_email|is_unique[user.email]',
            'ContactNo' => 'required|numeric',
            'UserRole' => 'required',
            'Password' => 'required|min_length[7]',
            'birthdate' => 'required|valid_date'
        ];

        if($this->validate($rules)){
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
            return redirect()->to('/');


        }
        else{
            $data['validation']= $this->validator;
            return view('admin/register', $data);
        }
    }

    public function login()
    {
        $session = session();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->user->where('email', $email)->first();

        if($user)
            {
                $pass = $user['Password'];
                $authenticatePassword = password_verify($password, $pass);
                if($authenticatePassword){
    $ses_data = [
            'UserID' => $user['UserID'],
            'LastName' => $user['LastName'],
            'FirstName' => $user['FirstName'],
            'UserRole' => $user['UserRole'],
            'birthdate' => $user['birthdate'],
            'email' => $user['email'],
            'Username' => $user['Username'],
            'Password' => $user['Password'],
            'ContactNo' => $user['ContactNo'],
            'gender' => $user['gender'],
            'address' => $user['address'],
            'isLoggedIn' => TRUE
        ];
        // if($user['UserRole']== 'admin')
        // {
          $session->set($ses_data);
           return redirect()->to('/adminhome');
          
        //}
        
                }
                else{
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    return redirect()->to('/');
                }
            }
            else{
                $session->setFlashdata('msg', 'Email does not exist.');
                return redirect()->to('/');
            }

    }

    public function logout(){
        session_destroy();
        return redirect()->to('/');
    }

    public function home(){
        return view('/user/home');
    }

    public function home_menu(){
        $menu = new ProductModel();
        $prod['meal'] = $menu->products('Meals');
        $prod['pasta'] = $menu->products('Pasta');
        $prod['app'] = $menu->products('Appetizer');
        $prod['salad'] = $menu->products('Salad');
        $prod['soup'] = $menu->products('Soup');
        $prod['sand'] = $menu->products('Sandwich');
        $prod['hot'] = $menu->products('Hot Coffee');
        $prod['iced'] = $menu->products('Iced Coffee');
        $prod['flav'] = $menu->products('Flavored Coffee');
        $prod['non'] = $menu->products('Non Coffee Frappe');
        $prod['coffee'] = $menu->products('Coffee Frappe');
        $prod['other'] = $menu->products('Others');
        return view('/user/menu', $prod);
    }

    public function home_services()
    {
        return view('/user/services');
    }

    public function home_blog()
    {
        return view('/user/blog');
    }

    public function home_about()
    {
        return view('/user/about');
    }
    public function home_shop(){
        $shop = new ProductModel();
        $prod['meal'] = $shop->products('Meals');
        $prod['pasta'] = $shop->products('Pasta');
        $prod['app'] = $shop->products('Appetizer');
        $prod['salad'] = $shop->products('Salad');
        $prod['soup'] = $shop->products('Soup');
        $prod['sand'] = $shop->products('Sandwich');
        $prod['hot'] = $shop->products('Hot Coffee');
        $prod['iced'] = $shop->products('Iced Coffee');
        $prod['flav'] = $shop->products('Flavored Coffee');
        $prod['non'] = $shop->products('Non Coffee Frappe');
        $prod['coffee'] = $shop->products('Coffee Frappe');
        $prod['other'] = $shop->products('Others');
        return view('/user/shop', $prod);
    }
    public function home_contact()
    {
        return view('/user/contact');
    }
    public function home_cart()
    {
        return view('/user/cart');
    }
    public function home_checkout()
    {
        return view('/user/checkout');
    }
    public function home_single_product()
    {
        return view('/user/single_product');
    }
}