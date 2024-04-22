<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Libraries\CIAuth;
class UserController extends BaseController
{
    private $user;
    private $product;
    private $crt;

    public function __construct(){
        $this->user = new UserModel();
        $this->product = new ProductModel();
        $this->crt = new CartModel();
        helper(['form']);
    }
    public function register()
    {   
        // $verificationToken = substr(md5(rand()), 0, 8);

       
        $rules = [

            'LastName' => 'required|min_length[2]',
            'FirstName' => 'required|min_length[2]',
            'gender' => 'required|min_length[2]',
            'email' => 'required|min_length[4]|valid_email|is_unique[user.email]',
            'ContactNo' => 'required|regex_match[/^[0-9]{11}$/]',
            'UserRole' => 'required',
            'Password' => 'required|alpha_numeric_punct|min_length[7]',
            'birthdate' => 'required|valid_date'
        ];

        if($this->validate($rules)){
               $verificationToken = substr(md5(rand()), 0, 8);
        
                $data = [
                'LastName'    => $this->request->getVar('LastName'),
                'FirstName'   => $this->request->getVar('FirstName'),
                'gender'      => $this->request->getVar('gender'),
                'email'       => $this->request->getVar('email'),
                'ContactNo'   => $this->request->getVar('ContactNo'),
                'profile_img' => 'profile.png',
                'UserRole'    => $this->request->getVar('UserRole'),
                'Username'    => $this->request->getVar('Username'),
                'Password'    => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT),
                'address'     => $this->request->getVar('address'),
                'birthdate'   => $this->request->getVar('birthdate'),
                'code'        =>  $verificationToken,
                'status'      => 'pending'
            ];


            
            $this->user->insert($data);

            $email = \Config\Services::email();

            $email->setFrom('rontaledankeneth@gmail.com', 'codeigniter');
            $email->setTo($this->request->getVar('email'));
            // $email->setCC('another@another-example.com');
            // $email->setBCC('them@their-example.com');

            $email->setSubject('Email Test');
            $email->setMessage($verificationToken);
                if($email->send())
            {
                echo('success');
                // return view('email/activateCode');
            }
            else{
                echo('Failed');
                // return view('email/activateCode');
            }
    
            // $this->user->save($data);
//             return redirect()->to('/login');
//         }
        
// >>>>>>> 350b979baeeab26408dd1dba9e885aaf56f9f440
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
                        'profile_img' => $user['profile_img'],
                        'Username' => $user['Username'],
                        'Password' => $user['Password'],
                        'ContactNo' => $user['ContactNo'],
                        'gender' => $user['gender'],
                        'address' => $user['address'],
                        'isLoggedIn' => TRUE
                    ];

                 $session->set($ses_data);
           if($user['UserRole'] == 'Admin')
           {
            return redirect()->to('/adminhome');
           }
           else{
            return redirect()->to('/mainhome');
           }
        }
                
        else{
                $session->setFlashdata('msg', 'Incorect email or password.');
                return redirect()->to('/');
            }
        }
    }

    public function logout(){
        session_destroy();
        return redirect()->to('/');
    }

    public function home(){
        $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();    
    
        return view('/user/home', $data);
    }

    public function mainhome(){
        $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

            $cartItems = $this->crt->where('CustomerID', $user)->findAll();

            $cartItemCount = count($cartItems);
    
            $data = [
                'cartItemCount' => $cartItemCount,
                'cartItems' => $cartItems
            ];
    
        return view('/user/mainhome', $data);
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

    public function home_mainmenu(){
        $menu = new ProductModel();
                $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

            $cartItems = $this->crt->where('CustomerID', $user)->findAll();

            $cartItemCount = count($cartItems);
    
            $data = [
                'cartItemCount' => $cartItemCount,
                'cartItems' => $cartItems,
               'meal' => $menu->products('Meals'),
               'pasta' =>  $menu->products('Pasta'),
               'app' => $menu->products('Appetizer'),
               'salad' => $menu->products('Salad'),
               'soup' => $menu->products('Soup'),
               'sand' => $menu->products('Sandwich'),
               'hot' => $menu->products('Hot Coffee'),
               'iced' => $menu->products('Iced Coffee'),
               'flav' => $menu->products('Flavored Coffeee'),
                'non' =>  $menu->products('Non Coffee Frappe'),
                'coffee' =>$menu->products('Coffee Frappe'),
                'other' => $menu->products('Others'),


            ];

        return view('/user/mainmenu', $data);
    }

    public function home_services()
    {
        return view('/user/services');
    }

    public function home_mainservices()
    {
        $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

            $cartItems = $this->crt->where('CustomerID', $user)->findAll();

            $cartItemCount = count($cartItems);
    
            $data = [
                'cartItemCount' => $cartItemCount,
                'cartItems' => $cartItems
            ];

        return view('/user/mainservices',$data);
    }

    public function home_about()
    {
        return view('/user/about');
    }

    public function home_mainabout()
    {
        $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

            $cartItems = $this->crt->where('CustomerID', $user)->findAll();

            $cartItemCount = count($cartItems);
    
            $data = [
                'cartItemCount' => $cartItemCount,
                'cartItems' => $cartItems
            ];

        return view('/user/mainabout', $data);
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
    public function home_mainshop(){
        $menu = new ProductModel();
        $session = session();
    $user = $session->get('UserID');
    $data = 
    $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

    $cartItems = $this->crt->where('CustomerID', $user)->findAll();

    $cartItemCount = count($cartItems);

    $data = [
        'cartItemCount' => $cartItemCount,
        'cartItems' => $cartItems,
       'meal' => $menu->products('Meals'),
       'pasta' =>  $menu->products('Pasta'),
       'app' => $menu->products('Appetizer'),
       'salad' => $menu->products('Salad'),
       'soup' => $menu->products('Soup'),
       'sand' => $menu->products('Sandwich'),
       'hot' => $menu->products('Hot Coffee'),
       'iced' => $menu->products('Iced Coffee'),
       'flav' => $menu->products('Flavored Coffeee'),
        'non' =>  $menu->products('Non Coffee Frappe'),
        'coffee' =>$menu->products('Coffee Frappe'),
        'other' => $menu->products('Others'),


    ];   return view('/user/mainshop', $data);
    }
    
    public function home_contact()
    {
        return view('/user/contact');
    }
    public function home_maincontact()
    {
        $session = session();
        $user = $session->get('UserID');
        $data = 
            $this->crt->select("Count(size)")->where('CustomerID', $user)->first();

            $cartItems = $this->crt->where('CustomerID', $user)->findAll();

            $cartItemCount = count($cartItems);
    
            $data = [
                'cartItemCount' => $cartItemCount,
                'cartItems' => $cartItems
            ];

        return view('/user/maincontact', $data);
    }
    
    public function home_checkout()
    {
        return view('/user/checkout');
    }

    public function profile()
    { 
        return view('/user/profile');
    }

    public function edit_profile($id)
    {
        $data['eprof'] = $this->user->find($id);
        return view('/user/edit_profile', $data);
    }

    public function updateprofile($id)
    {
        if ($this->request->getMethod() === 'post') {
            $userId = session()->get('UserID');
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
                }
            $this->user->updateUserProfile($userId, $data);
            session()->set($data);
            return redirect()->to(base_url('/profile'));
        }
    }

    public function removeProfilePicture($userId)
    {
        $userModel = new UserModel();
        $userModel->update($userId, ['profile_img' => 'profile.png']);
        session()->set('profile_img', 'profile.png');

        return redirect()->to(base_url('/profile'));
    }

    public function CartCount()
    {
        $data['count'] = $this->crt->countAll();

    }

    public function orderProd()
    {
        $orderAgad = $this->request->getVar('item');

        if(empty($orderAgad)){
            return redirect()-to('user/shop')->with('Please Select Product');
        }

        $prodOrder = $this->myOrder($orderAgad);
        
        $this->insertOrder($prodOrder);

        return redirect()->to('user/shop')->with('msg', 'Your Product has been Ordered');
    }

    private function myOrder($orderAgad)
    {
        $prodOrder = $this->prod->whereIn('id', $orderAgad)->get()->getResultArray();

        return $prodOrder;
    }

    private function insertOrder($prodOrder)
    {
        $order = [];

        foreach($prodOrder as $ord)
        {

        }
    }
}