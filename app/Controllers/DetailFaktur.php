<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\BarangModel;
use App\Models\DetailFakturModel;
use CodeIgniter\HTTP\ResponseInterface;

class DetailFaktur extends BaseController
{

    protected $supplierModel;
    protected $barangModel;
    protected $detailFakturModel;

    public function __construct()
    {

        $this->supplierModel = new SupplierModel();
        $this->barangModel = new BarangModel();
        $this->detailFakturModel = new DetailFakturModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Kasir || Detail Faktur Pembelian',
            'detailFaktur' => $this->detailFakturModel
                ->select('tb_detail_faktur.*, tb_barang.nama_barang, tb_faktur_beli.no_faktur_beli')
                ->join('tb_barang', 'tb_detail_faktur.id_barang = tb_barang.id_barang', 'left')
                ->join('tb_faktur_beli', 'tb_detail_faktur.id_faktur_beli = tb_faktur_beli.id_faktur_beli', 'left')
                ->findAll(),
            'barang' => $this->barangModel->findAll(),
            'supplier' => $this->supplierModel->findAll(),
        ];
        return view('/faktur/formaddFaktur', $data);
    }
}
