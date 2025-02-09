<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Admin extends BaseController
{
    public function index()
    {
        // $model = new AdminModel();
        // $data['admins'] = $model->findAll(); 
        return view('admin');
    }
}
