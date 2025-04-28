<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    protected $productModel;
    protected $session;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Produk',
            'products' => $this->productModel->findAll()
        ];
        return view('product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $this->productModel->save([
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'harga' => $this->request->getPost('harga'), // ✅ tambahkan harga
            'gambar' => $fileName
        ]);

        return redirect()->to('/admin/produk');
    }

    public function edit($id)
    {
        $data['produk'] = $this->productModel->find($id);
        return view('product/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'harga' => $this->request->getPost('harga') // ✅ tambahkan harga
        ];

        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->productModel->update($id, $data);
        return redirect()->to('/admin/produk');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/admin/produk');
    }
}
