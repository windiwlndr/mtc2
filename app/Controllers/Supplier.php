<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use CodeIgniter\Controller;

class Supplier extends Controller
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $model = new SupplierModel();
        $data['suppliers'] = $model->findAll(); // Ambil semua data supplier
        return view('supplier', $data);
        
    }
    

    public function save()
    {
        $this->supplierModel->save([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'nama_pj' => $this->request->getPost('nama_pj'),
            'no_tlp' => $this->request->getPost('no_tlp'),
            'alamat' => $this->request->getPost('alamat'),
            'link_supplier' => $this->request->getPost('link_supplier'),
        ]);
        return redirect()->to('/supplier');
    }
}
