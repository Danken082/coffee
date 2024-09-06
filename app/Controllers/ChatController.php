<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
class ChatController extends BaseController
{
    // public function index()
    // {
    //     //
    // }
    // public function __construct()
    // {
    //     parent::__construct();
    // }
    // public function load_system_info()
    // {
    //     if()
    // }

    public function try()
    {
        $menu = new ProductModel();
        $prod['app'] = $menu->products('Appetizer');
        return view('user/pos', $prod);
    }
    public function sampleNotif()
    {
        return view("noticationtrial");
    }


    public function Nofication()
    {
        //         https://fcm.googleapis.com/v1/projects/<YOUR-PROJECT-ID>/messages:send
        // Content-Type: application/json
        // Authorization: Bearer <YOUR-ACCESS-TOKEN>

        // {
        // "message": {
        //     "token": "eEz-Q2sG8nQ:APA91bHJQRT0JJ...",
        //     "notification": {
        //     "title": "Background Message Title",
        //     "body": "Background message body"
        //     },
        //     "webpush": {
        //     "fcm_options": {
        //         "link": "https://dummypage.com"
        //     }
        //     }
        // }
        // }


        $ch  = curl_init("https://fcm.googleapis.com/v1/projects/crossroads-notification/messages:send");
    }

}
