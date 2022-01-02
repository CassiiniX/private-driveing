<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'HomeController::index');
$routes->post('/contact-us','HomeController::contactUs');
$routes->get('/logout','AuthController::logout');

$routes->group("",["filter" => "not-auth"],function($routes){
	$routes->get('/signin','HomeController::signin');
	$routes->get('/signup','HomeController::signup');
	$routes->post('/signup','AuthController::signup');
	$routes->post('/signin','AuthController::signin');
});

$routes->group("admin",['filter' => 'admin-auth','namespace' => 'App\Controllers\Admin'],function($routes){
	$routes->get("/",'HomeController::index');

	$routes->get("articel","ArticelController::index");
	$routes->get("articel/delete/(:num)","ArticelController::delete/$1");
	$routes->post("articel/add","ArticelController::add");
	$routes->post("articel/edit/(:num)","ArticelController::edit/$1");

	$routes->get("galery","GaleryController::index");
	$routes->get("galery/delete/(:num)","GaleryController::delete/$1");
	$routes->post("galery/add","GaleryController::add");

	$routes->get("contact","ContactController::index");
	$routes->get("contact/delete/(:num)","ContactController::delete/$1");

	$routes->get("setting","SettingController::index");
	$routes->post("setting/edit","SettingController::edit");

	$routes->get("package","PackageController::index");
	$routes->post("package/add","PackageController::add");
	$routes->post("package/edit/(:num)","PackageController::edit/$1");

	$routes->get("user","UserController::index");
	$routes->post("user/edit/(:num)","UserController::edit/$1");

	$routes->get('instructur',"InstructurController::index");	
	$routes->post("instructur/add","InstructurController::add");
	$routes->post("instructur/edit/(:num)","InstructurController::edit/$1");

	$routes->get("instructur-feedback","InstructurFeedbackController::index");
	$routes->get("instructur-feedback/delete/(:num)","InstructurFeedbackController::delete/$1");

	$routes->get("course","CourseController::index");
	$routes->get("course/detail/(:num)","CourseController::detail/$1");

	$routes->get("course/reject/(:num)","CourseRejectController::reject/$1");
	$routes->get("course/approve/(:num)","CourseApproveController::approve/$1");
	$routes->get("course/failed/(:num)","CourseFailedController::failed/$1");
	$routes->get("course/success/(:num)","CourseSuccessController::success/$1");
	$routes->get("course/running/(:num)","CourseRunningController::running/$1");

	$routes->get("manual-payment","ManualPaymentController::index");
	$routes->get("manual-payment/detail/(:num)","ManualPaymentController::detail/$1");
	
	$routes->get("manual-payment/success/(:num)","ManualPaymentSuccessController::success/$1");
	$routes->get("manual-payment/failed/(:num)","ManualPaymentFailedController::failed/$1");
	$routes->get("manual-payment/complete/(:num)","ManualPaymentCompleteController::complete/$1");
});

$routes->group("user",['filter' => 'user-auth','namespace' => 'App\Controllers\User'],function($routes){
	$routes->get("/",'HomeController::index');
	
	$routes->get('profil','ProfilController::index');
	$routes->post("update-profil-data","ProfilController::updateData");
	$routes->post("update-profil-photo","ProfilController::updatePhoto");

	$routes->get("package","PackageController::index");

	$routes->get("instructur","InstructurController::index");

	$routes->post("order","OrderController::order");
	
	$routes->get("course","CourseController::index");
	$routes->get('course-history',"CourseController::history");
	$routes->get("course/(:num)","CourseController::detail/$1");
	$routes->get("course/cancel/(:num)","CourseController::cancel/$1");

	$routes->post("payment","PaymentController::payment");
	
	$routes->post("review","ReviewController::review");
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
