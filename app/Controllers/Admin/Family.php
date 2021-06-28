<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PermissionModel;
use App\Models\ReferencegroupModel;

class Family extends BaseController
{

    public function viewListProducts()
    {
        //verificar si tiene permisos
        $mdlPermission = new PermissionModel();


        if ($mdlPermission->hasPermission(11)) {
            $mdlReference = new ReferencegroupModel();

            return view('adminpage/structure/header')
                . view('adminpage/structure/navbar')
                . view('adminpage/structure/sidebar')
                . view('adminpage/contents/family', [
                    'products' => $mdlReference->findAll()
                ])
                . view('adminpage/structure/footer');
        }
    }

    public function createReference()
    {
        //verificar si tiene permisos
        $mdlPermission = new PermissionModel();

        if ($mdlPermission->hasPermission(12)) {
            //data returned from the form
            $file = $this->request->getFile('archivo');
            $name = $this->request->getPost('nombre');
            $reference = $this->request->getPost('reference');

            if ($file->isValid() && !$file->hasMoved()) {
                $ext = '.' . $file->getClientExtension();
                $newName = '1-' . $reference . '-' . $name;
                $file->move('./public/pictures/group_products/thumbnails/', $newName . $ext);
                $filepath = './public/pictures/group_products/thumbnails/' . $newName . $ext;
                $Image = \Config\Services::image()->withFile($filepath);
                $width_image = $Image->getFile()->origHeight;
                $height_image = $Image->getFile()->origWidth;
                $desired_width = 500;
                $Image->reorient()->resize($desired_width, ($width_image / $height_image) * $desired_width)->save($filepath);

                //se crea el registro en la base de datso
                $modelReferece = new ReferencegroupModel();
                $newReference = array(
                    'id_reference_group' => $reference,
                    'name_reference_group' => $name,
                    'active_reference_group' => 1,
                    'image_reference_group' => $newName . $ext,
                    'score_reference_group' => $reference,
                    'group_of_category_id_group_of_category' => 1,
                );

                if (!$modelReferece->where('id_reference_group', $reference)->where('group_of_category_id_group_of_category', 1)->first()) {
                    $modelReferece->insert($newReference);
                    return redirect()->back()->with('msg', [
                        'title' => 'Creado con Exito!',
                        'body' => "La referencia se creo correcatamente con la referencia $reference"
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
