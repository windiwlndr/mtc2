<?php

namespace App\Controllers;

use App\Models\MetodeBayarModel;
use CodeIgniter\Controller;

class MetodeBayar extends Controller
{
    protected $metodeBayarModel;

    public function __construct()
    {
        $this->metodeBayarModel = new MetodeBayarModel();
    }

    public function index()
    {
        $data['metode_bayar'] = $this->metodeBayarModel->findAll();
        return view('metode_bayar', $data);
    }

    public function create()
    {
        return view('metode_bayar/create');
    }

    public function store()
    {
        $this->metodeBayarModel->save([
            'metode_bayar' => $this->request->getPost('metode_bayar'),
        ]);

        return redirect()->to('/metodebayar');
    }
}
