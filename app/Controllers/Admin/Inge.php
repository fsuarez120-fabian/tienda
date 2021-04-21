<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Inge extends BaseController
{

    public function msg()
    {
        if (session()->idadministrator == '1094280366') {
            if ($this->request->getPost('pass') == '2903') {
                return view('adminpage/structure/header')
                    . view('adminpage/structure/navbar')
                    . view('adminpage/structure/sidebar')
                    . view('adminpage/contents/inge')
                    . view('adminpage/structure/footer');
            } else {
                return redirect()->route('admin_page_home');
            }
        } else {
            return redirect()->route('admin_page_home');
        }
    }
}
