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
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_categ' => $this->request->getPost('prod_categ'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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

    public function meals(){
        return view('/inventory/addmeals');
    }

    public function addmeals()
    {
        $prod = new ProductModel();
        $data = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_categ' => $this->request->getPost('prod_categ'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_code' => $this->request->getPost('prod_code'),
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
}