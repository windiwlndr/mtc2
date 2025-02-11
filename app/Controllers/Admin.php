<?php

namespace App\Controllers;

use App\Models\userModel;

class Admin extends BaseController
{
    public function index()
    {
        $pasienModel = new userModel();
        $data = [
            'user' => $pasienModel->findAll()
        ];
        return view('/admin', $data);
    }
}
