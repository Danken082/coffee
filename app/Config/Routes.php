<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dailysales', 'VisualizationController::dailySales');
$routes->get('/monthlysales', 'VisualizationController::initMonthChart');
$routes->get('/yearsales', 'VisualizationController::initYearChart');
$routes->get('/login', 'AdminController::login',['filter'=>'guestFilter']);
$routes->get('/register', 'AdminController::register', ['filter'=>'guestFilter']);
$routes->get('/adminhome', 'AdminController::home', ['filter'=>'authFilter']);
$routes->match(['get', 'post'],'/admindash','VisualizationController::allChart', ['filter'=>'authFilter']);
$routes->get('/admininventory', 'AdminController::inventory', ['filter'=>'authFilter']);
$routes->get('/adminorder', 'AdminController::order', ['filter'=>'authFilter']);
$routes->get( '/adminorderpayment', 'AdminController::orderpayment', ['filter'=>'authFilter']);
$routes->get('/adminhistory', 'AdminController::gethistory', ['filter'=>'authFilter']);
$routes->get('/adminmanage_user', 'AdminController::getmanageuser', ['filter'=>'authFilter']);
$routes->get('/adminmnguser', 'AdminController::mnguser', ['filter'=>'authFilter']);
$routes->post('/adminadduser', 'AdminController::adduser', ['filter'=>'authFilter']);
$routes->get('/admincustomer_user', 'AdminController::getcustomeruser', ['filter'=>'authFilter']);
$routes->get('/adminequip', 'AdminController::equip', ['filter'=>'authFilter']);
$routes->get('/adminprod', 'AdminController::products', ['filter'=>'authFilter']);
$routes->get('/adminedituser/(:any)', 'AdminController::edituser/$1');
$routes->post('/updateuser/(:any)', 'AdminController::updateuser/$1');
$routes->get('/deleteuser/(:any)', 'AdminController::deleteuser/$1');
$routes->post('/adminregister', 'UserController::register');
$routes->post('/loginAuth', 'UserController::login', ['filter'=>'guestFilter']);
$routes->get('/logout', 'UserController::logout', ['filter'=>'authFilter']);
$routes->get('viewOrders', 'AdminController::viewOrder');
$routes->get('admin/sidebar', 'AdminController::admin_side');
$routes->get('/adminpos', 'AdminController::pos');
$routes->get('addingTable', 'AdminController::viewAddTable');
$routes->post('AdminTable', 'AdminController::addingTable');
#rawDataTotal
$routes->get('total', 'RawController::dataUpdating');
/* For Inventory */
/* For Hot Coffee */
$routes->get('/inventoryhotcoffee', 'InventoryController::gethotcoffee');
$routes->get('/myproducts', 'InventoryController::drinks');
$routes->post('/adddrinks', 'InventoryController::adddrink');
$routes->get('/edithot/(:any)', 'InventoryController::edithot/$1');
$routes->post('/updatehot/(:any)', 'InventoryController::updatehot/$1');
$routes->get('/deletehot/(:any)', 'InventoryController::deletehot/$1');
$routes->match(['get','post'], '/availablehot/', 'InventoryController::availabilityhot');
$routes->match(['get', 'post'], '/unavailablehot/', 'InventoryController::Unavailablehot');
/* For Iced Coffee */
$routes->get('/inventoryicedcoffee', 'InventoryController::geticedcoffee');
$routes->get('/editiced/(:any)', 'InventoryController::editiced/$1');
$routes->post('/updateiced/(:any)', 'InventoryController::updateiced/$1');
$routes->get('/deleteiced/(:any)', 'InventoryController::deleteiced/$1');
$routes->match(['get','post'], '/availableiced/', 'InventoryController::availabilityiced');
$routes->match(['get', 'post'], '/unavailableiced/', 'InventoryController::Unavailableiced');
/* For Flavored Coffee */
$routes->get('/inventoryflavoredcoffee', 'InventoryController::getflavoredcoffee');
$routes->get('/editflavored/(:any)', 'InxventoryController::editflavored/$1');
$routes->post('/updateflavored/(:any)', 'InventoryController::updateflavored/$1');
$routes->get('/deleteflavored/(:any)', 'InventoryController::deleteflavored/$1');
$routes->match(['get','post'], '/availableflavored/', 'InventoryController::availabilityflavored');
$routes->match(['get', 'post'], '/unavailableflavored/', 'InventoryController::Unavailableflavored');
/* For Non Coffee Frappe */
$routes->get('/inventorynoncoffee', 'InventoryController::getnoncoffee');
$routes->get('/editnon/(:any)', 'InventoryController::editnoncoffee/$1');
$routes->post('/updatenon/(:any)', 'InventoryController::updatenoncoffee/$1');
$routes->get('/deletenon/(:any)', 'InventoryController::deletenoncoffee/$1');
$routes->match(['get','post'], '/availablenoncoffee/', 'InventoryController::availabilitynoncoffee');
$routes->match(['get', 'post'], '/unavailablenoncoffee/', 'InventoryController::Unavailablenoncoffee');
/* For Coffee Frappe */
$routes->get('/inventorycoffeefrappe', 'InventoryController::getcoffeefrappe');
$routes->get('/editcoffeefrappe/(:any)', 'InventoryController::editcoffeefrappe/$1');
$routes->post('/updatecoffeefrappe/(:any)', 'InventoryController::updatecoffeefrappe/$1');
$routes->get('/deletecoffeefrappe/(:any)', 'InventoryController::deletecoffeefrappe/$1');
$routes->match(['get','post'], '/availablecoffeefrappe/', 'InventoryController::availabilitycoffeefrappe');
$routes->match(['get', 'post'], '/unavailablecoffeefrappe/', 'InventoryController::Unavailablecoffeefrappe');
/* For Others */
$routes->get('/inventoryothers', 'InventoryController::getothers');
$routes->get('/editothers/(:any)', 'InventoryController::editothers/$1');
$routes->post('/updateothers/(:any)', 'InventoryController::updateothers/$1');
$routes->get('/deleteothers/(:any)', 'InventoryController::deleteothers/$1');
$routes->match(['get','post'], '/availableother/', 'InventoryController::availabilityothers');
$routes->match(['get', 'post'], '/unavailableother/', 'InventoryController::Unavailableothers');
/* For Rice Meal */
$routes->get('/inventorymeal', 'InventoryController::getmeal');
$routes->get('/meals', 'InventoryController::meals');
$routes->post('/addmeals', 'InventoryController::addmeals');
$routes->get('/editmeal/(:any)', 'InventoryController::editmeal/$1');
$routes->post('/updatemeal/(:any)', 'InventoryController::updatemeal/$1');
$routes->get('/deletemeal/(:any)', 'InventoryController::deletemeal/$1');
$routes->match(['get','post'], '/availablemeal/', 'InventoryController::availabilitymeal');
$routes->match(['get', 'post'], '/unavailablemeal/', 'InventoryController::Unavailablemeal');
/* For Pasta */
$routes->get('/inventorypasta', 'InventoryController::getpasta');
$routes->get('/editpasta/(:any)', 'InventoryController::editpasta/$1');
$routes->post('/updatepasta/(:any)', 'InventoryController::updatepasta/$1');
$routes->get('/deletepasta/(:any)', 'InventoryController::deletepasta/$1');
$routes->match(['get','post'], '/availablepasta/', 'InventoryController::availabilitypasta');
$routes->match(['get', 'post'], '/unavailablepasta/', 'InventoryController::Unavailablepasta');
/* For Appetizer */
$routes->get('/inventoryappetizer', 'InventoryController::getappetizer');
$routes->get('/editappetizer/(:any)', 'InventoryController::editappetizer/$1');
$routes->post('/updateappetizer/(:any)', 'InventoryController::updateappetizer/$1');
$routes->get('/deleteappetizer/(:any)', 'InventoryController::deleteappetizer/$1');
$routes->match(['get','post'], '/availableappetizer/', 'InventoryController::availabilityappetizer');
$routes->match(['get', 'post'], '/unavailableappetizer/', 'InventoryController::Unavailableappetizer');
/* For Salad */
$routes->get('/inventorysalad', 'InventoryController::getsalad');
$routes->get('/editsalad/(:any)', 'InventoryController::editsalad/$1');
$routes->post('/updatesalad/(:any)', 'InventoryController::updatesalad/$1');
$routes->get('/deletesalad/(:any)', 'InventoryController::deletesalad/$1');
$routes->match(['get','post'], '/availablesalad/', 'InventoryController::availabilitysalad');
$routes->match(['get', 'post'], '/unavailablesalad/', 'InventoryController::Unavailablesalad');
/* For Soup */
$routes->get('/inventorysoup', 'InventoryController::getsoup');
$routes->get('/editsoup/(:any)', 'InventoryController::editsoup/$1');
$routes->post('/updatesoup/(:any)', 'InventoryController::updatesoup/$1');
$routes->get('/deletesoup/(:any)', 'InventoryController::deletesoup/$1');
$routes->match(['get','post'], '/availablesoup/', 'InventoryController::availabilitysoup');
$routes->match(['get', 'post'], '/unavailablesoup/', 'InventoryController::Unavailablesoup');
/* For Sanwiches */
$routes->get('/inventorysandwich', 'InventoryController::getsandwich');
$routes->get('/editsandwich/(:any)', 'InventoryController::editsandwich/$1');
$routes->post('/updatesandwich/(:any)', 'InventoryController::updatesandwich/$1');
$routes->get('/deletesandwich/(:any)', 'InventoryController::deletesandwich/$1');
$routes->match(['get','post'], '/availablesand/', 'InventoryController::availabilitysandwich');
$routes->match(['get', 'post'], '/unavailablesand/', 'InventoryController::Unavailablesandwich');


/*For UserSide*/ 
$routes->get('/', 'UserController::home');
$routes->get('/mainhome', 'UserController::mainhome',['filter'=>'cusFilter']);
$routes->get('/profile', 'UserController::profile',['filter'=>'cusFilter']);
$routes->get('/editprofile/(:any)', 'UserController::edit_profile/$1',['filter'=>'cusFilter']);
$routes->post('/updateprofile/(:any)', 'UserController::updateprofile/$1',['filter'=>'cusFilter']);
$routes->get('/removeprofile/(:any)', 'UserController::removeProfilePicture/$1',['filter'=>'cusFilter']);
$routes->get('/menu', 'UserController::home_menu');
$routes->get('/mainmenu', 'UserController::home_mainmenu',['filter'=>'cusFilter']);
$routes->get('/services', 'UserController::home_services');
$routes->get('/mainservices', 'UserController::home_mainservices',['filter'=>'cusFilter']);
$routes->get('/about', 'UserController::home_about');
$routes->get('/mainabout', 'UserController::home_mainabout',['filter'=>'cusFilter']);
$routes->get('/shop', 'UserController::home_shop');
$routes->get('/mainshop', 'UserController::home_mainshop',['filter'=>'cusFilter']);
$routes->get('/contact', 'UserController::home_contact');
$routes->get('/maincontact', 'UserController::home_maincontact',['filter'=>'cusFilter']);
$routes->get('/cart', 'CartController::home_cart');
$routes->get('/checkout', 'UserController::home_checkout',['filter'=>'cusFilter']);
$routes->post('user/checkouts/', 'OrderController::placeToOrder');
$routes->get('OrderMeal/(:any)', 'OrderController::myOrdersmeal/$1');
$routes->get('OrderDrink/(:any)', 'OrderController::myOrdersdrink/$1');
#second part of user side
$routes->get('userCheckOut', 'CartController::GotoCheckOut');

/*add to cart*/
$routes->match(['get', 'post'],'/addtocart/(:any)', 'CartController::addtocart/$1');
$routes->match(['get','post'], '/viewProd1/(:any)', 'CartController::getmeal/$1');
$routes->match(['get','post'], '/viewProd2/(:any)', 'CartController::getdrink/$1');
$routes->get('/removetocart/(:any)', 'CartController::remove/$1',['filter'=>'cusFilter']);
$routes->match(['get', 'post'],'CartController/placeOrder', 'CartController::placeOrder',['filter'=>'cusFilter']);
$routes->match(['get', 'post'], '/aOrder/', 'AdminController::acceptOrder');
$routes->match(['get', 'post'], 'reservation', 'ReservationController::reservation');
$routes->post('addQuantity/(:any)', 'CartController::addquantity/$1');


//status
$routes->match(['get','post'], '/available/', 'ProductController::availability');
$routes->match(['get', 'post'], '/unavailable/', 'ProductController::Unavailable');
// $routes->get('pos', 'ChatController::try');


//viewing of orders
$routes->get('myOrders', 'OrderController::viewOrders');