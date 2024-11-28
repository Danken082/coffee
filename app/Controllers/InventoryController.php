<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ItemsModel;

class InventoryController extends BaseController
{   
    private $prod;
    private $item;

    public function __construct(){
        $this->prod = new ProductModel();
        $this->item = new ItemsModel();
    }

    public function product(){
        return view('/inventory/addproduct');
    }

    public function addproduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['prod_categ'])) {
                echo "<script>alert('Please select a category first.')</script>";
                echo "<script>window.history.back()</script>";
                exit();
            }

            if (!isset($_FILES['prod_img']) || $_FILES['prod_img']['error'] !== UPLOAD_ERR_OK) {
                echo "<script>alert('You need to select a picture first.')</script>";
                echo "<script>window.history.back()</script>";
                exit();
            }

            $prod = new ProductModel();
            
            $addProduct = substr(md5(rand()), 0, 8);
        
            $uploadDir = 'assets/images/products/';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
        
            $fileName = $_FILES['prod_img']['name'];
        
            $uploadFile = $uploadDir . $fileName;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile))
            {
                $data = [
                    'prod_name' => $_POST['prod_name'],
                    'prod_desc' => $_POST['prod_desc'],
                    'prod_quantity' => $_POST['prod_quantity'],
                    'prod_mprice' => $_POST['prod_mprice'],
                    'prod_lprice' => $_POST['prod_lprice'],
                    'prod_categ' => $_POST['prod_categ'],
                    'prod_code' => $addProduct,
                    'prod_img' => $fileName,
                    'product_status' => 'Available'
                ];
                $prod->save($data);
        
                echo "<script>alert('Product added successfully.')</script>";
                echo "<script>window.location.href='" . base_url('/myproducts') . "'</script>";
                exit();
            } else {
                echo "<script>alert('Error uploading file.')</script>";
                echo "<script>window.history.back()</script>";
                exit();
            }
        }
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
        $productData = $hot->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $hot->update($id, $postData);
        return redirect()->to(base_url('inventoryhotcoffee'));
    }

    public function deletehot($id)
    {
        $hot = new ProductModel();
        $product = $hot->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $hot->delete($id);
        return redirect()->to(base_url('inventoryhotcoffee'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityhot()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryhotcoffee')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablehot()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryhotcoffee')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $iced->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $iced->update($id, $postData);
        return redirect()->to(base_url('inventoryicedcoffee'));
    }
    
    public function deleteiced($id)
    {
        $iced = new ProductModel();
        $product = $iced->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $iced->delete($id);
        return redirect()->to(base_url('inventoryicedcoffee'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityiced()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryicedcoffee')->with('msg', "The product you selected is now available");     
    }

    public function Unavailableiced()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryicedcoffee')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $flav->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $flav->update($id, $postData);
        return redirect()->to(base_url('inventoryflavoredcoffee'));
    }
    
    public function deleteflavored($id)
    {
        $flav = new ProductModel();
        $product = $flav->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $flav->delete($id);
        return redirect()->to(base_url('inventoryflavoredcoffee'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityflavored()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryflavoredcoffee')->with('msg', "The product you selected is now available");     
    }

    public function Unavailableflavored()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryflavoredcoffee')->with('msg', "The product you selected is now unavailable");     
    }

    public function getfrappe()
    {
        $categ = 'Frappe';
        $prod = new ProductModel();
        $data['prod'] = $prod->frappe($categ);
        return view ('/inventory/frappe', $data);
    }

    public function editfrappe($id)
    {
        $efrap = new ProductModel();
        $data['efrap'] = $efrap->find($id);
        return view('/inventory/editfrappe', $data);
    }

    public function updatefrappe($id)
    {
        $frap = new ProductModel();
        $productData = $frap->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $frap->update($id, $postData);
        return redirect()->to(base_url('inventoryfrappe'));
    }
    
    public function deletefrappe($id)
    {
        $frap = new ProductModel();
        $product = $frap->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $frap->delete($id);
        return redirect()->to(base_url('inventoryfrappe'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityfrappe()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryfrappe')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablefrappe()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryfrappe')->with('msg', "The product you selected is now unavailable");     
    }

    public function getlemonade()
    {
        $categ = 'Lemonade';
        $prod = new ProductModel();
        $data['prod'] = $prod->lemonade($categ);
        return view ('/inventory/lemonade', $data);
    }

    public function editlemonade($id)
    {
        $elemon = new ProductModel();
        $data['elemon'] = $elemon->find($id);
        return view('/inventory/editlemonade', $data);
    }

    public function updatelemonade($id)
    {
        $lemon = new ProductModel();
        $productData = $lemon->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $lemon->update($id, $postData);
        return redirect()->to(base_url('inventorylemonade'));
    }
    
    public function deletelemonade($id)
    {
        $lemon = new ProductModel();
        $product = $lemon->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $lemon->delete($id);
        return redirect()->to(base_url('inventorylemonade'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitylemonade()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorylemonade')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablelemonade()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorylemonade')->with('msg', "The product you selected is now unavailable");     
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
        $data['eothers'] = $eother->find($id);
        return view('/inventory/editothers', $data);
    }

    public function updateothers($id)
    {
        $other = new ProductModel();
        $productData = $other->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
            'prod_lprice' => $this->request->getPost('prod_lprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $other->update($id, $postData);
        return redirect()->to(base_url('inventoryothers'));
    }
    
    public function deleteothers($id)
    {
        $other = new ProductModel();
        $product = $other->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $other->delete($id);
        return redirect()->to(base_url('inventoryothers'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityothers()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryothers')->with('msg', "The product you selected is now available");     
    }

    public function Unavailableothers()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryothers')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $meal->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $meal->update($id, $postData);
        return redirect()->to(base_url('inventorymeal'));
    }
    
    public function deletemeal($id)
    {
        $meal = new ProductModel();
        $product = $meal->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $meal->delete($id);
        return redirect()->to(base_url('inventorymeal'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitymeal()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorymeal')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablemeal()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorymeal')->with('msg', "The product you selected is now unavailable");     
    }

    public function getchicken()
    {
        $categ = 'Chicken';
        $prod = new ProductModel();
        $data['prod'] = $prod->chicken($categ);
        return view ('/inventory/chicken', $data);
    }

    public function editchicken($id)
    {
        $echick = new ProductModel();
        $data['echick'] = $echick->find($id);
        return view('/inventory/editchicken', $data);
    }

    public function updatechicken($id)
    {
        $chick = new ProductModel();
        $productData = $chick->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $chick->update($id, $postData);
        return redirect()->to(base_url('inventorychicken'));
    }
    
    public function deletechicken($id)
    {
        $chick = new ProductModel();
        $product = $chick->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $chick->delete($id);
        return redirect()->to(base_url('inventorychicken'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitychicken()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorychicken')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablechicken()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorychicken')->with('msg', "The product you selected is now unavailable");     
    }

    public function getchickenfillet()
    {
        $categ = 'Chicken Fillet';
        $prod = new ProductModel();
        $data['prod'] = $prod->chicken($categ);
        return view ('/inventory/chickenfillet', $data);
    }

    public function editchickenfillet($id)
    {
        $echickfill = new ProductModel();
        $data['echickfill'] = $echickfill->find($id);
        return view('/inventory/editchickenfillet', $data);
    }

    public function updatechickenfillet($id)
    {
        $chickfill = new ProductModel();
        $productData = $chickfill->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $chickfill->update($id, $postData);
        return redirect()->to(base_url('inventorychickenfillet'));
    }
    
    public function deletechickenfillet($id)
    {
        $chickfill = new ProductModel();
        $product = $chickfill->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $chickfill->delete($id);
        return redirect()->to(base_url('inventorychickenfillet'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitychickenfillet()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorychickenfillet')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablechickenfillet()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorychickenfillet')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $pasta->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $pasta->update($id, $postData);
        return redirect()->to(base_url('inventorypasta'));
    }
    
    public function deletepasta($id)
    {
        $pasta = new ProductModel();
        $product = $pasta->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $pasta->delete($id);
        return redirect()->to(base_url('inventorypasta'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitypasta()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorypasta')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablepasta()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorypasta')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $app->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $app->update($id, $postData);
        return redirect()->to(base_url('inventoryappetizer'));
    }
    
    public function deleteappetizer($id)
    {
        $app = new ProductModel();
        $product = $app->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $app->delete($id);
        return redirect()->to(base_url('inventoryapp'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilityappetizer()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventoryappetizer')->with('msg', "The product you selected is now available");     
    }

    public function Unavailableappetizer()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventoryappetizer')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $salad->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $salad->update($id, $postData);
        return redirect()->to(base_url('inventorysalad'));
    }
    
    public function deletesalad($id)
    {
        $salad = new ProductModel();
        $product = $salad->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $salad->delete($id);
        return redirect()->to(base_url('inventorysalad'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitysalad()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorysalad')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablesalad()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorysalad')->with('msg', "The product you selected is now unavailable");     
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
        $productData = $sand->find($id);

        $postData = [
            'prod_name' => $this->request->getPost('prod_name'),
            'prod_desc' => $this->request->getPost('prod_desc'),
            'prod_quantity' => $this->request->getPost('prod_quantity'),
            'prod_mprice' => $this->request->getPost('prod_mprice'),
        ];

        if (!empty($_FILES['prod_img']['name'])) {
            $filename = $_FILES['prod_img']['name'];
            $uploadDir = 'assets/images/products/';
            $uploadFile = $uploadDir . $filename;
            if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadFile)) {
                $postData['prod_img'] = $filename;

                if (!empty($productData['prod_img'])) {
                    $previousImage = $uploadDir . $productData['prod_img'];
                    if (file_exists($previousImage)) {
                        unlink($previousImage);
                    }
                }
            } else {
                echo 'Error uploading file.';
            }
        }
        $sand->update($id, $postData);
        return redirect()->to(base_url('inventorysandwich'));
    }
    
    public function deletesandwich($id)
    {
        $sand = new ProductModel();
        $product = $sand->find($id);
        
        if (!empty($product['prod_img'])) {
            $imagePath = 'assets/images/products/' . $product['prod_img'];
        
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $sand->delete($id);
        return redirect()->to(base_url('inventorysandwich'))->with('msg', "The product you selected has been deleted");
    }

    public function availabilitysandwich()
    {
        $update = $this->request->getVar('update');
        $updateAvailability = $this->myProduct($update);
                              $this->updateProd($updateAvailability, $update);

        return redirect()->to('inventorysandwich')->with('msg', "The product you selected is now available");     
    }

    public function Unavailablesandwich()
    {
        $unavailable = $this->request->getVar('update');

        $updateUnavailability = $this->UnavailableProduct($unavailable);
                                $this->updateAvailable($updateUnavailability);
                               
    return redirect()->to('inventorysandwich')->with('msg', "The product you selected is now unavailable");     
    }
    
    public function additems()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['item_categ'])) {
                echo "<script>alert('Please select a category first for the item.')</script>";
                echo "<script>window.history.back()</script>";
                exit();
            }

            $item = new ItemsModel();
        
            $addItems = substr(md5(rand()), 0, 8);
        
            $data = [
                'name' => $_POST['name'],
                'stocks' => $_POST['stocks'],
                'item_categ' => $_POST['item_categ'],
                'barcode' => $addItems
            ];
            $item->save($data);
        
            echo "<script>alert('Item added successfully.')</script>";
            echo "<script>window.location.href='" . base_url('/myitems') . "'</script>";
            exit();
        }
    }


    public function equip()
    {
        $categ = 'Equipment';
        $item = new ItemsModel();
        $data['item'] = $item->equipments($categ);
        return view ('/inventory/equipments', $data);
    }

    public function editequip($id)
    {
        $equip = new ItemsModel();
        $data['equip'] = $equip->find($id);
        return view('/inventory/editequip', $data);
    }

    public function updateequip($id)
    {
        $item = new ItemsModel();
        $data = $item->find($id);

        $updatedData = [
            'name' => $this->request->getPost('name'),
            'stocks' => $this->request->getPost('stocks'),
        ];

        $item->update($id, $updatedData);

        return redirect()->to(base_url('inventoryequip'));
    }

    public function deleteequip($id)
    {
        $item = new ItemsModel();
        $item->delete($id);
        return redirect()->to(base_url('inventoryequip'))->with('msg', "The equipment you selected has been deleted");
    }

    public function rawmats()
    {
        $categ = 'Raw Materials';
        $item = new ItemsModel();
        $data['item'] = $item->orderBy('item_categ', 'ASC')->orderBy('name', 'ASC')->findAll();
        return view ('/inventory/rawmaterials', $data);
    }

    public function editraw($id)
    {
        $eraw = new ItemsModel();
        $data['raw'] = $eraw->find($id);
        return view('/inventory/editrawmats', $data);
    }

    public function updateraw($id)
    {
        $item = new ItemsModel();
        $raw = $item->where('rawID', $id)->first();
        $stockchange = $raw['stocks'] + $this->request->getVar('stocks');
        $updatedData = [
            'name' => $this->request->getPost('name'),
            'stocks' =>  $stockchange,

        ];

        $item->update($id, $updatedData);

        return redirect()->to(base_url('inventoryrawmats'));

        // var_dump($updatedData);
    }

    public function deleteraw($id)
    {
        $item = new ItemsModel();
        $item->delete($id);
        return redirect()->to(base_url('inventoryrawmaterials'))->with('msg', "The materials you selected has been deleted");
    }

    public function supply()
    {
        $categ = 'Supplies';
        $item = new ItemsModel();
        $data['item'] = $item->rawmats($categ);
        return view ('/inventory/supplies', $data);
    }

    public function editsupply($id)
    {
        $esupply = new ItemsModel();
        $data['supply'] = $esupply->find($id);
        return view('/inventory/editsupply', $data);
    }
    
    public function updatesupply($id)
    {
        $item = new ItemsModel();
        $data = $item->find($id);

        $updatedData = [
            'name' => $this->request->getPost('name'),
            'stocks' => $this->request->getPost('stocks'),
        ];

        $item->update($id, $updatedData);

        return redirect()->to(base_url('inventorysupply'));
    }

    public function deletesupply($id)
    {
        $item = new ItemsModel();
        $item->delete($id);
        return redirect()->to(base_url('inventorysupplies'))->with('msg', "The supply you selected has been deleted");
    }

    public function items(){
        return view('/inventory/additems');
    }

    public function adminitems(){
        return view('admin/items');
    }


}