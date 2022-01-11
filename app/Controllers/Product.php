<?php

namespace App\Controllers;

use App\Entities\Payments;
use App\Models\CategoryhassizeModel;
use App\Models\CategoryModel;
use App\Models\CityModel;
use App\Models\DepartamentModel;
use App\Models\ProductModel;
use App\Models\ServientregaModel;
use CodeIgniter\HTTP\Message;
use App\Models\OrderModel;
use App\Models\ShippinginfoModel;
use App\Models\OrderdetailsModel;

class Product extends BaseController
{

	public function index()
	{
		return view('structure/all');
	}

	public function viewproducts($route)
	{ //List all products for the route in data base, this is for only one product
		$categoryModel = new CategoryModel();
		$category = $categoryModel
			->where('route_category', $route)
			->findAll();

		if (!empty($category)) {
			$productModel = new ProductModel();
			if ($category[0]['idcategory'] == 16) {
				$products = $productModel->where('category_idcategory', $category[0]['idcategory'])
					->where('active_product', 'si')
					->orderBy('reference', 'asc')
					->findAll();
			} else if ($category[0]['idcategory'] == 1) {
				$products = $productModel->where('category_idcategory', $category[0]['idcategory'])
					->where('active_product', 'si')
					->orderBy('score_product', 'desc')
					->orderBy('reference', 'asc')
					->findAll();
			} else if ($category[0]['idcategory'] == 2) {
				$products = $productModel->where('category_idcategory', $category[0]['idcategory'])
					->where('active_product', 'si')
					->orderBy('score_product', 'desc')
					->orderBy('reference', 'desc')
					->findAll();
			} else {
				$products = $productModel->where('category_idcategory', $category[0]['idcategory'])
					->where('active_product', 'si')
					->orderBy('reference', 'desc')
					->findAll();
			}
			$products = array(
				'products' => $products,
				'title' => $category[0]['name_category'],
				'route' => $category[0]['route_category']
			);

			return view('structure/header')
				. view('structure/navbarcontent')
				. view('contents/viewproducts', $products)
				. view('structure/footer');
		} else {
			return view('errors/html/production');
		}
	}


	public function listofcuerina()
	{
		//List of product of
		$ID_LEGGINGS_CUERINA = 19;
		$ID_BICICLETERO_CUERINA = 20;
		$ID_FALDA_CUERINA = 21;
		$ROUTE = "cuerina";
		$TITLE = "Cuerina";

		$productModel = new ProductModel();
		$whereproduct = "(category_idcategory= $ID_LEGGINGS_CUERINA OR category_idcategory= $ID_BICICLETERO_CUERINA OR category_idcategory= $ID_FALDA_CUERINA) ";
		$products = $productModel
			->where($whereproduct)
			->where('active_product', 'si')
			->orderBy('reference', 'desc')
			->findAll();
		$products = array(
			'products' => $products,
			'title' => $TITLE,
			'route' => $ROUTE
		);
		return view('structure/header')
			. view('structure/navbarcontent')
			. view('contents/list_cuerina', $products)
			. view('structure/footer');
	}

	public function detailcuerina($ref, $cat)
	{ //this method show the detail of falda-legings-bicicletero

		$ID_CATEGORY_SPECIAL_1 = 19;
		$ID_CATEGORY_SPECIAL_2 = 20;
		$ID_CATEGORY_SPECIAL_3 = 21;
		$categoryModel = new CategoryModel();
		$category = $categoryModel
			->find($cat);
		$category = array($category);

		if (isset($category) && ($cat == $ID_CATEGORY_SPECIAL_1 or $cat == $ID_CATEGORY_SPECIAL_2 or $cat == $ID_CATEGORY_SPECIAL_3)) {

			$productModel = new ProductModel();
			$product = $productModel
				->where('category_idcategory', $category[0]['idcategory'])
				->where('active_product', 'si')
				->where('reference', $ref)
				->findAll();

			$sizesModel = new CategoryhassizeModel();
			$sizes = $sizesModel
				->where('category_idcategory', $category[0]['idcategory'])
				->findAll();

			// the observations of the products


			$observations = array();
			$messegeobservation = '';
			$messegesize =
				'<p class="form-text text-muted">
						<b>Se recomienda pedir la talla que más uses en Jeans nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
					</p>';

			if (!empty($product)) {

				$info = array(
					'category' => $category,
					'products' => $product,
					'sizes' => $sizes,
					'observations' => $observations,
					'messegeobservation' => $messegeobservation,
					'messegesize' => $messegesize
				);

				return view('structure/header')
					. view('structure/navbarcontent')
					. view('contents/detailonlysize', $info)
					. view('structure/footer');
			} else {
				return view('errors/html/error_404');
			}
		} else {

			return view('errors/html/error_404');
		}
	}

	public function listofshirts()
	{ //List of shirts man and woman
		$ID_SHIRT_WOMAN = 12;
		$ID_SHIRT_MAN = 120;
		$ROUTE = "camisetas";
		$TITLE = "Camisetas";

		$productModel = new ProductModel();
		$whereproduct = "(category_idcategory= $ID_SHIRT_WOMAN OR category_idcategory= $ID_SHIRT_MAN) ";
		$products = $productModel
			->where($whereproduct)
			->where('active_product', 'si')
			->orderBy('score_product', 'asc')
			->findAll();
		$products = array(
			'products' => $products,
			'title' => $TITLE,
			'route' => $ROUTE
		);
		return view('structure/header')
			. view('structure/navbarcontent')
			. view('contents/viewproducts', $products)
			. view('structure/footer');
	}

	public function detailshirt($ref)
	{ //this method show the detail of the shirt woman and man

		$ID_SHIRT_WOMAN = 12;
		$ID_SHIRT_MAN = 120;
		$productModel = new ProductModel();
		$whereproduct = "(category_idcategory= $ID_SHIRT_WOMAN OR category_idcategory= $ID_SHIRT_MAN)
		AND active_product= 'si' AND reference=$ref";
		$product = $productModel->where($whereproduct)
			->findAll();

		if (!empty($product)) {
			$categoryModel = new CategoryModel();
			$category = $categoryModel->where('idcategory', $product[0]['category_idcategory'])->findAll();
			$sizesModel = new CategoryhassizeModel();
			$sizes = $sizesModel
				->where('category_idcategory', $category[0]['idcategory'])
				->findAll();

			if (!empty($category)) {
				$data = array(
					'products' => $product,
					'category' => $category[0],
					'sizes' => $sizes,
					'productkid' => $productModel->where("(category_idcategory=23)
					AND reference=$ref")->findAll()
				);

				return view('structure/header')
					. view('structure/navbarcontent')
					. view('contents/detailshirts', $data)
					. view('structure/footer');
			} else {
				echo "LO SENTIMOS ESTE PRODUCTO NO EXISTE";
			}
		} else {
			echo "LO SENTIMOS ESTE PRODUCTO NO EXISTE";
		}
	}

	public function detailclassic($refClassic)
	{ //this method show the detail of the classics

		$CATEGORY_ID = 1;
		$categoryModel = new CategoryModel();
		$category = $categoryModel
			->find($CATEGORY_ID);

		$productModel = new ProductModel();
		$product = $productModel->where('category_idcategory', $CATEGORY_ID)
			->where('active_product', 'si')
			->where('reference', $refClassic)
			->findAll();

		$sizesModel = new CategoryhassizeModel();
		$sizes = $sizesModel
			->where('category_idcategory', $CATEGORY_ID)
			->findAll();

		if (!empty($product)) {
			$product = array(
				'products' => $product,
				'category' => $category,
				'sizes' => $sizes
			);

			return view('structure/header')
				. view('structure/navbarcontent')
				. view('contents/detailclassic', $product)
				. view('structure/footer');
		} else {
			echo "LO SENTIMOS ESTE PRODUCTO NO EXISTE";
		}
	}

	public function listofspecials()
	{ //List of shirts man and woman
		$ID_PRODUCT_1 = 100;
		$ID_PRODUCT_2 = 200;
		$ROUTE = "specials";
		$TITLE = "Piedritas - Estrellitas";

		$productModel = new ProductModel();
		$whereproduct = "(category_idcategory= $ID_PRODUCT_1 OR category_idcategory= $ID_PRODUCT_2) ";
		$products = $productModel
			->where($whereproduct)
			->where('active_product', 'si')
			->orderBy('reference', 'desc')
			->findAll();
		$products = array(
			'products' => $products,
			'title' => $TITLE,
			'route' => $ROUTE
		);

		return view('structure/header')
			. view('structure/navbarcontent')
			. view('contents/viewproducts', $products)
			. view('structure/footer');
	}

	public function detailspecials($ref, $cat)
	{ //this method show the detail of specials: estrellitas-piedritas


		$ID_CATEGORY_SPECIAL_1 = 100;
		$ID_CATEGORY_SPECIAL_2 = 200;
		$categoryModel = new CategoryModel();
		$category = $categoryModel
			->find($cat);
		$category = array($category);

		if (isset($category) && ($cat == $ID_CATEGORY_SPECIAL_1 or $cat == $ID_CATEGORY_SPECIAL_2)) {

			$productModel = new ProductModel();
			$product = $productModel
				->where('category_idcategory', $category[0]['idcategory'])
				->where('active_product', 'si')
				->where('reference', $ref)
				->findAll();

			$sizesModel = new CategoryhassizeModel();
			$sizes = $sizesModel
				->where('category_idcategory', $category[0]['idcategory'])
				->findAll();

			// the observations of the products


			$observations = array(
				'item1' => ['sin observacion', 'Sin Observación'],
				'uten1' => ['pie delgado', 'Pie Delgado'],
				'uten2' => ['+empeine', '+Empeine'],
				'uten3' => ['++empeine', '++Empeine'],
			);
			$messegeobservation =
				'<p class="form-text text-muted">
						<b>Si tu pie es ancho ten en cuenta estas observaciones</b><br>
						Pie delgado = 0.5 centimetros menos ancho<br>
						+empeine = 0.5 centimetro mas ancho<br>
						++empeine = 1 centimetro mas ancho 
					</p>';
			$messegesize =
				'<p class="form-text text-muted">
						<b>Se recomienda pedir la talla que más uses en calzado nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
					</p>';

			if (!empty($product)) {

				$info = array(
					'category' => $category,
					'products' => $product,
					'sizes' => $sizes,
					'observations' => $observations,
					'messegeobservation' => $messegeobservation,
					'messegesize' => $messegesize
				);

				return view('structure/header')
					. view('structure/navbarcontent')
					. view('contents/detailonlysize', $info)
					. view('structure/footer');
			} else {
				return view('errors/html/error_404');
			}
		} else {

			return view('errors/html/error_404');
		}
	}


	public function detailproductssize($ref)
	{ //this method show the detail of products that only have size

		$res = \Config\Services::request();
		$category = $res->uri->getSegment(2);

		$categoryModel = new CategoryModel();
		$category = $categoryModel
			->where('route_category', $category)
			->findAll();

		$productModel = new ProductModel();
		$product = $productModel
			->where('category_idcategory', $category[0]['idcategory'])
			->where('active_product', 'si')
			->where('reference', $ref)
			->findAll();

		$sizesModel = new CategoryhassizeModel();
		$sizes = $sizesModel
			->where('category_idcategory', $category[0]['idcategory'])
			->findAll();

		// the observations of the products

		switch ($category[0]['idcategory']) {
			case 14:
				$observations = array(
					'item1' => ['normal', 'Normal'],
					'uten2' => ['ajustable', 'Ajustable'],
				);
				$messegeobservation =
					'<p class="form-text text-muted">
						PeRa Amiguis puedes elegir sus tapabocas clásicos o ajustables.
					</p>';
				$messegesize =
					' <p class="form-text text-muted">
						<b>Grande</b>, de 15 años en adelante.<br>
						<b>Mediano</b>, de 9 a 14 años.<br>
						<b>Pequeño</b>, de 4 a 8 años.<br>
						
					</p>';
				break;
			case 15:
				$observations = array();

				$messegeobservation =
					'';
				$messegesize =
					' <p class="form-text text-muted">
							<b>PeRa amiguis pide la talla que mas utilizas en camiseta nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.

							</b>
							
						</p>';
				break;
			case 2:

				$observations = array(
					'item1' => ['sin observacion', 'Sin Observación'],
					'uten1' => ['pie delgado', 'Pie Delgado'],
					'uten2' => ['+empeine', '+Empeine'],
					'uten3' => ['++empeine', '++Empeine'],
				);
				$messegeobservation =
					'<p class="form-text text-muted">
						<b>Si tu pie es ancho ten en cuenta estas observaciones</b><br>
						Pie delgado = 0.5 centimetros menos ancho<br>
						+empeine = 0.5 centimetro mas ancho<br>
						++empeine = 1 centimetro mas ancho
					</p>';
				if (
					$product[0]['reference'] == 1004 &&
					$category[0]['idcategory'] == 2
				) {
					$messegesize =
						'<p class="form-text text-muted">
							<b>SOLO DISPONIBLE PARA CABALLERO</b>
							<br>
						Se recomienda pedir la talla que más uses en calzado nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.
							
						</p>';
				} else {
					$messegesize =
						'<p class="form-text text-muted">
							<b>Se recomienda pedir la talla que más uses en calzado nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
						</p>';
				}
				break;

			case 9:
				$observations = array(
					'item0' => ['', 'Tipo [adulto - niño]'],
					'item1' => ['adulto', 'Adulto'],
					'uten2' => ['nino', 'Niño']
				);
				$messegeobservation =
					'<p class="form-text text-muted">
					<b>Escoge el tipo de Leggings que deseas.</b><br>
				</p>';
				$messegesize =
					'<p class="form-text text-muted">
							<b>Pide la talla que mas utilices en Jeans Nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
							<br><b>Nota: </b>Recuerda que para tallas de niñas el precio del leggings es de 48.000 C/U y para adultos 70.000 C/U.
						</p>';
				break;
			case 10:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					'<p class="form-text text-muted">
								<b>Pide la talla que más utilices en Jeans Nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
							</p>';
				break;
			case 3:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					'<p class="form-text text-muted">
					<b>PeRa amiguis pide la talla que más utilizas en camiseta nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">. Recuerda que lo puedes usar como prenda casual o traje de baño.
					<br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
					<br><b>Talla para niñas </b>(0 a la 16).
					<br><b>Talla para adulto </b>(XS a la XXXL).
				</p>';
				break;
			case 4:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					'<p class="form-text text-muted">
								<b>PeRa amiguis pide la talla que más utilizas en camiseta nacional. Recuerda que lo puedes usar como prenda casual o traje de baño.
								<br>Nota: </b>los PeRa Bodys por ser prenda intima de uso personal, no tienen cambio.
								<br><b>Talla para niñas </b>(0 a la 16).
								<br><b>Talla para adulto </b>(XS a la XXXL).
							</p>';
				break;
			case 7:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					'<p class="form-text text-muted">
									<b>Pide la talla que más utilices en Jeans Nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.</b>
								</p>';
				break;
			case 16:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					'<p class="form-text text-muted">
									<b>PeRa amiguis pide la talla que más utilizas en camiseta nacional<img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">. Recuerda que lo puedes usar como prenda casual o traje de baño.
									
								</p>';
				break;
			case 23:
				$observations = array();
				$messegeobservation =
					'';
				$messegesize =
					' <p class="form-text text-muted">
							<b>PeRa amiguis pide la talla que mas utilizas en camiseta nacional <img src="' . base_url() . route_to('images_peradk') . '/colombia.svg" alt="" style="width: 20px;">.
							</b>	
						</p>';
				break;

			default:
				$observations = array();
				$messegeobservation =
					'<p class="form-text text-muted">
						<b>Observacion.</b><br>
					</p>';
				$messegesize =
					' <p class="form-text text-muted">
						<b>Escoje tu Talla.</b>
					</p>';
		}

		if (!empty($product)) {

			$info = array(
				'category' => $category,
				'products' => $product,
				'sizes' => $sizes,
				'observations' => $observations,
				'messegeobservation' => $messegeobservation,
				'messegesize' => $messegesize
			);

			return view('structure/header')
				. view('structure/navbarcontent')
				. view('contents/detailonlysize', $info)
				. view('structure/footer');
		} else {
			echo "LO SENTIMOS ESTE PRODUCTO NO EXISTE";
		}
	}


	public function deleteitemcart()
	{
		$requeestcategory = $this->request->getPost('category');
		$categoryModel = new CategoryModel();
		$category = $categoryModel->where('name_category', $requeestcategory)->findAll();
		if (isset($category)) {
			$item = 'ref' . $this->request->getPostGet('reference') . 'cat' . $this->request->getPostGet('category') . $this->request->getPostGet('observation') . $this->request->getPostGet('size') . $this->request->getPostGet('horma');


			unset($_SESSION['shoppingcart'][$item]);
			return redirect()->route('cart');
		} else {
			return view('error/html/production');
		}
	}


	public function shoppingcart()
	{
		//ADD PRODUCT TO SHOPPING CART
		if ($this->request->getPostGet('r') == 'addproduct') {



			$idcategory = $this->request->getPostGet('category');
			$horma = $this->request->getPostGet('horma');
			$reff = $this->request->getPostGet('reference');
			$name = $this->request->getPostGet('name');
			$image = $this->request->getPostGet('image');

			//modificacion para las camisetas de niño que viene del detal de adultos
			if ($idcategory == 12 || $idcategory == 120) {
				switch ($horma) {
					case 'hombre':
						$idcategory = $this->request->getPostGet('category');
						break;
					case 'mujer':
						$idcategory = $this->request->getPostGet('category');
						break;
					case 'nino':
						$idcategory = 23;
						break;
					case 'nina':
						$idcategory = 23;
						break;
				}
				$productModel = new ProductModel();
				$product = $productModel->where('category_idcategory', $idcategory)->where('reference', $reff)->first();
				$name = $product['name_product'];
				$image = $product['image_product'];
			}


			//---------------

			$item = 'ref' . $reff . 'cat' .  $idcategory . $this->request->getPostGet('observation') . $this->request->getPostGet('size') . $horma;
			$CategoryModel = new CategoryModel();
			$Category = $CategoryModel->find($idcategory);
			$size = $this->request->getPostGet('size');
			$observation =  $this->request->getPostGet('observation');
			//determinar si es legging de niña para cobrarlo al precio que es....
			if ($Category['idcategory'] == 9) {
				//qui determinamos el precio
				if ($observation == 'nino') {
					$price = 48000;
				} else {
					$price = $Category['price_category'];
				}
			} else {
				$price = $Category['price_category'];
			}

			$newItem = [
				$item => [
					'reference'  => $reff,
					'category'     => $Category['name_category'],
					'name'     => $name,
					'observation'  => $this->request->getPostGet('observation'),
					'quantity'     => $this->request->getPostGet('quantity'),
					'price' => $price,
					'image' => $image,
					'size' => $size,
					'horma' => $horma,
					'idcategory' => $Category['idcategory']
				]
			];

			if (isset($_SESSION['shoppingcart'])) {
				$this->session->push('shoppingcart', $newItem);
			} else {
				$this->session->set('shoppingcart', $newItem);
			}
		}
		//SHOW THE SHOPPING CART
		if (isset($_SESSION['shoppingcart'])) {

			$res = \Config\Services::request();
			$category = $res->uri->getSegment(2);
			$categoryModel = new CategoryModel();
			$category = $categoryModel
				->where('route_category', $category)
				->findAll();

			$cart = array(
				'cart' =>  $_SESSION['shoppingcart']
			);

			return view('structure/header')
				. view('structure/navbarcontent')
				. view('contents/shoppingcart', $cart)
				. view('structure/footer');
		} else {
			$cart = array('cart' => array());
			return view('structure/header')
				. view('structure/navbarcontent')
				. view('contents/shoppingcart', $cart)
				. view('structure/footer');
		}
	}

	public function shippinginformation()
	{
		if (isset($_SESSION['shoppingcart'])) {
			if (count($_SESSION['shoppingcart']) >= 1) {
				if (isset($_SESSION['shippinginformation'])) {
					$informationshipping = $_SESSION['shippinginformation'];
				} else {
					$informationshipping = [
						'department' => '',
						'city' => '',
						'adress' => '',
						'neighborhood' => '',
						'name' => '',
						'surname' => '',
						'typeid' => '',
						'numberid' => '',
						'numphone' => '',
						'email' => '',
					];
				}

				$modelDepart = new DepartamentModel();
				$departments = $modelDepart
					->findAll();

				$data = array(
					'departments' => $departments,
					'informationshipping' => $informationshipping
				);
				return view('structure/header')
					. view('structure/navbarcontent')
					. view('contents/shippinginformation', $data)
					. view('structure/footer');
			} else {
				return redirect()->route('cart');
			}
		} else {
			return redirect()->route('cart');
		}
	}

	public function finalizepurchase()
	{

		if (!isset($_SESSION['shoppingcart'])) {
			return redirect()->route('cart');
		}
		$modelcity = new CityModel();
		$cityfound = $modelcity->getcity($this->request->getPost('city'));
		$information = array(
			'referencecode' => date("Y") . '-' . date("m") . '-' . date("d") . '-' . time(),
			'department' => $cityfound[0]['department_city'],
			'city' => $cityfound[0]['idcity'],
			'adress' => $this->request->getPost('adress'),
			'neighborhood' => $this->request->getPost('neighborhood'),
			'name' => $this->request->getPost('name'),
			'surname' => $this->request->getPost('surname'),
			'typeid' => $this->request->getPost('typeid'),
			'numberid' => $this->request->getPost('numberid'),
			'numphone' => $this->request->getPost('numphone'),
			'email' => $this->request->getPost('email'),
			'freight' => $this->calculatefreight($cityfound[0]['idcity'])
		);
		//save shippinginformation in session
		if (isset($_SESSION['shippinginformation'])) {
			$this->session->push('shippinginformation', $information);
		} else {
			$this->session->set('shippinginformation', $information);
		}


		//GUARDAR LA ORDEN CON LOS ITEMS EN LA BASE DE DATOS

		if (!empty($_SESSION['shoppingcart']) && !empty($_SESSION['shippinginformation'])) {
			/*d($_SESSION['shoppingcart']);
            d($_SESSION['shippinginformation']);*/

			$REFERENCE = $_SESSION['shippinginformation']['referencecode'];

			//Save information of the order
			$dataShipInfo = array(
				'idshipinfo' => $REFERENCE,
				'city_idcity' => $_SESSION['shippinginformation']['city'],
				'address_shippinginfo' => $_SESSION['shippinginformation']['adress'],
				'neighborhood_shippinginfo' => $_SESSION['shippinginformation']['neighborhood'],
				'name_shippinginfo' => $_SESSION['shippinginformation']['name'],
				'surname_shippinginfo' => $_SESSION['shippinginformation']['surname'],
				'typeid_shippinginfo' => $_SESSION['shippinginformation']['typeid'],
				'number_id_shippinginfo' => $_SESSION['shippinginformation']['numberid'],
				'number_phone_shippinginfo' => $_SESSION['shippinginformation']['numphone'],
				'email_shippinginfo' => $_SESSION['shippinginformation']['email']
			);
			$shipinfoModel = new ShippinginfoModel(); // call model
			$shipinfoModel->insert($dataShipInfo); //ejecute function insert
			//save----------------------

			$totalProducts = 0; //variable para calcular el total de productos
			foreach ($_SESSION['shoppingcart'] as $product) {
				$totalProducts = $totalProducts + $product['price'] * $product['quantity'];
			}

			$orderModel = new OrderModel();
			$dataOrder = array(
				'reference_order' => $REFERENCE,
				'date_order' => date("Y") . '-' . date("m") . '-' . date("d"),
				'product_price_order' => $totalProducts,
				'freight_price_order' => $_SESSION['shippinginformation']['freight'],
				'total_price_order' => $totalProducts + $_SESSION['shippinginformation']['freight'],
				'state_order' => 'PENDING',
				'shippinginfo_idshipinfo' => $REFERENCE,
				'consecutive_order' => (count($orderModel->findAll()) + 1)
			);

			$orderModel->insert($dataOrder);

			//Guardar los items de las ordenes

			$detailorderModel = new OrderdetailsModel();
			foreach ($_SESSION['shoppingcart'] as $product) {
				$dataItemOrder = array(
					'order_reference_order' => $REFERENCE,
					'product_reference' => $product['reference'],
					'product_category_idcategory' => $product['idcategory'],
					'size_idsize' => $product['size'],
					'quantity_orderdetails' => $product['quantity'],
					'unit_price_orderdetails' => $product['price'],
					'observation_orderdetails' => $product['observation'],
					'horma_orderdetails' => $product['horma']
				);
				$detailorderModel->insert($dataItemOrder);
			}
		}

		//____________________________________________________
		//_________________________________________________


		date_default_timezone_set('America/Bogota');
		//CONSTANTES WEBCHECKOUT PAYU
		$REFERENCE_CODE =  $_SESSION['shippinginformation']['referencecode'];
		$amount = 0;
		foreach ($_SESSION['shoppingcart'] as $item) {
			$amount = $amount + ($item['price'] * $item['quantity']);
		}
		$AMOUNT = $amount + $information['freight'];
		$TAX = $this->generateTax()['Tax'];
		$TAX_RETURN_BASE = $this->generateTax()['TaXReturnBase'];
		$BUYEREMAIL = $_SESSION['shippinginformation']['email'];
		$BUYER_FULLNAME = $_SESSION['shippinginformation']['name'] . ' ' . $_SESSION['shippinginformation']['surname'];
		$PAYER_DOCUMENT = $_SESSION['shippinginformation']['numberid'];
		$MOBILE_PHONE = $_SESSION['shippinginformation']['numphone'];
		$payment = new Payments();
		//------------------------------------
		$data = array(
			'cart' => $_SESSION['shoppingcart'],
			'information' => [
				'department' => $cityfound[0]['name_department'],
				'city' => $cityfound[0]['name_city'],
				'adress' => $this->request->getPost('adress'),
				'neighborhood' => $this->request->getPost('neighborhood'),
				'name' => $this->request->getPost('name'),
				'surname' => $this->request->getPost('surname'),
				'typeid' => $this->request->getPost('typeid'),
				'numberid' => $this->request->getPost('numberid'),
				'numphone' => $this->request->getPost('numphone'),
				'email' => $this->request->getPost('email')
			],
			'flete' => $information['freight'],
			'payment' => [
				'url' => $payment->getUrl(),
				'merchantId' => $payment->getMerchantId(),
				'accountId' => $payment->getAccountId(),
				'description' => $payment->getDescription(),
				'referenceCode' => $REFERENCE_CODE,
				'amount' => $AMOUNT,
				'tax' => $TAX,
				'taxReturnBase' => $TAX_RETURN_BASE,
				'currency' => $payment->getCurrency(),
				'signature' => $payment->generateSignature($REFERENCE_CODE, $AMOUNT),
				'test' => $payment->getTest(),
				'buyerEmail' => $BUYEREMAIL,
				'responseUrl' => $payment->getResponseUrl(),
				'confirmationUrl' => $payment->getConfirmationUrl(),
				'buyerFullName' => $BUYER_FULLNAME,
				'payerDocument' => $PAYER_DOCUMENT,
				'mobilePhone' => $MOBILE_PHONE,
				'payerEmail' => $BUYEREMAIL,
				'payerMobilePhone' => $MOBILE_PHONE,
				'payerFullName' => $BUYER_FULLNAME
			],
		);
		$this->session->destroy();
		return view('structure/header')
			. view('structure/navbarcontent')
			. view('contents/finalizepurchase', $data)
			. view('structure/footer');
	}

	public function calculatefreight($citydestination) //OJO TENER EN CUENTA QUE ESTE METODO ESTA EN EL CONTROLADOR DE CARTFORADVISERS DEBEN SER IGUALES
	{
		$ORIGIN_CITY = 442;
		$modelServientrega = new ServientregaModel();
		$servientrega = $modelServientrega->getjourneyandprice($ORIGIN_CITY, $citydestination);
		$counter_tap = 0;
		$counter_products = 0;
		$counter_socks = 0;
		$counter_rizos = 0;

		foreach ($_SESSION['shoppingcart'] as $item) {
			$counter_products = $counter_products + $item['quantity'];
			if ($item['idcategory'] == 14) {
				$counter_tap +=  $item['quantity'];
			}
			if ($item['idcategory'] == 5) {
				$counter_socks +=  $item['quantity'];
			}
			if ($item['idcategory'] == 6) {
				$counter_rizos +=  $item['quantity'];
			}
		}
		/* if ($counter_tap < 6 && $counter_products == $counter_tap + $counter_socks) {
			return $servientrega[0]['price_typejourney'];
		} else if ($counter_rizos <= 1 && $counter_rizos == $counter_products) {
			return $servientrega[0]['price_typejourney'];
		} else {
			return 0;
		} */
		//con el codigo comentado se hacia las codiciones para cuando no se cobraba el flete

		return $servientrega[0]['price_typejourney'];
	}

	public function generateTax()
	{
		$totaToGetIVA = 0;
		foreach ($_SESSION['shoppingcart'] as $item) {
			if ($item['idcategory'] == 14) {
				$totaToGetIVA = $totaToGetIVA;
			} else {
				$totaToGetIVA = $totaToGetIVA + ($item['price'] * $item['quantity']);
			}
		}
		return array(
			'Tax' => number_format($totaToGetIVA - ($totaToGetIVA / 1.19), 2, '.', ''),
			'TaXReturnBase' => number_format(($totaToGetIVA / 1.19), 2, '.', '')
		);
	}

	public function redirectcart()
	{
		return redirect()->route('cart');
	}

	public function destroy()
	{
		$this->session->destroy();
	}
}
