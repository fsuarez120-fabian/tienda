<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PermissionModel;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function products()
    {
        //verificar si tiene permisos
        $mdlPermission = new PermissionModel();

        if ($mdlPermission->hasPermission(2)) {
            if ($this->request->getGet('idcategory')) {
                $CATEGORY = $this->request->getGet('idcategory');
            } else {
                $CATEGORY = 14;
            }

            //Llamar el modelo
            $modelproduct = new ProductModel();
            $modelcategory = new CategoryModel();
            $products = $modelproduct->where('category_idcategory', $CATEGORY)->orderBy('score_product', 'desc')->findAll();

            $catego = $modelcategory->find($CATEGORY);
            $allcategories = $modelcategory->findAll();

            if (isset($catego) && isset($products)) {

                $data = array(
                    'products' => $products,
                    'category' => $catego,
                    'allcategories' => $allcategories
                );
                return view('adminpage/structure/header')
                    . view('adminpage/structure/navbar')
                    . view('adminpage/structure/sidebar')
                    . view('adminpage/contents/products', $data)
                    . view('adminpage/structure/footer');
            } else {
                return view('errors/html/error_404');
            }
        } else {
            return view('adminpage/structure/header')
                . view('adminpage/structure/navbar')
                . view('adminpage/structure/sidebar')
                . view('errors/permission/donthavepermission')
                . view('adminpage/structure/footer');
        }
    }


    public function updateItemProducts()
    {

        //verificar si tiene permisos
        $mdlPermission = new PermissionModel();

        if ($mdlPermission->hasPermission(4)) {

            if (!$this->validate([
                'nameproduct' => 'required',
                'activeproduct' => 'required'
            ])) {
                return redirect()->back()->with('error', [
                    'title' => 'No se pudo hacer los cambios!',
                    'body' => "Los datos no pasaron la validación, verifica los tipos de datos."
                ]);
            }
            $data = [
                'reference' => $this->request->getPostGet('reference'),
                'category_idcategory' => $this->request->getPostGet('idcategory'),
                'name_product' => $this->request->getPostGet('nameproduct'),
                'active_product' => $this->request->getPostGet('activeproduct')
            ];
            d($data);
            $modelProduct = new ProductModel();
            $modelProduct->set($data)->where('reference', $this->request->getPostGet('reference'))->where('category_idcategory', $this->request->getPostGet('idcategory'))->update();
            return redirect()->back()->with('msg', [
                'title' => 'Se efectuó!',
                'body' => 'La referencia ' .  $this->request->getPostGet('reference') . ' ha cambiado.'
            ]);
        } else {
            return view('adminpage/structure/header')
                . view('adminpage/structure/navbar')
                . view('adminpage/structure/sidebar')
                . view('errors/permission/donthavepermission')
                . view('adminpage/structure/footer');
        }
    }

    public function createProduct()
    {

        //verificar si tiene permisos
        $mdlPermission = new PermissionModel();

        if ($mdlPermission->hasPermission(3)) {
            //data returned from the form
            $file = $this->request->getFile('archivo');
            $name = $this->request->getPost('nombre');
            $category = $this->request->getPost('tipo');
            $reference = $this->request->getPost('reference');

            if ($file->isValid() && !$file->hasMoved()) {
                $ext = '.' . $file->getClientExtension();
                $newName = $category . '-' . $reference . '-' . $name;
                $file->move('./public/pictures/productos/', $newName . $ext);
                $filepath = './public/pictures/productos/' . $newName . $ext;
                $Image = \Config\Services::image()->withFile($filepath);
                $width_image = $Image->getFile()->origHeight;
                $height_image = $Image->getFile()->origWidth;
                $desired_width = 500;
                $Image->reorient()->resize($desired_width, ($width_image / $height_image) * $desired_width)->save($filepath);
                $filepath1 = './public/pictures/miniatures/' . $newName . $ext;
                $desired_width = 300;
                $Image1 = \Config\Services::image()->withFile($filepath);
                $Image1->reorient()->resize($desired_width, ($width_image / $height_image) * $desired_width)->save($filepath1);

                //se crea el registro en la base de datso
                $modelProduct = new ProductModel();
                $newProduct = array(
                    'reference' => $reference,
                    'category_idcategory' => $category,
                    'name_product' => $name,
                    'active_product' => 'si',
                    'image_product' => $newName . $ext
                );

                if (!$modelProduct->where('reference', $reference)->where('category_idcategory', $category)->first()) {
                    $modelProduct->insert($newProduct);
                    return redirect()->back()->with('msg', [
                        'title' => 'Creado con Exito!',
                        'body' => "El producto se creo correcatamente con la referencia $reference y categoria $category"
                    ]);
                }
                return redirect()->back()->with('error', [
                    'title' => 'No pudo ser Creado con Exito!',
                    'body' => "El producto no se pudo crear, ya existe."
                ]);
            } else {
                return redirect()->back()->with('error', [
                    'title' => 'No pudo ser Creado con Exito!',
                    'body' => "El Archivo no es valido o ha sido movido"
                ]);
            }
        } else {
            return view('adminpage/structure/header')
                . view('adminpage/structure/navbar')
                . view('adminpage/structure/sidebar')
                . view('errors/permission/donthavepermission')
                . view('adminpage/structure/footer');
        }
    }
}
