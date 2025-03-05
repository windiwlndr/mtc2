<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\MerkModel;
use App\Models\SatuanModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use Picqer\Barcode\BarcodeGeneratorPNG;

class Barang extends Controller
{
    protected $barangModel;
    protected $satuanModel;
    protected $merkModel;
    protected $kategoriModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->satuanModel = new SatuanModel();
        $this->kategoriModel = new KategoriModel();
        $this->merkModel = new MerkModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Kasir || Data Barang',
            'barang' => $this->barangModel
                ->select('tb_barang.*, tb_satuan.nama_satuan, tb_kategori.nama_kategori')
                ->join('tb_satuan', 'tb_barang.id_satuan = tb_satuan.id_satuan', 'left')
                ->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori', 'left')
                ->findAll(),
            'satuan' => $this->satuanModel->findAll(),
            'kategori' => $this->kategoriModel->findAll(),
            'merk' => $this->merkModel->findAll(),
        ];
        return view('barang', $data);
    }

    public function create()
    {

        $barcode = $this->request->getPost('barcode');
        if (empty($barcode)) {
            $barcode = rand(1000000000, 999999999999);
        }

        $data = [
            'barcode' => $barcode,
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_merk' => $this->request->getPost('id_merk'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual_normal' => $this->request->getPost('harga_jual_normal'),
            'harga_jual_lv1' => $this->request->getPost('harga_jual_lv1'),
            'harga_jual_lv2' => $this->request->getPost('harga_jual_lv2'),
            'harga_jual_lv3' => $this->request->getPost('harga_jual_lv3'),
            'harga_jual_lv4' => $this->request->getPost('harga_jual_lv4'),
            'min_jual_lv1' => $this->request->getPost('min_jual_lv1'),
            'min_jual_lv2' => $this->request->getPost('min_jual_lv2'),
            'min_jual_lv3' => $this->request->getPost('min_jual_lv3'),
            'min_jual_lv4' => $this->request->getPost('min_jual_lv4'),
            'harga_jual_member' => $this->request->getPost('harga_jual_member'),
            'expired_barang' => $this->request->getPost('expired_barang'),
            'tgl_entri_awal' => $this->request->getPost('tgl_entri_awal'),
            'rak_barang' => $this->request->getPost('rak_barang'),
            'tab_rak' => $this->request->getPost('tab_rak'),
            'diskon_jual' => $this->request->getPost('diskon_jual'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/', $newName);
            $data['foto'] = 'uploads/' . $newName;
        } else {
            $data['foto'] = 'assets/images/faces/default.jpg';
        }

        if ($this->barangModel->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('/barang'))->with('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data');
            return redirect()->to(base_url('/barang'));
        }
    }


    public function update()
    {
        $id = $this->request->getPost('id_barang');
        $barang = $this->barangModel->find($id);
        $data = [
            'barcode' => $this->request->getPost('barcode'),
            'nama_barang' => $this->request->getPost('nama_barang'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_merk' => $this->request->getPost('id_merk'),
            'stok' => $this->request->getPost('stok'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual_normal' => $this->request->getPost('harga_jual_normal'),
            'harga_jual_lv1' => $this->request->getPost('harga_jual_lv1'),
            'harga_jual_lv2' => $this->request->getPost('harga_jual_lv2'),
            'harga_jual_lv3' => $this->request->getPost('harga_jual_lv3'),
            'harga_jual_lv4' => $this->request->getPost('harga_jual_lv4'),
            'min_jual_lv1' => $this->request->getPost('min_jual_lv1'),
            'min_jual_lv2' => $this->request->getPost('min_jual_lv2'),
            'min_jual_lv3' => $this->request->getPost('min_jual_lv3'),
            'min_jual_lv4' => $this->request->getPost('min_jual_lv4'),
            'harga_jual_member' => $this->request->getPost('harga_jual_member'),
            'expired_barang' => $this->request->getPost('expired_barang'),
            // 'tgl_entri_awal' => $this->request->getPost('tgl_entri_awal'),
            'rak_barang' => $this->request->getPost('rak_barang'),
            'tab_rak' => $this->request->getPost('tab_rak'),
            'diskon_jual' => $this->request->getPost('diskon_jual'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/', $newName);
            $data['foto'] = 'uploads/' . $newName;
        } else {
            $data['foto'] = $barang['foto'];
        }

        if ($this->barangModel->updateBarang($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/barang'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_barang');

        if ($this->barangModel->find($id)) {
            $this->barangModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/barang'));
    }

    public function showBarcode($id_barang)
    {
        $barang = $this->barangModel->find($id_barang);

        if (!$barang) {
            session()->setFlashdata('error', 'Barcode tidak ditemukan');
        }

        return view('barang/barcode', ['b' => $barang]);
    }


    public function generateBarcode($kode)
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode($kode, $generator::TYPE_CODE_128);

        // header('Content-Type: image/png');
        echo $barcode;
    }


}
