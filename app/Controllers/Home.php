<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->userModel = new UserModel();
    }
    public function index(): string
    {
        $data =[
            'title' => 'Kasir || Dashboard',
            'barang' => $this->barangModel->findAll(),
            'jumlahBarang' => $this->barangModel->countAllResults(),    
            'jumlahStok' => $this->barangModel->selectSum('stok')->first(),
            'jumlahUser' => $this->userModel->selectSum('id_user')->countAllResults(),      

        ];

        return view('home', $data);
    }
}
