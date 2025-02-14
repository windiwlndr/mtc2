<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->findAll();

        return view('user', $data);
    }
}
