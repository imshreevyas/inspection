<?php

namespace Config;

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
$routes->get('/', 'AdminController::notFoundPage');

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group("mainAdmin", function ($routes) {

    // $routes->get('/', 'Home::index');
    // $routes->get('siteConfig', 'Home::siteConfig');
    // $routes->get('welcomePage', 'Home::welcomePage');
    // $routes->post('addSiteConfigs', 'Home::addSiteConfigs');
    // $routes->get('welcomePage', 'Home::welcomePage');

    // Main Admin Get Routes
    $routes->get('/', 'AdminController::login');
    $routes->get('dashboard', 'AdminController::dashboard');

    $routes->get('addSidebar', 'AdminController::addSidebar');
    $routes->get('addVendor', 'AdminController::addVendor');
    $routes->get('addGeneralSettings', 'AdminController::addGeneralSettings');

    $routes->get('allSidebar', 'AdminController::allSidebar');
    $routes->get('allVendor', 'AdminController::allVendor');
    $routes->get('allGeneralSettings', 'AdminController::allGeneralSettings');
    $routes->get('logout', 'AdminController::SignOut');


    // Main Amdin Post Routes
    $routes->post('checkLogin', 'AdminController::checkLogin');
    $routes->post('dataInsertSidebar', 'AdminController::dataInsertSidebar');
    $routes->post('dataInsertGeneralSettings', 'AdminController::dataInsertGeneralSettings');
    $routes->post('dataInsertVendor', 'AdminController::dataInsertVendor');

});



$routes->group("vendor/(:any)", function ($routes) {

    // Main Admin Get Routes
    $routes->get('login', 'VendorController::login');
    $routes->get('dashboard', 'VendorController::dashboard');

    // Roles Section starts
    $routes->get('addRole', 'VendorController::addRole');
    $routes->get('editRole/(:any)', 'VendorController::editRole/$2');
    $routes->get('allRoles', 'VendorController::allRoles');
    // Roles Section Ends
    
    // Employees Section starts
    $routes->get('addEmployee', 'VendorController::addEmployees');
    $routes->get('editEmployee/(:any)', 'VendorController::editEmployees/$2');
    $routes->get('allEmployees', 'VendorController::allEmployees');
    // Employee Section Ends


    // Client Section starts
    $routes->get('addClient', 'VendorController::addClient');
    $routes->get('editClient/(:any)', 'VendorController::editClient/$2');
    $routes->get('allClients', 'VendorController::allClients');
    // Client Section Ends

    // Assets Section starts
    $routes->get('addAsset', 'VendorController::addAsset');
    $routes->get('editAsset/(:any)', 'VendorController::editAsset/$2');
    $routes->get('allAssets', 'VendorController::allAssets');
    // Assets Section Ends


    $routes->get('addProduct', 'VendorController::addProduct');
    
    $routes->get('allVendor', 'VendorController::allVendor');
    $routes->get('allGeneralSettings', 'VendorController::allGeneralSettings');
    $routes->get('logout', 'VendorController::SignOut');
    

    // Vendor All Add Post Routes Starts
        $routes->post('checkLogin', 'VendorController::checkLogin');

        // Common Modules Section
        $routes->post('dataInsertSidebar', 'VendorController::dataInsertSidebar');
        $routes->post('dataInsertGeneralSettings', 'VendorController::dataInsertGeneralSettings');
        $routes->post('dataInsertVendor', 'VendorController::dataInsertVendor');
      
        // Role Section
        $routes->post('dataInsertRole', 'VendorController::dataInsertRole');
        $routes->post('dataUpdateRole/(:any)', 'VendorController::dataUpdateRole/$2');
        
        // Employee Section
        $routes->post('dataInsertEmployee', 'VendorController::dataInsertEmployee'); // Add Employee
        $routes->post('dataUpdateEmployee/(:any)', 'VendorController::dataUpdateEmployee/$2'); // Edit Employee

        // Client Section
        $routes->post('dataInsertClient', 'VendorController::dataInsertClient'); // Add Client
        $routes->post('dataUpdateClient/(:any)', 'VendorController::dataUpdateClient/$2'); // Edit Client

        // Assets Section
        $routes->post('dataInsertAsset', 'VendorController::dataInsertAsset'); // Add Assets
        $routes->post('dataUpdateAsset/(:any)', 'VendorController::dataUpdateAsset/$2'); // Edit Assets

    // Vendor All Add Post Routes Ends

});

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
