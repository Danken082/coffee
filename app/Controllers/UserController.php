<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use Google\Auth\Credentials\SeviceAccountCredentials;
use Google\Auth\HttpHandler\HttpHandlerFactory;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Libraries\CIAuth;


class UserController extends BaseController
{

    private $maxLoginAttempts = 5;
    private $lockoutTime = 300;
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
            'Password' => 'required|alpha_numeric_punct|min_length[8]',
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

    // public function login()
    // {
    //     $session = session();

    //     $email = $this->request->getVar('email');
    //     $password = $this->request->getVar('password');

    //     $user = $this->user->where('email', $email)->first();

    //     if($user)
    //         {
    //             $pass = $user['Password'];
    //             $authenticatePassword = password_verify($password, $pass);
    //             if($authenticatePassword){
    //                 $ses_data = [
    //                     'UserID' => $user['UserID'],
    //                     'LastName' => $user['LastName'],
    //                     'FirstName' => $user['FirstName'],
    //                     'UserRole' => $user['UserRole'],
    //                     'birthdate' => $user['birthdate'],
    //                     'email' => $user['email'],
    //                     'profile_img' => $user['profile_img'],
    //                     'Username' => $user['Username'],
    //                     'Password' => $user['Password'],
    //                     'ContactNo' => $user['ContactNo'],
    //                     'gender' => $user['gender'],
    //                     'address' => $user['address'],
    //                     'isLoggedIn' => TRUE
    //                 ];

    //              $session->set($ses_data);
    //        if($user['UserRole'] == 'Admin')
    //        {
    //         return redirect()->to('/adminhome');
    //        }
    //        else{
    //         return redirect()->to('/mainhome');
    //        }
    //     }
                
    //     else{
    //             $session->setFlashdata('msg', 'Incorect email or password.');
    
    //             return redirect()->to('/login');
    //         }
    //     }
    // }


    public function login()
    {
        $session = session();
        
        // Check if user is locked out
        if ($session->get('lockout_time') && time() < $session->get('lockout_time')) {
            $remainingLockoutTime = $session->get('lockout_time') - time();
            $remainingLockoutMinutes = ceil($remainingLockoutTime / 60); 
            $session->setFlashdata('msg', "Too many login attempts. Please try again in $remainingLockoutMinutes Minutes.");
            return redirect()->to('/login');
        }

        // Clear lockout if time has passed
        if ($session->get('lockout_time') && time() >= $session->get('lockout_time')) {
            $session->remove('lockout_time');
            $session->remove('login_attempts');
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->user->where('email', $email)->first();

        if ($user) {
            $pass = $user['Password'];
            $authenticatePassword = password_verify($password, $pass);
            
            if ($authenticatePassword) {
                // Successful login
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
                $session->remove('login_attempts'); // Reset login attempts
                
                if ($user['UserRole'] == 'Admin') {
                    return redirect()->to('/adminhome');
                } else {
                    return redirect()->to('/mainhome');
                }
            } else {
                // Failed login
                $this->incrementLoginAttempts($session);
                $session->setFlashdata('msg', 'Incorrect email or password.');
                return redirect()->to('/login');
            }
        } else {
            // Failed login
            $this->incrementLoginAttempts($session);
            $session->setFlashdata('msg', 'Incorrect email or password.');
            return redirect()->to('/login');
        }
    }

    private function incrementLoginAttempts($session)
    {
        if (!$session->has('login_attempts')) {
            $session->set('login_attempts', 1);
        } else {
            $loginAttempts = $session->get('login_attempts');
            $loginAttempts++;
            $session->set('login_attempts', $loginAttempts);

            if ($loginAttempts >= $this->maxLoginAttempts) {
                $session->set('lockout_time', time() + $this->lockoutTime);
                $lockoutMinutes = ceil($this->lockoutTime / 60);
                $session->setFlashdata('msg', "Too many login attempts. Please try again in $this->lockoutMinutes Minutes.");
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
               'flav' => $menu->products('Flavored Coffee'),
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
        'flav' => $menu->products('Flavored Coffee'),
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

    public function profile()
    { 
        return view('/user/profile');
    }

    public function edit_profile($id)
    {
        $data['eprof'] = $this->user->find($id);
        return view('/user/edit_userprofile', $data);
    }

    public function updateprofile($id)
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

            return redirect()->to(base_url('/profile'));
        }
    }

    public function removeProfilePicture($userId)
    {
        $userModel = new UserModel();
        $currentUser = $userModel->find($userId);
        $profileImg = $currentUser['profile_img'];
        $defaultProfileImg = 'profile.png';

        if (!empty($profileImg) && $profileImg !== $defaultProfileImg && file_exists('assets/user/images/' . $profileImg)) {
            unlink('assets/user/images/' . $profileImg);
        }

        $userModel->update($userId, ['profile_img' => $defaultProfileImg]);
        session()->set('profile_img', $defaultProfileImg);

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
            return redirect()->to('user/shop')->with('msg', 'Please Select Product');
        }

        $prodOrder = $this->myOrder($orderAgad);
        
        $this->insertOrder($prodOrder);

        return redirect()->to('user/shop')->with('msg', 'Your Product has been Ordered');
    }

    private function myOrder($orderAgad)
    {
        $prodOrder = $this->product->whereIn('id', $orderAgad)->get()->getResultArray();

        return $prodOrder;
    }

    private function insertOrder($prodOrder)
    {
        $order = [];

        foreach($prodOrder as $ord)
        {

        }
    }


    public function userNotification()
    {

        $credentials = new SeviceAccountCredentials3("https:://www.googleapis.com/auth/firebase.messaging",
        json_decode(file_get_contents(base_url("js/pvk.json")), true)
    );

    $token = $credentials->fetchAuthToken(HttpHandlerFactory::build());

        $ch = curl_init("https://fcm.googleapis.com//v1/projects/notifbar-980f5/messages:send");

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: bearer' .$token['access_token']     
        ]);

        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        '{
              "message": {
                "token": "cZPqgWYv3PGvRSqS2vj3-d:APA91bF6TBmFhyVPOyrNzyvMyy5_gmOLtjtN9LIOt5f9pkMQjksLXFhwbkLTzLdP-7alOZkaKJFv7ymWSaax1OScY19KcOr9w4jzdJfQEiw2I8k1aSR2vH--84R5gJm8Tk2ZvyLpeouB",
                "notification": {
                  "title": "Background Message Title",
                  "body": "Background message body"
                },
                "webpush": {
                  "fcm_   options": {
                    "link": "https://Google.com"
                  }
                }
              }
            }');


            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");

            $response = curl_exec($ch);

            curl_close($ch);

            echo $response;
    }
}