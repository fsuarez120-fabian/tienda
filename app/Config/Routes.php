<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false); //para que no se pueda acceder al controlador

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Home::index');

//routes of list of products
$routes->get('/productos/(:alpha)', 'Product::viewproducts/$1', ['as' => 'show_produts']);
$routes->get('/camisetas', 'Product::listofshirts', ['as' => 'list_shirts']);
$routes->get('/specials', 'Product::listofspecials', ['as' => 'list_specials']);
//$routes->get('/cuerina', 'Product::listofcuerina', ['as' => 'list_cuerina']);
$routes->get('/familia', 'Family::view_list_products', ['as' => 'view_list_products_family']);



//routes of products detail
$routes->get('/productos/clasicas/(:num)', 'Product::detailclassic/$1');
$routes->get('/productos/tapabocas/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/pijamas/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/jeans/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/bodysisas/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/bodylargas/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/pantaloneta/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/camisetas/(:num)', 'Product::detailshirt/$1');
$routes->get('/productos/plataformas/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/specials/(:num)/(:num)', 'Product::detailspecials/$1/$2');
//$routes->get('/productos/leggings/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/rizos/(:num)', 'Product::detailproductssize/$1');
//$routes->get('/productos/medias/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/bodycuellotortuga/(:num)', 'Product::detailproductssize/$1');
//$routes->get('/productos/cuerina/(:num)/(:num)', 'Product::detailcuerina/$1/$2');
$routes->get('/productos/busos/(:num)', 'Product::detailproductssize/$1');
$routes->get('/productos/kids/(:num)', 'Product::detailproductssize/$1');

//RUTAS UTILIZADAS PARA CREAR SECCION FAMILIA
//routes of gropus of products
$routes->get('/grupoproductos/familia/(:num)', 'Family::viewDetailGroupProduct/$1', ['as' => 'detail_group_family']);
$routes->post('/addcartfamily', 'Family::addToShippingCart', ['as' => 'add_to_cart_family']);
//ruta para el detalle de familia
$routes->get('/familia/(:num)', 'Family::detailFamily/$1', ['as' => 'detail_family']);
//ajax para traer el detalle de familia
$routes->post('/get-detail-family', 'Ajax::getDetailFamily', ['as' => 'get_info_detail_family']);

//route of purchase
$routes->post('/carrito', 'Product::shoppingcart', ['as' => 'cart']);
$routes->get('/carrito', 'Product::shoppingcart', ['as' => 'cart']);
$routes->get('/datosenvio', 'Product::shippinginformation', ['as' => 'shippingingformation']);
$routes->post('/cities', 'City::getcities');
$routes->get('/cities', 'City::getcities');
$routes->post('/finalizarcompra', 'Product::finalizepurchase', ['as' => 'finalize']);
$routes->get('/finalizarcompra', 'Product::redirectcart');
$routes->post('/borraitem', 'Product::deleteitemcart', ['as' => 'deleteitemcart']);
$routes->post('/shirtsizes', 'Size::getSizes');
$routes->get('/shirtsizes', 'Size::getSizes');


//routes of pictures
$routes->add('/pictures/productos/', '', ['as' => 'images_products']);
$routes->add('/pictures/miniatures/', '', ['as' => 'images_products_miniaturas']);
$routes->add('/pictures/peradk/', '', ['as' => 'images_peradk']);
$routes->add('/pictures/employees/', '', ['as' => 'images_employees']);

//routes of politics
$routes->get('/terminosycondiones', 'Home::termandcoditions', ['as' => 'term_conditiones']);
$routes->get('/politicasdegarantia', 'Home::warrantypolicies', ['as' => 'warranty_policies']);

//routes payment payu
$routes->get('/requestpayment', 'Home::requestpayment');
$routes->add('/confirmationpage', 'Home::confirmationpagepayment');

//routes for sorteos
$routes->post('/sorteomoto', 'Sorteo::registerSorteo', ['as' => 'form_sorteo']);

//route of destroy session
$routes->get('/d', 'Product::destroy');

//route of form dealer
$routes->get('/distribuidor', 'Dealer::form', ['as' => 'form_dealer']);
$routes->post('/distribuidor', 'Dealer::validateForm', ['as' => 'send_data_form']);
$routes->post('/cities_by', 'City::getHtmlCities', ['as' => 'ajax_get_cities']);


$routes->get('adminpage/login', 'Admin/Home::login', ['as' => 'admin_page_login']);
$routes->post('adminpage/login', 'Admin/Home::checklogin', ['as' => 'admin_page_check_login']);


$routes->group('/adminpage', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth'], function ($routes) {
	$routes->add('totalpedidos', 'Order::show_order', ['as' => 'admin_page_orders']);
	$routes->add('pedidos', 'Order::showOrderWithStateFinal', ['as' => 'admin_page_orders_with_state_final']);
	$routes->add('', 'Home::index', ['as' => 'admin_page_home']);
	$routes->add('productos', 'Product::products', ['as' => 'admin_page_products']);
	$routes->add('logout', 'Home::logout', ['as' => 'admin_page_logout']);
	$routes->post('saveproducto', 'Product::createProduct', ['as' => 'admin_page_save_product']);
	$routes->post('update', 'Product::updateItemProducts', ['as' => 'admin_page_update_item_products']);

	//routes for family
	$routes->add('listafamilia', 'Family::viewListProducts', ['as' => 'ap_family_list']);
	$routes->post('savereffamilia', 'Family::createReference', ['as' => 'save_family_new_reference']);

	//routes for cart for advisers
	$routes->get('linkcartshopping', 'Cartforadvisers::viewCreateLink', ['as' => 'admin_page_view_create_link']);
	$routes->get('createlink', 'Cartforadvisers::createLink', ['as' => 'admin_page_create_link']);
	$routes->get('listlink', 'Cartforadvisers::viewListLinks', ['as' => 'admin_page_view_list_link']);
	$routes->post('deshabilitarlink', 'Cartforadvisers::disableLink', ['as' => 'admin_page_disableLink']);

	$routes->get('codigomoto', 'Codigomoto::index', ['as' => 'index_codigo_moto']);
	$routes->post('codigomoto', 'Codigomoto::getInfoForm', ['as' => 'create_codigos']);

	//fabiansuarez
	$routes->post('msg', 'Inge::msg', ['as' => 'admin_page_msg_encripted']);
});

//routes for cart for advisers
$routes->get('/carrito/(:segment)', 'Cartforadvisers::cartReference/$1', ['as' => 'cart_advisers']);
$routes->post('/carrito/save', 'Cartforadvisers::saveShippingInformation', ['as' => 'save_shipping_information_cart_advisers']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
