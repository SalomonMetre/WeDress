<?php

namespace Config;

use App\Controllers\UserController;
use Controllers\LandingController\LandingController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LandingController::index');
$routes->add('signupPage', 'UserController::loadSignupPage');
$routes->add('signinPage', 'UserController::loadSigninPage');


//admin
$admin_routes=[

    //pages
    'adminHomePage'=>'AdminController::loadHomePage',
    'addNewUserPage'=>'AdminController::addNewUserPage',
    'viewUserPage'=>'AdminController::viewUserPage',
    'editUserPage/(:any)'=>'AdminController::editUserPage/$1',

    'addNewCategoryPage'=>'AdminController::addNewCategoryPage',
    'viewCategoryPage'=>'AdminController::viewCategoryPage',
    'editCategoryPage/(:any)'=>'AdminController::editCategoryPage/$1',

    'addNewSubcategoryPage'=>'AdminController::addNewSubcategoryPage',
    'viewSubcategoryPage'=>'AdminController::viewSubcategoryPage',
    'editSubcategoryPage/(:any)'=>'AdminController::editSubcategoryPage/$1',

    'addNewItemPage'=>'AdminController::addNewItemPage',
    'viewItemPage'=>'AdminController::viewItemPage',
    'editItemPage/(:any)'=>'AdminController::editItemPage/$1',

    'generateTokenPage'=>'AdminController::generateTokenPage',
    'generateTokenProductPage'=>'AdminController::generateTokenProductPage',

    'viewAnalytics'=>'AdminController::viewAnalytics',

    //operations
    'addNewUser'=>'AdminController::addNewUser',
    'editUser/(:any)'=>'AdminController::editUser/$1',

    'addNewCategory'=>'AdminController::addNewCategory',
    'editCategory/(:any)'=>'AdminController::editCategory/$1',

    'addNewSubcategory'=>'AdminController::addNewSubcategory',
    'editSubcategory/(:any)'=>'AdminController::editSubcategory/$1',

    'addNewItem'=>'AdminController::addNewItem',
    'editItem/(:any)'=>'AdminController::editItem/$1',

    'generateToken'=>'AdminController::generateToken',
    'generateTokenProduct'=>'AdminController::generateTokenProduct',
    
];

foreach($admin_routes as $routeName=>$controllerFunction)
{
    $routes->add($routeName,$controllerFunction);
}

//user
$user_routes=[
    'userSignup'=>'UserController::signup',
    'userSignin'=>'UserController::signin',
    'userHomePage'=>'UserController::homePage',
    'userSignout'=>'UserController::signout',
    'userViewItem'=>'UserController::viewItem',
    'userAddMoneyWallet'=>'UserController::addMoneyWallet',
    'userViewPurchaseHistory'=>'UserController::viewPurchaseHistory',
    'userViewReceipt'=>'UserController::viewReceipt',

    'getAllItemsWithDetails'=>'UserController::viewItem',
    'addMoneyToWallet'=>'UserController::addMoneyToWallet',
    'orderItem'=>'UserController::orderItem',
];

foreach($user_routes as $routeName=>$controllerFunction)
{
    $routes->add($routeName,$controllerFunction);
}

// my api routes
$api_routes=[
    'users'=>'ApiController::getUsers',
    'products'=>'ApiController::getProducts',
    'transactions'=>'ApiController::getTransactions',
];
foreach($api_routes as $routeName=>$controllerFunction){
    $routes->add('api/'.$routeName,$controllerFunction);
}

$documentation_routes=[
    'apiHomePage'=>'ApiController::homePage',
    'apiUserDataPage'=>'ApiController::userDataPage',
    'apiProductDataPage'=>'ApiController::productDataPage',
    'apiTransactionDataPage'=>'ApiController::transactionDataPage',
];
foreach($documentation_routes as $routeName=>$controllerFunction){
    $routes->add($routeName,$controllerFunction);
}


/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
