<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdministratorModel;
use App\Models\CityModel;
use App\Models\OrderdetailsModel;
use App\Models\OrderModel;
use App\Models\PermissionModel;

class Home extends BaseController
{
    public function index()
    {
        return view('adminpage/structure/header')
            . view('adminpage/structure/navbar')
            . view('adminpage/structure/sidebar')
            . view('adminpage/contents/home')
            . view('adminpage/structure/footer');
    }

    public function login()
    {
        if (session()->is_logged) {
            return redirect()->route('admin_page_home');
        } else {
            return view('adminpage/structure/header')
                . view('adminpage/contents/login')
                . view('adminpage/structure/footer');
        }
    }

    public function checklogin()
    {
        //dd($this->request->getPost());
        if (!$this->validate([
            'user' => 'required|integer',
            'password' => 'required'
        ])) {
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        //trim elimina espacios de cadena
        $user = trim($this->request->getPost('user'));
        $password = trim($this->request->getPost('password'));

        //modelo
        $modAdmin = new AdministratorModel();

        if (!$user = $modAdmin->getAdministratorBy('idadministrator', $user)) {
            return redirect()->back()
                ->with('msg', [
                    'body' => 'Este usuario no se encuentra registrado en el sistema'
                ])->withInput();
        }

        if (!($password == $user['password_admin'])) {
            return redirect()->back()
                ->with('msg', [
                    'body' => 'Credeciales invalidas'
                ])->withInput();
        }
        $mdlPermission = new PermissionModel();

        if ($mdlPermission->hasPermission(1,$user['idadministrator'])) {
            session()->set([
                'idadministrator' => $user['idadministrator'],
                'admin_name' => $user['name_admin'],
                'is_logged' => true,
                'admin_surname' =>  $user['surname_admin'],
                'admin_image' =>  $user['image_admin']
            ]);
            return redirect()->route('admin_page_home');
        }else{
            return redirect()->back()
            ->with('msg', [
                'body' => 'No tienes permisos para entrar al modulo administrativo.'
            ])->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('admin_page_login');
    }
}
