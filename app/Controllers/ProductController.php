<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\ItemModel;

class ProductController extends BaseController
{
    private $product;
    private $cart;
    private $item;

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->cart = new CartModel();
        $this->item = new ItemModel();
    }


    public function AddProduct(){
        
        $rules = [
            'productName'=> 'required|minlength[4]|maxlengt[100]',
            'ProductQuantity'=> 'required|minlength[4]|maxlengt[100]',
            'ProductPrice'=> 'required|minlength[4]|maxlengt[100]',
            'ProductCategory'=> 'required|minlength[4]|maxlengt[100]',
            'ProductCode'=> 'required|minlength[4]|maxlengt[100]',
            'ProductDescription'=> 'required|minlength[4]|maxlengt[100]',
        ];

        if($this->validate($rules)){

            $data = [
                'productName' => $this->request->getVar('productName'),
                'ProductQuantity' => $this->request->getVar('ProductQuantity'),
                'ProductPrice' => $this->request->getVar('ProductPrice'),
                'ProductCategory' => $this->request->getVar('ProductCategory'),
                'ProductCode' => $this->request->getVar('ProductCode'),
                'ProductDescription' => $this->request->getVar('ProductDescription'),
            ];

            $this->product->save($data);
        }

        else
        {
            $data['validation'] = $this->validator;
            return view('inventory/hotcoffee', $data);
        }
    }

    public function editProduct($ProductID){

        $data['product'] = $this->product->where('productID', $ProductID)->findAll();

        return view('product/editProduct', $data);
    }

    public function updateProduct(){
        
        $rules = [
            'productName'=> 'required|minlength[4]|maxlengt[100]',
            'ProductQuantity'=> 'required|minlength[4]|maxlengt[100]',
            'ProductPrice'=> 'required|minlength[4]|maxlengt[100]',
            'ProductCategory'=> 'required|minlength[4]|maxlengt[100]',
            'ProductCode'=> 'required|minlength[4]|maxlengt[100]',
            'ProductDescription'=> 'required|minlength[4]|maxlengt[100]',
        ];
        if($this->validate($rules)){
                $user_id = $this->request->getVar('user_id');
            $data = [
                'productName' => $this->request->getVar('productName'),
                'ProductQuantity' => $this->request->getVar('ProductQuantity'),
                'ProductPrice' => $this->request->getVar('ProductPrice'),
                'ProductCategory' => $this->request->getVar('ProductCategory'),
                'ProductCode' => $this->request->getVar('ProductCode'),
                'ProductDescription' => $this->request->getVar('ProductDescription'),
            ];

            $this->product->set($data)->where('productID', $user_id)->update();
            return view('procuct/editProduct', $data);
        }

        else
        {
            $data['validation'] = $this->validator;
            return view('inventory/hotcoffee', $data);
        }
   

        
    }
    public function deleteProduct($user_id)
    {
        $this->product->delete($user_id);

        return redirect();
    }
    public function Cart($productID){
      $product=  $this->product->find($productID);
      
      if(!$product)
      {
        return redirect()->to('user/shop');
      }

      if (!session()->has('user_id')) {
        return redirect()->to('/login')->with('error', 'Please log in to add items to your cart.');
        }

        $userID = session('userID');
        
        $existingItem = $this->cart->where('CustomerID', $userID)->where('ProductID')->first();

        if($existingItem)
        {
            $update = $existingItem['quantity'] + 1;
            $this->cart->update($existingItem['id'], ['quantity' => $update]);
        }
        else
        {
            $data = [
                'CustomerID' => $userID,
                'ProductID' => $productID,
                'qunatity' => 1,
                'Status' => $this->request->getVar('Status')
            ];
            $this->cart->save($data);
        }

        

        return redirect()->to('user/cart');
    }
    public function prod()
    {
      $data = $this->product->findAll();

      var_dump($data);
    }

    public function availability()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryflavoredcoffee')->with('msg', 'Product is now available');     
    }

    private function myProduct($update)
    {
        $updateAvailability = $this->product->where('prod_id', $update)->first();

        return $updateAvailability;
    }
  
    private function updateProd($updateAvailability, $update)
    {
            $data = [
                'product_status' => $this->request->getPost('prod_status')
            ];

        $this->product->update($updateAvailability, $data);
    }

    public function Unavailable()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
         return redirect()->to('inventoryflavoredcoffee')->with('msg', 'Product is now available');     


        
         }

    private function UnavailableProduct($unavailable)
    {
       $updateUnavailability = $this->product->where('prod_id', $unavailable)->first();

        return $updateUnavailability;
    }

    private function updateAvailable($updateUnavailability)
    {
        $data = [
            'product_status' => $this->request->getPost('prod_status')
        ];

        $this->product->update($updateUnavailability, $data);
    }

}

