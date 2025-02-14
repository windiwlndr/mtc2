<?php

namespace App\Controllers;

use App\Models\MerkModel;
use CodeIgniter\Controller;

class Merk extends Controller
{
    protected $merkModel;

    public function __construct()
    {
        $this->merkModel = new MerkModel();
    }

    public function index()
    {
        $data['merk'] = $this->merkModel->findAll();
        return view('merk', $data);
    }

    public function create()
    {
        return view('merk/create');
    }

    public function store()
    {
        $this->merkModel->save([
            'nama_merk' => $this->request->getPost('nama_merk'),
            'link_merk' => $this->request->getPost('link_merk'),
        ]);

        return redirect()->to('/merk');
    }
}
