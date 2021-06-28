<?php

namespace App\Controllers;

use App\Models\CategoryhassizeModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ReferencegroupModel;
use CodeIgniter\Model;

class Family extends BaseController
{
    public function view_list_products()
    {
        //declaracion de los modelos declaracion
        $mdlReferenceGroup = new ReferencegroupModel();

        return view('structure/header')
            . view('structure/navbarcontent')
            . view('contents/group_products/list_references', [
                'products' => $mdlReferenceGroup->where('group_of_category_id_group_of_category', 1)->findAll()
            ])
            . view('structure/footer');
    }

    public function viewDetailGroupProduct($ref)
    {
        //declara los modelos
        $mdlProduct = new ProductModel();
        $mdlCategory = new CategoryModel();
        $sizesModel = new CategoryhassizeModel();

        $idCategoryProduct1 = 3; //id categoria body sisa
        $idCategoryProduct2 = 7; //id categoria pantalonetas

        $category1 = $mdlCategory->find($idCategoryProduct1);
        $category2 = $mdlCategory->find($idCategoryProduct2);
        $product1 = $mdlProduct->where('category_idcategory', $idCategoryProduct1)->where('reference', $ref)->first();
        $product2 = $mdlProduct->where('category_idcategory', $idCategoryProduct2)->where('reference', $ref)->first();
        $sizes1 = $sizesModel->where('category_idcategory', $idCategoryProduct1)->findAll();
        $sizes2 = $sizesModel->where('category_idcategory', $idCategoryProduct2)->findAll();

        //VERIFICA SI EXISTE LA REF TANTO EN SISA COMO EN PANTALONETA
        if (empty($product1) || empty($product2)) {
            echo "UNA DE LAS REFERENCIAS NO ESTA CREADA";
        }

        return view('structure/header')
            . view('structure/navbarcontent')
            . view('contents/group_products/detail_group_family', [
                'product1' => $product1,
                'product2' => $product2,
                'category1' => $category1,
                'category2' => $category2,
                'sizes1' => $sizes1,
                'sizes2' => $sizes2,
                'reference' => $ref
            ])
            . view('structure/footer');

        echo $ref;
    }


    public function addToShippingCart()
    {
        if (!$this->validate(
            [
                'quantityproduct1' => 'required|is_natural',
                'quantityproduct2' => 'required|is_natural',
                'reference' => 'required',
                'nameproduct1' => 'required',
                'nameproduct2' => 'required',
                'imageproduct1' => 'required',
                'imageproduct2' => 'required',
                'categoryproduct1' => 'required',
                'categoryproduct2' => 'required',
            ],
            [   // Errors
                'quantityproduct1' => [
                    'required' => 'La cantidad es requerida!',
                    'is_natural' => 'El tipo de dato no es el admitido.'
                ],
                'quantityproduct2' => [
                    'required' => 'La cantidad es requerida!',
                    'is_natural' => 'El tipo de dato no es el admitido.'
                ],

            ]
        )) {
            return redirect()->back()->with('validate', $this->validator->getErrors())->withInput();
        }

        $quantityproduct1 = $this->request->getPost('quantityproduct1');
        $quantityproduct2 = $this->request->getPost('quantityproduct2');

        if ($quantityproduct1 != 0) {
            if (!$this->validate(
                [
                    'sizeproduct1' => 'required|is_not_unique[size.idsize]',
                ],
                [   // Errors
                    'sizeproduct1' => [
                        'required' => 'Como la cantidad es diferente de 0, es necesaria la talla!',
                        'is_not_unique' => 'No existe la talla.'
                    ],
                ]
            )) {
                return redirect()->back()->with('validate', $this->validator->getErrors())->withInput();
            }
        }
        if ($quantityproduct2 != 0) {
            if (!$this->validate(
                [
                    'sizeproduct2' => 'required|is_not_unique[size.idsize]',
                ],
                [   // Errors
                    'sizeproduct2' => [
                        'required' => 'Como la cantidad es diferente de 0, es necesaria la talla!',
                        'is_not_unique' => 'No existe la talla.'
                    ],
                ]
            )) {
                return redirect()->back()->with('validate', $this->validator->getErrors())->withInput();
            }
        }

        //variables recibidas del formulario
        $reference = $this->request->getPost('reference');
        $categoryproduct1 = $this->request->getPost('categoryproduct1');
        $sizeproduct1 = $this->request->getPost('sizeproduct1');
        $categoryproduct2 = $this->request->getPost('categoryproduct2');
        $sizeproduct2 = $this->request->getPost('sizeproduct2');
        $nameproduct1 = $this->request->getPost('nameproduct1');
        $nameproduct2 = $this->request->getPost('nameproduct2');
        $imageproduct1 = $this->request->getPost('imageproduct1');
        $imageproduct2 = $this->request->getPost('imageproduct2');



        $item1 = 'ref' . $reference . 'cat' .  $categoryproduct1 . $this->request->getPostGet('observation') . $sizeproduct1 .  $this->request->getPostGet('horma');
        $item2 = 'ref' . $reference . 'cat' .  $categoryproduct2 . $this->request->getPostGet('observation') . $sizeproduct2 .  $this->request->getPostGet('horma');
        echo $item1 . '<br>';
        echo $item2 . '<br>';

        $CategoryModel = new CategoryModel();

        $Category1 = $CategoryModel->find($categoryproduct1);
        $Category2 = $CategoryModel->find($categoryproduct2);

        if ($quantityproduct1 != 0) {
            $newItem1 = [
                $item1 => [
                    'reference'  => $reference,
                    'category'     => $Category1['name_category'],
                    'name'     => $nameproduct1,
                    'observation'  => $this->request->getPostGet('observation'),
                    'quantity'     => $quantityproduct1,
                    'price' => $Category1['price_category'],
                    'image' => $imageproduct1,
                    'size' => $sizeproduct1,
                    'horma' => $this->request->getPostGet('horma'),
                    'idcategory' => $Category1['idcategory']
                ]
            ];
            if (isset($_SESSION['shoppingcart'])) {
                $this->session->push('shoppingcart', $newItem1);
            } else {
                $this->session->set('shoppingcart', $newItem1);
            }
        }
        if ($quantityproduct2 != 0) {
            $newItem2 = [
                $item2 => [
                    'reference'  => $reference,
                    'category'     => $Category2['name_category'],
                    'name'     => $nameproduct2,
                    'observation'  => $this->request->getPostGet('observation'),
                    'quantity'     => $quantityproduct2,
                    'price' => $Category2['price_category'],
                    'image' => $imageproduct2,
                    'size' => $sizeproduct2,
                    'horma' => $this->request->getPostGet('horma'),
                    'idcategory' => $Category2['idcategory']
                ]
            ];
            if (isset($_SESSION['shoppingcart'])) {
                $this->session->push('shoppingcart', $newItem2);
            } else {
                $this->session->set('shoppingcart', $newItem2);
            }
        }

        return redirect()->to(base_url().route_to('cart'));
    }
}
