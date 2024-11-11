<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AdminController::login',['filter'=>'guestFilter']);
$routes->get('/GoogleloginAuth', 'AdminController::googleAuthLogin',['filter'=>'guestFilter']);
$routes->post('/adminregister', 'UserController::register');
$routes->post('/loginAuth', 'UserController::login', ['filter'=>'guestFilter']);
$routes->get('/logout', 'AdminController::logout', ['filter'=>'authFilter']);
//status
$routes->match(['get','post'], '/available/', 'ProductController::availability');
$routes->match(['get', 'post'], '/unavailable/', 'ProductController::Unavailable');

//para sa report
$routes->match(['get', 'post'], 'sendNotif', 'UserController::userNotification');

$routes->get('/register', 'AdminController::register', ['filter'=>'guestFilter']);

$routes->get('theorders/(:any)', 'AdminController::viewToAcceptorders/$1');
$routes->get('/orderhistory', 'AdminController::viewhistory');
$routes->get('/receipt', 'OrderController::coffeereceipt');

$routes->get('print-receipts', 'AdminController::printReceipt');

// $routes->get('pos', 'ChatController::try');

/*For UserSide*/ 
if(session()->get('UserRole') === 'Admin' || session()->get('UserRole') === 'Staff' )
{
//viewOrders
$routes->get('/viewOrderHistory/(:any)', 'AdminController::viewOrderHist/$1');
$routes->get('/editOrder/(:any)', 'AdminController::editOrder/$1');



$routes->get('adminorderpayment', 'AdminController::viewOrders');
$routes->get('/adminhome', 'AdminController::home', ['filter'=>'authFilter']);
$routes->match(['get', 'post'],'/admindash','VisualizationController::allChart', ['filter'=>'authFilter']);
$routes->match(['get', 'post'],'VisualizationController/thisAllChart', 'VisualizationController::thisAllChart');


//reports
$routes->match(['get', 'post'], 'reports', 'VisualizationController::salesReportPerDay');
$routes->match(['get', 'post'], 'reportspermonths/(:any)', 'VisualizationController::salesReportPerMonthInyear/$1');
$routes->match(['get', 'post'], 'reportsYear', 'VisualizationController::salesReportEveryYear');
//POS
$routes->get('/admininventory', 'AdminController::inventory', ['filter'=>'authFilter']);
$routes->get('/adminpayment', 'AdminController::orderpayment', ['filter'=>'authFilter']);
$routes->get('/adminhistory', 'AdminController::gethistory', ['filter'=>'authFilter']);
$routes->get('/filterDate', 'VisualizationController::getFilterhistory', ['filter'=>'authFilter']);

$routes->get('/adminprofile', 'AdminController::adminprofile',['filter'=>'authFilter']);
$routes->get('/adminmanage_user', 'AdminController::getmanageuser', ['filter'=>'authFilter']);
$routes->get('/adminmnguser', 'AdminController::mnguser', ['filter'=>'authFilter']);
$routes->post('/adminadduser', 'AdminController::adduser', ['filter'=>'authFilter']);
$routes->get('/admincustomer_user', 'AdminController::getcustomeruser', ['filter'=>'authFilter']);
$routes->get('/adminprod', 'AdminController::products', ['filter'=>'authFilter']);
$routes->get('/admineditprofile/(:any)', 'AdminController::edit_profile/$1');
$routes->post('/updateadminprofile/(:any)', 'AdminController::updateadminprofile/$1');
$routes->get('/removeprofile/(:any)', 'AdminController::removeadminprofile/$1',['filter'=>'authFilter']);
$routes->get('/deleteuser/(:any)', 'AdminController::deleteuser/$1');
$routes->get('admin/sidebar', 'AdminController::admin_side');
$routes->get('viewOrders', 'AdminController::viewOrder');
$routes->get('/adminpos', 'AdminController::pos');
$routes->get('addingTable', 'AdminController::viewAddTable');
$routes->post('AdminTable', 'AdminController::addingTable');
#forAcceptingOrde

$routes->post('AcceptthisOrder', 'AdminController::getPendingOrders');

#rawDataTotal
$routes->get('total', 'RawController::dataUpdating');

/* For Inventory */
/* Equipment */
$routes->get('/inventoryequip', 'InventoryController::equip');
$routes->get('/myitems', 'InventoryController::items');
$routes->post('/additems', 'InventoryController::additems');
$routes->get('/editequip/(:any)', 'InventoryController::editequip/$1');
$routes->post('/updateequip/(:any)', 'InventoryController::updateequip/$1');
$routes->get('/deleteequip/(:any)', 'InventoryController::deleteequip/$1');
/* Raw Materials */
$routes->get('/inventoryrawmats', 'InventoryController::rawmats');
$routes->get('/editraw/(:any)', 'InventoryController::editraw/$1');
$routes->post('/updateraw/(:any)', 'InventoryController::updateraw/$1');
$routes->get('/deleteraw/(:any)', 'InventoryController::deleteraw/$1');
/* Supplies */
$routes->get('/inventorysupply', 'InventoryController::supply');
$routes->get('/editsupply/(:any)', 'InventoryController::editsupply/$1');
$routes->post('/updatesupply/(:any)', 'InventoryController::updatesupply/$1');
$routes->get('/deletesupply/(:any)', 'InventoryController::deletesupply/$1');


/* For Hot Coffee */
$routes->get('/inventoryhotcoffee', 'InventoryController::gethotcoffee');
$routes->get('/myproducts', 'InventoryController::product');
$routes->post('/addproduct', 'InventoryController::addproduct');
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
$routes->get('/editflavored/(:any)', 'InventoryController::editflavored/$1');
$routes->post('/updateflavored/(:any)', 'InventoryController::updateflavored/$1');
$routes->get('/deleteflavored/(:any)', 'InventoryController::deleteflavored/$1');
$routes->match(['get','post'], '/availableflavored/', 'InventoryController::availabilityflavored');
$routes->match(['get', 'post'], '/unavailableflavored/', 'InventoryController::Unavailableflavored');
/* For Frappe Drinks*/
$routes->get('/inventoryfrappe', 'InventoryController::getfrappe');
$routes->get('/editfrap/(:any)', 'InventoryController::editfrappe/$1');
$routes->post('/updatefrap/(:any)', 'InventoryController::updatefrappe/$1');
$routes->get('/deletefrap/(:any)', 'InventoryController::deletefrappe/$1');
$routes->match(['get','post'], '/availablefrap/', 'InventoryController::availabilityfrappe');
$routes->match(['get', 'post'], '/unavailablefrap/', 'InventoryController::Unavailablefrappe');
/* For Lemonade */
$routes->get('/inventorylemonade', 'InventoryController::getlemonade');
$routes->get('/editlemonade/(:any)', 'InventoryController::editlemonade/$1');
$routes->post('/updatelemonade/(:any)', 'InventoryController::updatelemonade/$1');
$routes->get('/deletelemonade/(:any)', 'InventoryController::deletelemonade/$1');
$routes->match(['get','post'], '/availablelemonade/', 'InventoryController::availabilitylemonade');
$routes->match(['get', 'post'], '/unavailablelemonade/', 'InventoryController::Unavailablelemonade');
/* For Others */
$routes->get('/inventoryothers', 'InventoryController::getothers');
$routes->get('/editothers/(:any)', 'InventoryController::editothers/$1');
$routes->post('/updateothers/(:any)', 'InventoryController::updateothers/$1');
$routes->get('/deleteothers/(:any)', 'InventoryController::deleteothers/$1');
$routes->match(['get','post'], '/availableother/', 'InventoryController::availabilityothers');
$routes->match(['get', 'post'], '/unavailableother/', 'InventoryController::Unavailableothers');
/* For Appetizer */
$routes->get('/inventoryappetizer', 'InventoryController::getappetizer');
$routes->get('/editappetizer/(:any)', 'InventoryController::editappetizer/$1');
$routes->post('/updateappetizer/(:any)', 'InventoryController::updateappetizer/$1');
$routes->get('/deleteappetizer/(:any)', 'InventoryController::deleteappetizer/$1');
$routes->match(['get','post'], '/availableappetizer/', 'InventoryController::availabilityappetizer');
$routes->match(['get', 'post'], '/unavailableappetizer/', 'InventoryController::Unavailableappetizer');
/* For Breakfast Meal */
$routes->get('/inventorymeal', 'InventoryController::getmeal');
$routes->get('/editmeal/(:any)', 'InventoryController::editmeal/$1');
$routes->post('/updatemeal/(:any)', 'InventoryController::updatemeal/$1');
$routes->get('/deletemeal/(:any)', 'InventoryController::deletemeal/$1');
$routes->match(['get','post'], '/availablemeal/', 'InventoryController::availabilitymeal');
$routes->match(['get', 'post'], '/unavailablemeal/', 'InventoryController::Unavailablemeal');
/* For Chicken Tenders */
$routes->get('/inventorychicken', 'InventoryController::getchicken');
$routes->get('/editchicken/(:any)', 'InventoryController::editchicken/$1');
$routes->post('/updatechicken/(:any)', 'InventoryController::updatechicken/$1');
$routes->get('/deletechicken/(:any)', 'InventoryController::deletechicken/$1');
$routes->match(['get','post'], '/availablechicken/', 'InventoryController::availabilitychicken');
$routes->match(['get', 'post'], '/unavailablechicken/', 'InventoryController::Unavailablechicken');
/* For Chicken Fillet */
$routes->get('/inventorychickenfillet', 'InventoryController::getchickenfillet');
$routes->get('/editchickenfillet/(:any)', 'InventoryController::editchickenfillet/$1');
$routes->post('/updatechickenfillet/(:any)', 'InventoryController::updatechickenfillet/$1');
$routes->get('/deletechickenfillet/(:any)', 'InventoryController::deletechickenfillet/$1');
$routes->match(['get','post'], '/availablechickenfillet/', 'InventoryController::availabilitychickenfillet');
$routes->match(['get', 'post'], '/unavailablechickenfillet/', 'InventoryController::Unavailablechickenfillet');
/* For Pasta */
$routes->get('/inventorypasta', 'InventoryController::getpasta');
$routes->get('/editpasta/(:any)', 'InventoryController::editpasta/$1');
$routes->post('/updatepasta/(:any)', 'InventoryController::updatepasta/$1');
$routes->get('/deletepasta/(:any)', 'InventoryController::deletepasta/$1');
$routes->match(['get','post'], '/availablepasta/', 'InventoryController::availabilitypasta');
$routes->match(['get', 'post'], '/unavailablepasta/', 'InventoryController::Unavailablepasta');
/* For Salad */
$routes->get('/inventorysalad', 'InventoryController::getsalad');
$routes->get('/editsalad/(:any)', 'InventoryController::editsalad/$1');
$routes->post('/updatesalad/(:any)', 'InventoryController::updatesalad/$1');
$routes->get('/deletesalad/(:any)', 'InventoryController::deletesalad/$1');
$routes->match(['get','post'], '/availablesalad/', 'InventoryController::availabilitysalad');
$routes->match(['get', 'post'], '/unavailablesalad/', 'InventoryController::Unavailablesalad');
/* For Sub Sanwiches */
$routes->get('/inventorysandwich', 'InventoryController::getsandwich');
$routes->get('/editsandwich/(:any)', 'InventoryController::editsandwich/$1');
$routes->post('/updatesandwich/(:any)', 'InventoryController::updatesandwich/$1');
$routes->get('/deletesandwich/(:any)', 'InventoryController::deletesandwich/$1');
$routes->match(['get','post'], '/availablesand/', 'InventoryController::availabilitysandwich');
$routes->match(['get', 'post'], '/unavailablesand/', 'InventoryController::Unavailablesandwich');

// $routes->match(['get', 'post'], 'report', 'VisualizationController::pdfReport');



$routes->get('Notif', 'AdminController::Notification');

$routes->get('rawNotif/(:any)', 'AdminController::notificationRaw/$1');


//Report
$routes->get('Searchreport', 'AdminController::Searchreport');
$routes->get('filteredreport', 'AdminController::FiterReport');
$routes->get('exportReport/(:any)/(:any)', 'AdminController::exportReport/$1/$2');


//Reservation

$routes->get('viewuserReservation', 'AdminController::eventReservation');



$routes->match(['get', 'post'], 'ByWeek', 'VisualizationController::weekly');
$routes->post('viewReport', 'VisualizationController::viewReport');



$routes->match(['get', 'post'], 'ViewMonthlyReport', 'VisualizationController::costAndExpense');
$routes->match(['get', 'post'], 'viewReportMonthly', 'VisualizationController::viewReportMonthly');
$routes->match(['get', 'post'], 'salesReportPerMonth', 'VisualizationController::salesReportPerMonth');

$routes->get('/previewReport/(:any)/(:any)', 'AdminController::previewReport/$1/$2');

}

$routes->match(['get', 'post'], 'GoToPayment', 'OrderController::paymentOrder');


$routes->get('hello', 'OrderController::hello');

// $routes->get('hello', 'AdminController::Deduction');
$routes->get('stocks', 'StocksController::Stocks');
$routes->get('/', 'UserController::home', ['filter' => 'guestFilter']);
$routes->get('/mainhome', 'UserController::mainhome',['filter'=>'cusFilter']);
$routes->get('/profile', 'UserController::profile',['filter'=>'cusFilter']);
$routes->get('/edituserprofile/(:any)', 'UserController::edit_profile/$1',['filter'=>'cusFilter']);
$routes->post('/updateprofile/(:any)', 'UserController::updateprofile/$1',['filter'=>'cusFilter']);
$routes->get('/removeprofile/(:any)', 'UserController::removeProfilePicture/$1',['filter'=>'cusFilter']);
$routes->get('/menu', 'UserController::home_menu', ['filter' => 'guestFilter']);
$routes->get('/mainmenu', 'UserController::home_mainmenu',['filter'=>'cusFilter']);
$routes->get('/services', 'UserController::home_services', ['filter' => 'guestFilter']);
$routes->get('/mainservices', 'UserController::home_mainservices',['filter'=>'cusFilter']);
$routes->get('/about', 'UserController::home_about', ['filter' => 'guestFilter']);
$routes->get('/mainabout', 'UserController::home_mainabout',['filter'=>'cusFilter']);
$routes->get('/shop', 'UserController::home_shop', ['filter' => 'guestFilter']);
$routes->get('/mainshop', 'UserController::home_mainshop',['filter'=>'cusFilter']);
$routes->get('/contact', 'UserController::home_contact', ['filter' => 'guestFilter']);
$routes->get('/maincontact', 'UserController::home_maincontact',['filter'=>'cusFilter']);
$routes->get('/cart', 'CartController::home_cart');
$routes->post('user/checkouts/', 'OrderController::placeToOrder');
$routes->post('OrderOnline', 'OrderController::OrderOnlinePayment');
$routes->get('OrderMeal/(:any)', 'OrderController::myOrdersmeal/$1');
$routes->get('OrderDrink/(:any)', 'OrderController::myOrdersdrink/$1');
#for feedback
$routes->post('getProdUser', 'OrderController::getProdUser');
$routes->get('feedback', 'OrderController::inputFeedback');
$routes->post('confirmfeedback', 'OrderController::feedBack');
#second part of user side 
$routes->get('userCheckOut', 'CartController::GotoCheckOut');


$routes->match(['get', 'post'], 'GoToProducts', 'ReservationController::getResevartion');



/*add to cart*/
$routes->match(['get', 'post'],'/addtocart/(:any)', 'CartController::addtocart/$1');
$routes->match(['get','post'], '/viewProd1/(:any)', 'CartController::getmeal/$1');
$routes->match(['get','post'], '/viewProd2/(:any)', 'CartController::getdrink/$1');
$routes->get('/removetocart/(:any)', 'CartController::remove/$1',['filter'=>'cusFilter']);
$routes->match(['get', 'post'],'CartController/placeOrder', 'CartController::placeOrder',['filter'=>'cusFilter']);
$routes->match(['get', 'post'], '/aOrder/', 'AdminController::acceptOrder');
$routes->match(['get', 'post'], 'reservation', 'ReservationController::reservation');
$routes->post('addQuantity/(:any)', 'CartController::addquantity/$1');
$routes->get('trycount', 'CartController::countOnCart');




//viewing of orders
$routes->get('myOrders', 'OrderController::viewOrders',['filter'=>'cusFilter']);

$routes->get('report', 'AdminController::report');

$routes->post('/save-order', 'OrderController::saveOrder');


//para sa receipt


$routes->post('/payment/save', 'AdminController::savePOSOrders');
$routes->get('trialh', 'AdminController::trialh');

$routes->match(['get', 'post'], 'viewByFeedback/(:any)', 'OrderController::viewFeedbackForCoffee/$1');


$routes->get('print-receipt', 'CartController::printReceipt');
$routes->get('list-printers', 'CartController::listPrinters');


$routes->match(['get', 'post'], 'trialpayment', 'AdminController::PaymentMethod');
$routes->post('trialForexpense', 'VisualizationController::InsertExpenses');



//For Reservation
$routes->match(['get', 'post'], 'previewReservation', 'ReservationController::previewReservation');
$routes->post('/saveReservation', 'AdminController::saveReservation');
$routes->post('getResevartionData', 'ReservationController::getResevartionData');
$routes->match(['get', 'post'], 'getData', 'ReservationController::paymentView', ['filter'=>'cusFilter']);
$routes->match(['get', 'post'], 'saveData', 'ReservationController::saveData', ['filter'=>'cusFilter']);
// $routes


$routes->get('sampleNotif', 'ChatController::sampleNotif');
$routes->get('viewReservation/(:any)', 'ReservationController::getReservationData/$1');
$routes->match(['get', 'post'], 'AcceptReservation', 'ReservationController::AcceptReservation');


$routes->get('flavor', 'AdminController::flvr');
$routes->get('myReservation', 'ReservationController::viewMyReservation');
$routes->get('reports', 'AdminController::listReports');

$routes->match(['get', 'post'], 'verify/(:any)', 'UserController::verify/$1');


$routes->get('trialnotif2', 'AdminController::mynotiftrial');
$routes->post('sendmynotif', 'AdminController::sendNotif');
$routes->post('forgetpasswordAuth', 'UserController::forgetPassword');
$routes->get('forgetpassword', 'UserController::viewForgetPassword');
$routes->post('sendAuthCode', 'UserController::updateCode');
$routes->get('verifyCode', 'UserController::verifyCode');
$routes->post('verifyCodeAuth', 'UserController::verificationAuth');
$routes->post('newPass', 'UserController::newPassword');
$routes->match(['get', 'post'], '/cancelreservation/(:any)', 'ReservationController::cancelReservation/$1', ['filter'=>'cusFilter']);

$routes->get('/samplehi', 'AdminController::hello');

