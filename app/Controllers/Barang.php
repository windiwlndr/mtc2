<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        $model = new BarangModel();
        $data['barang'] = $model->findAll();
        
        return view('barang', $data);
    }
}

?>
