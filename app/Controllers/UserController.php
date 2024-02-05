<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
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

        $session->set($ses_data);
           return redirect()->to('/adminhome');
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
        return view('user/home');
    }

    public function home_menu(){
        return view('user/menu');
    }

    public function header()
    {
        return view('user/header');
    }
}
