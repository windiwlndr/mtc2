<?php

namespace App\Controllers;

use App\Models\SatuanModel;
use CodeIgniter\Controller;

class Satuan extends Controller
{
    protected $satuanModel;

    public function __construct()
    {
        $this->satuanModel = new SatuanModel();
    }

    public function index()
    {
        $data['satuan'] = $this->satuanModel->findAll();
        return view('satuan', $data);

    }

    public function create()
    {
        return view('satuan/create');
    }

    public function store()
    {
        $this->satuanModel->save([
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'link_satuan' => $this->request->getPost('link_satuan'),
        ]);

        return redirect()->to('/satuan');
    }

    public function edit($id)
    {
        $data['satuan'] = $this->satuanModel->find($id);
        return view('satuan/edit', $data);
    }

    public function update($id)
    {
        $this->satuanModel->update($id, [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'link_satuan' => $this->request->getPost('link_satuan'),
        ]);

        return redirect()->to('/satuan');
    }

    public function delete($id)
    {
        $this->satuanModel->delete($id);
        return redirect()->to('/satuan');
    }
}
