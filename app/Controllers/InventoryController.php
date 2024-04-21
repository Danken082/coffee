<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class InventoryController extends BaseController
{   
    private $prod;

    public function __construct(){
        $this->prod = new ProductModel();
    }

    public function drinks(){
        return view('/inventory/adddrinks');
    }

    public function adddrink(){
        $prod = new ProductModel();
        $addDrinks = substr(md5(rand()), 0, 8);
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_categ' => $this->request->getPost('prod_categ'),
            'prod_code' => $addDrinks,
            'prod_img' => $this->request->getPost('prod_img'),
            'product_status' => 'Available'
        ];
        $prod->save($data);
        return redirect()->to(base_url('/adminprod'));
    }

    public function gethotcoffee()
    {
        $categ = 'Hot Coffee';
        $prod = new ProductModel();
        $data['prod'] = $prod->hotcoffee($categ);
        return view ('/inventory/hotcoffee', $data);
    }

    public function edithot($id)
    {
        $ehot = new ProductModel();
        $data['ehot'] = $ehot->find($id);
        return view('/inventory/edithotcoffee', $data);
    }

    public function updatehot($id)
    {
        $hot = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $hot->update($id, $data);
        return redirect()->to(base_url('inventoryhotcoffee'));
    }
    
    public function deletehot($id)
    {
        $hot = new ProductModel();
        $hot->delete($id);
        return redirect()->to(base_url('inventoryhotcoffee'));
    }

    public function availabilityhot()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryhotcoffee')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablehot()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryhotcoffee')->with('msg', "The product you've selected is now unavailable");     
    }

    private function myProduct($update)
    {
        $updateAvailability = $this->prod->where('prod_id', $update)->first();

        return $updateAvailability;
    }
  
    private function updateProd($updateAvailability, $update)
    {
            $data = [
                'product_status' => $this->request->getPost('prod_status')
            ];

        $this->prod->update($updateAvailability, $data);
    }


    private function UnavailableProduct($unavailable)
    {
       $updateUnavailability = $this->prod->where('prod_id', $unavailable)->first();

        return $updateUnavailability;
    }

    private function updateAvailable($updateUnavailability)
    {
        $data = [
            'product_status' => $this->request->getPost('prod_status')
        ];

        $this->prod->update($updateUnavailability, $data);
    }

    public function geticedcoffee()
    {
        $categ = 'Iced Coffee';
        $prod = new ProductModel();
        $data['prod'] = $prod->icedcoffee($categ);
        return view ('/inventory/icedcoffee', $data);
    }

    public function editiced($id)
    {
        $eiced = new ProductModel();
        $data['eiced'] = $eiced->find($id);
        return view('/inventory/editicedcoffee', $data);
    }

    public function updateiced($id)
    {
        $iced = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        
        $iced->update($id, $data);
        return redirect()->to(base_url('inventoryicedcoffee'));
    }
    
    public function deleteiced($id)
    {
        $iced = new ProductModel();
        $iced->delete($id);
        return redirect()->to(base_url('inventoryicedcoffee'));
    }

    public function availabilityiced()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryicedcoffee')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailableiced()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryicedcoffee')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getflavoredcoffee()
    {
        $categ = 'Flavored Coffee';
        $prod = new ProductModel();
        $data['prod'] = $prod->flavoredcoffee($categ);
        return view ('/inventory/flavoredcoffee', $data);
    }

    public function editflavored($id)
    {
        $eflav = new ProductModel();
        $data['eflav'] = $eflav->find($id);
        return view('/inventory/editflavored', $data);
    }

    public function updateflavored($id)
    {
        $flav = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $flav->update($id, $data);
        return redirect()->to(base_url('inventoryflavoredcoffee'));
    }
    
    public function deleteflavored($id)
    {
        $flav = new ProductModel();
        $flav->delete($id);
        return redirect()->to(base_url('inventoryflavoredcoffee'));
    }

    public function availabilityflavored()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryflavoredcoffee')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailableflavored()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryflavoredcoffee')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getnoncoffee()
    {
        $categ = 'Non Coffee Frappe';
        $prod = new ProductModel();
        $data['prod'] = $prod->noncoffee($categ);
        return view ('/inventory/noncoffee', $data);
    }

    public function editnoncoffee($id)
    {
        $enon = new ProductModel();
        $data['enon'] = $enon->find($id);
        return view('/inventory/editnoncoffee', $data);
    }

    public function updatenoncoffee($id)
    {
        $non = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $non->update($id, $data);
        return redirect()->to(base_url('inventorynoncoffee'));
    }
    
    public function deletenoncoffee($id)
    {
        $non = new ProductModel();
        $non->delete($id);
        return redirect()->to(base_url('inventorynoncoffee'));
    }

    public function availabilitynoncoffee()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorynoncoffee')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablenoncoffee()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorynoncoffee')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getcoffeefrappe()
    {
        $categ = 'Coffee Frappe';
        $prod = new ProductModel();
        $data['prod'] = $prod->coffeefrappe($categ);
        return view ('/inventory/coffeefrappe', $data);
    }

    public function editcoffeefrappe($id)
    {
        $efrap = new ProductModel();
        $data['efrap'] = $efrap->find($id);
        return view('/inventory/editcoffeefrappe', $data);
    }

    public function updatecoffeefrappe($id)
    {
        $frap = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $frap->update($id, $data);
        return redirect()->to(base_url('inventorycoffeefrappe'));
    }
    
    public function deletecoffeefrappe($id)
    {
        $frap = new ProductModel();
        $frap->delete($id);
        return redirect()->to(base_url('inventorycoffeefrappe'));
    }

    public function availabilitycoffeefrappe()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorycoffeefrappe')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablecoffeefrappe()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorycoffeefrappe')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getothers()
    {
        $categ = 'Others';
        $prod = new ProductModel();
        $data['prod'] = $prod->others($categ);
        return view ('/inventory/others', $data);
    }

    public function editothers($id)
    {
        $eother = new ProductModel();
        $data['eother'] = $eother->find($id);
        return view('/inventory/editothers', $data);
    }

    public function updateothers($id)
    {
        $other = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $other->update($id, $data);
        return redirect()->to(base_url('inventoryothers'));
    }
    
    public function deleteothers($id)
    {
        $other = new ProductModel();
        $other->delete($id);
        return redirect()->to(base_url('inventoryothers'));
    }

    public function availabilityothers()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryothers')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailableothers()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryothers')->with('msg', "The product you've selected is now unavailable");     
    }

    public function meals(){
        return view('/inventory/addmeals');
    }

    public function addmeals()
    {
        $prod = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_categ' => $this->request->getPost('prod_categ'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $prod->save($data);
        return redirect()->to(base_url('/adminprod'));
    }

    public function getmeal()
    {
        $categ = 'Meals';
        $prod = new ProductModel();
        $data['prod'] = $prod->meal($categ);
        return view ('/inventory/meal', $data);
    }

    public function editmeal($id)
    {
        $emeal = new ProductModel();
        $data['emeal'] = $emeal->find($id);
        return view('/inventory/editmeal', $data);
    }

    public function updatemeal($id)
    {
        $meal = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $meal->update($id, $data);
        return redirect()->to(base_url('inventorymeal'));
    }
    
    public function deletemeal($id)
    {
        $meal = new ProductModel();
        $meal->delete($id);
        return redirect()->to(base_url('inventorymeal'));
    }

    public function availabilitymeal()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorymeal')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablemeal()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorymeal')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getpasta()
    {
        $categ = 'Pasta';
        $prod = new ProductModel();
        $data['prod'] = $prod->pasta($categ);
        return view ('/inventory/pasta', $data);
    }

    public function editpasta($id)
    {
        $epasta = new ProductModel();
        $data['epasta'] = $epasta->find($id);
        return view('/inventory/editpasta', $data);
    }

    public function updatepasta($id)
    {
        $pasta = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $pasta->update($id, $data);
        return redirect()->to(base_url('inventorypasta'));
    }
    
    public function deletepasta($id)
    {
        $pasta = new ProductModel();
        $pasta->delete($id);
        return redirect()->to(base_url('inventorypasta'));
    }

    public function availabilitypasta()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorypasta')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablepasta()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorypasta')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getappetizer()
    {
        $categ = 'Appetizer';
        $prod = new ProductModel();
        $data['prod'] = $prod->appetizer($categ);
        return view ('/inventory/appetizer', $data);
    }

    public function editappetizer($id)
    {
        $eapp = new ProductModel();
        $data['eapp'] = $eapp->find($id);
        return view('/inventory/editappetizer', $data);
    }

    public function updateappetizer($id)
    {
        $app = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $app->update($id, $data);
        return redirect()->to(base_url('inventoryappetizer'));
    }
    
    public function deleteappetizer($id)
    {
        $app = new ProductModel();
        $app->delete($id);
        return redirect()->to(base_url('inventoryappetizer'));
    }

    public function availabilityappetizer()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryappetizer')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailableappetizer()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryappetizer')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getsalad()
    {
        $categ = 'Salad';
        $prod = new ProductModel();
        $data['prod'] = $prod->salad($categ);
        return view ('/inventory/salad', $data);
    }

    public function editsalad($id)
    {
        $esalad = new ProductModel();
        $data['esalad'] = $esalad->find($id);
        return view('/inventory/editsalad', $data);
    }

    public function updatesalad($id)
    {
        $salad = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $salad->update($id, $data);
        return redirect()->to(base_url('inventorysalad'));
    }
    
    public function deletesalad($id)
    {
        $salad = new ProductModel();
        $salad->delete($id);
        return redirect()->to(base_url('inventorysalad'));
    }

    public function availabilitysalad()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorysalad')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablesalad()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorysalad')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getsoup()
    {
        $categ = 'Soup';
        $prod = new ProductModel();
        $data['prod'] = $prod->soup($categ);
        return view ('/inventory/soup', $data);
    }

    public function editsoup($id)
    {
        $esoup = new ProductModel();
        $data['esoup'] = $esoup->find($id);
        return view('/inventory/editsoup', $data);
    }

    public function updatesoup($id)
    {
        $soup = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $soup->update($id, $data);
        return redirect()->to(base_url('inventorysoup'));
    }
    
    public function deletesoup($id)
    {
        $soup = new ProductModel();
        $soup->delete($id);
        return redirect()->to(base_url('inventorysoup'));
    }

    public function availabilitysoup()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorysoup')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablesoup()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorysoup')->with('msg', "The product you've selected is now unavailable");     
    }

    public function getsandwich()
    {
        $categ = 'Sandwich';
        $prod = new ProductModel();
        $data['prod'] = $prod->sandwich($categ);
        return view ('/inventory/sandwich', $data);
    }

    public function editsandwich($id)
    {
        $esand = new ProductModel();
        $data['esand'] = $esand->find($id);
        return view('/inventory/editsandwich', $data);
    }

    public function updatesandwich($id)
    {
        $sand = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
            'prod_img' => $this->request->getPost('prod_img'),
        ];
        $sand->update($id, $data);
        return redirect()->to(base_url('inventorysandwich'));
    }
    
    public function deletesandwich($id)
    {
        $sand = new ProductModel();
        $sand->delete($id);
        return redirect()->to(base_url('inventorysandwich'));
    }

    public function availabilitysandwich()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorysandwich')->with('msg', "The product you've selected is now available");     
    }

    public function Unavailablesandwich()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorysandwich')->with('msg', "The product you've selected is now unavailable");     
    }
}