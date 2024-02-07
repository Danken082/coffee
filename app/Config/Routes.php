<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'AdminController::login',['filter'=>'guestFilter']);
$routes->get('/register', 'AdminController::register', ['filter'=>'guestFilter']);
$routes->get('/adminhome', 'AdminController::home', ['filter'=>'authFilter']);
$routes->match(['get', 'post'],'/admindash','VisualizationController::initDayChart', ['filter'=>'authFilter']);
$routes->get('/admininventory', 'AdminController::inventory', ['filter'=>'authFilter']);
$routes->get('/adminorder', 'AdminController::order', ['filter'=>'authFilter']);
$routes->get('/adminhistory', 'AdminController::gethistory', ['filter'=>'authFilter']);
$routes->get('/adminmanage_user', 'AdminController::getmanageuser', ['filter'=>'authFilter']);
$routes->get('/adminmnguser', 'AdminController::mnguser', ['filter'=>'authFilter']);
$routes->post('/adminadduser', 'AdminController::adduser', ['filter'=>'authFilter']);
$routes->get('/adminedituser/(:any)', 'AdminController::edituser/$1');
$routes->post('/updateuser/(:any)', 'AdminController::updateuser/$1');
$routes->get('/deleteuser/(:any)', 'AdminController::deleteuser/$1');
$routes->post('/adminregister', 'UserController::register');
$routes->post('/loginAuth', 'UserController::login', ['filter'=>'guestFilter']);
$routes->get('logout', 'UserController::logout', ['filter'=>'authFilter']);
                    /* For Inventory */

/* For Hot Coffee */
$routes->get('/inventoryhotcoffee', 'InventoryController::gethotcoffee');
$routes->get('/hotcoffee', 'InventoryController::hotcoffee');
$routes->post('/addhotcoffee', 'InventoryController::addhotcoffee');
$routes->get('/edithot/(:any)', 'InventoryController::edithot/$1');
$routes->post('/updatehot/(:any)', 'InventoryController::updatehot/$1');
$routes->get('/deletehot/(:any)', 'InventoryController::deletehot/$1');
/* For Iced Coffee */
$routes->get('/inventoryicedcoffee', 'InventoryController::geticedcoffee');
$routes->get('/icedcoffee', 'InventoryController::icedcoffee');
$routes->post('/addiced', 'InventoryController::addicedcoffee');
$routes->get('/editiced/(:any)', 'InventoryController::editiced/$1');
$routes->post('/updateiced/(:any)', 'InventoryController::updateiced/$1');
$routes->get('/deleteiced/(:any)', 'InventoryController::deleteiced/$1');
/* For Flavored Coffee */
$routes->get('/inventoryflavoredcoffee', 'InventoryController::getflavoredcoffee');
$routes->get('/flavoredcoffee', 'InventoryController::flavoredcoffee');
$routes->post('/addflavored', 'InventoryController::addflavoredcoffee');
$routes->get('/editflavored/(:any)', 'InventoryController::editflavored/$1');
$routes->post('/updateflavored/(:any)', 'InventoryController::updateflavored/$1');
$routes->get('/deleteflavored/(:any)', 'InventoryController::deleteflavored/$1');
/* For Non Coffee Frappe */
$routes->get('/inventorynoncoffee', 'InventoryController::getnoncoffee');
$routes->get('/noncoffee', 'InventoryController::noncoffee');
$routes->post('/addnon', 'InventoryController::addnoncoffee');
$routes->get('/editnon/(:any)', 'InventoryController::editnoncoffee/$1');
$routes->post('/updatenon/(:any)', 'InventoryController::updatenoncoffee/$1');
$routes->get('/deletenon/(:any)', 'InventoryController::deletenoncoffee/$1');
/* For Coffee Frappe */
$routes->get('/inventorycoffeefrappe', 'InventoryController::getcoffeefrappe');
$routes->get('/coffeefrappe', 'InventoryController::coffeefrappe');
$routes->post('/addcoffeefrappe', 'InventoryController::addcoffeefrappe');
$routes->get('/editcoffeefrappe/(:any)', 'InventoryController::editcoffeefrappe/$1');
$routes->post('/updatecoffeefrappe/(:any)', 'InventoryController::updatecoffeefrappe/$1');
$routes->get('/deletecoffeefrappe/(:any)', 'InventoryController::deletecoffeefrappe/$1');
/* For Rice Meal */
$routes->get('/inventorymeal', 'InventoryController::getmeal');
$routes->get('/meals', 'InventoryController::meals');
$routes->post('/addmeals', 'InventoryController::addmeals');
$routes->get('/editmeal/(:any)', 'InventoryController::editmeal/$1');
$routes->post('/updatemeal/(:any)', 'InventoryController::updatemeal/$1');
$routes->get('/deletemeal/(:any)', 'InventoryController::deletemeal/$1');
/* For Pasta */
$routes->get('/inventorypasta', 'InventoryController::getpasta');
$routes->get('/pasta', 'InventoryController::pasta');
$routes->post('/addpasta', 'InventoryController::addpasta');
$routes->get('/editpasta/(:any)', 'InventoryController::editpasta/$1');
$routes->post('/updatepasta/(:any)', 'InventoryController::updatepasta/$1');
$routes->get('/deletepasta/(:any)', 'InventoryController::deletepasta/$1');
/* For Appetizer */
$routes->get('/inventoryappetizer', 'InventoryController::getappetizer');
$routes->get('/appetizer', 'InventoryController::appetizer');
$routes->post('/addappetizer', 'InventoryController::addappetizer');
$routes->get('/editappetizer/(:any)', 'InventoryController::editappetizer/$1');
$routes->post('/updateappetizer/(:any)', 'InventoryController::updateappetizer/$1');
$routes->get('/deleteappetizer/(:any)', 'InventoryController::deleteappetizer/$1');
/* For Salad */
$routes->get('/inventorysalad', 'InventoryController::getsalad');
$routes->get('/salad', 'InventoryController::salad');
$routes->post('/addsalad', 'InventoryController::addsalad');
$routes->get('/editsalad/(:any)', 'InventoryController::editsalad/$1');
$routes->post('/updatesalad/(:any)', 'InventoryController::updatesalad/$1');
$routes->get('/deletesalad/(:any)', 'InventoryController::deletesalad/$1');
/* For Soup */
$routes->get('/inventorysoup', 'InventoryController::getsoup');
$routes->get('/soup', 'InventoryController::soup');
$routes->post('/addsoup', 'InventoryController::addsoup');
$routes->get('/editsoup/(:any)', 'InventoryController::editsoup/$1');
$routes->post('/updatesoup/(:any)', 'InventoryController::updatesoup/$1');
$routes->get('/deletesoup/(:any)', 'InventoryController::deletesoup/$1');
/* For Others */
$routes->get('/inventoryother', 'InventoryController::getother');
$routes->get('/other', 'InventoryController::other');
$routes->post('/addother', 'InventoryController::addother');
$routes->get('/editother/(:any)', 'InventoryController::editother/$1');
$routes->post('/updateother/(:any)', 'InventoryController::updateother/$1');
$routes->get('/deleteother/(:any)', 'InventoryController::deleteother/$1');


/*For UserSide(Home/landing page keneme)*/ 
$routes->get('user/header', 'UserController::header');
$routes->get('user/home', 'UserController::home');
$routes->get('user/menu', 'UserController::home_menu');
$routes->get('user/services', 'UserController::home_services');
$routes->get('user/blog', 'UserController::home_blog');
$routes->get('user/about', 'UserController::home_about');
$routes->get('user/shop', 'UserController::home_shop');
$routes->get('user/contact', 'UserController::home_contact');
$routes->get('user/cart', 'UserController::home_cart');

/*For UserSide(Menu)*/ 