<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class HomeController extends Controller
{
    protected $productModel;
    protected $session;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->session = session();
    }

    // Halaman menampilkan semua produk
    public function produk()
    {
        $data = [
            'title' => 'Produk',
            'products' => $this->productModel->findAll()
        ];
        return view('home/produk', $data);
    }

    // Tambah produk ke keranjang
    public function tambahKeKeranjang($id)
    {
        $produk = $this->productModel->find($id);
        if (!$produk) return redirect()->back();

        $keranjang = session()->get('keranjang') ?? [];

        $keranjang[$id] = [
            'id' => $produk['id'],
            'judul' => $produk['judul'],
            'gambar' => $produk['gambar'],
            'harga' => $produk['harga'], // ✅ Menyimpan harga
            'jumlah' => ($keranjang[$id]['jumlah'] ?? 0) + 1
        ];

        session()->set('keranjang', $keranjang);
        return redirect()->to('/home/produk')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Menampilkan isi keranjang
    public function keranjang()
    {
        $data = [
            'title' => 'Keranjang Belanja',
            'keranjang' => session()->get('keranjang') ?? []
        ];
        return view('home/keranjang', $data);
    }

    // Hapus salah satu produk dari keranjang
    public function hapusKeranjang($id)
    {
        $keranjang = session()->get('keranjang');
        unset($keranjang[$id]);
        session()->set('keranjang', $keranjang);
        return redirect()->to('/home/keranjang');
    }

    // Tambahan opsional: Hapus semua item keranjang
    public function kosongkanKeranjang()
    {
        session()->remove('keranjang');
        return redirect()->to('/home/keranjang')->with('success', 'Keranjang dikosongkan!');
    }
}
