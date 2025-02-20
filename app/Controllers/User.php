<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $levels = $this->userModel->getLevels();
        $admin = $this->userModel->findAll();
        $status = $this->userModel->getStatus();
        $search = $this->request->getGet('search');

        $query = $this->userModel->select('*');

        if (!empty($search)) {
            $query->like('nama', $search)
                ->orLike('username', $search)
                ->orLike('email', $search);
        }

        $data = [
            'title' => 'Kasir || Data User',
            'user' => $admin,
            'level' => $levels,
            'status' => $status,
            'search' => $search
        ];

        return view('user', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_user');
        $admin = $this->userModel->find($id);
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            'foto' => $this->request->getFile('foto'),
        ];
        // dd($admin);
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/', $newName);
            $data['foto'] = 'uploads/' . $newName;
        } else {
            $data['foto'] = $admin['foto'];
        }

        if ($this->userModel->updateUser($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to(base_url('/user'));
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
            return redirect()->to(base_url('/'));
        }
    }

    public function create()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => Time::now('Asia/Jakarta', 'Y-m-d H:i:s'),
            'foto' => $this->request->getFile('foto'),
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/', $newName);
            $data['foto'] = 'uploads/' . $newName;
        } else {
            $data['foto'] = base_url('assets/images/faces/default.jpg');
        }

        if ($this->userModel->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
            return redirect()->to(base_url('/user'))->with('success', 'Data berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data');
            return redirect()->to(base_url('/user'));
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id_user');

        if ($this->userModel->find($id)) {
            $this->userModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus!');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data! Data tidak ditemukan.');
        }

        return redirect()->to(base_url('/user'));
    }
}
