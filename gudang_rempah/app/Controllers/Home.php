<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;

class Home extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index(): string
    {
        $kategoriModel = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Home',
            'nama_menu' => 'Produk',
            'kategori' => $kategoriModel,
            'menu' => 'home'

        ];
        return view('home', $data);
    }
    public function kategori($id = false)
    {
        $kategoriModel = $this->kategoriModel->findAll();
        if ($id == 1) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Bahan Utama & Pelengkap',
                'nama' => 'KAPULAGA HIJAU',
                'gambar' => 'kategori1.png',
                'deskripsi' => 'Kapulaga adalah jenis rempah yang sering digunakan sebagai penambah rasa serta aroma karena memiliki bau khas yang kuat Rempah ini diketahui berasal dari India dan kini telah tersebar ke berbagai penjuru dunia.',
                'kategori' => $kategoriModel,
                'produk' => $produk,
                'nama_menu' => 'Bahan Utama & Pelengkap',
                'menu' => 'produk'
            ];

            return view('produk', $data);
        } elseif ($id == 2) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Biji & Bunga Kering',
                'nama' => 'ROSELA MERAH',
                'gambar' => 'kategori2.png',
                'deskripsi' => 'Rosella Tea (Hibiscus sabdariffa) adalah spesies bunga yang berasal dari benua Afrika. Ada 2 jenis Rosella yang dibudidayakan. Merah dan Unggu. Merah lebih superior di aroma dan lebih Asam. Unggu Asam lebih rendah warna gelap baik bunga maupun hasil seduhan.',
                'kategori' => $kategoriModel,
                'produk' => $produk,
                'nama_menu' => 'Biji & Bunga Kering',
                'menu' => 'produk'
            ];

            return view('produk', $data);
        } elseif ($id == 3) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Makanan Ringan',
                'nama' => 'NORI TABUR',
                'gambar' => 'kategori3.png',
                'deskripsi' => 'Nori tabur, sahabat terbaik dalam piring lezatmu!
                NORIGO menghadirkan nori tabur dgn potongan rumput laut panggang beraneka rasa dgn taburan rice noodle, biji wijen, bawang merah, dan minyak wijen yang digunakan sbg taburan toping pelengkap nikmat makanan lezatmu.',
                'kategori' => $kategoriModel,
                'produk' => $produk,
                'nama_menu' => 'Makanan Ringan',
                'menu' => 'produk'
            ];

            return view('produk', $data);
        } elseif ($id == 4) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Daun Kering',
                'nama' => 'DAUN UNGU',
                'gambar' => 'kategori4.png',
                'deskripsi' => 'Beberapa penelitian yang mengambil ekstrak daun ungu atau Graptophyllum pictum menyatakan adanya berbagai zat yang memiliki efek antioksidan di dalam tanaman ini, termasuk flavonol, tannin, coumarin, dan saponin. Kombinasi zat ini diyakini mampu mengatasi peradangan dan melunakkan tinja pada masalah penyakit Ambeien /wasir.',
                'kategori' => $kategoriModel,
                'produk' => $produk,                
                'nama_menu' => 'Daun Kering',
                'menu' => 'produk'
            ];

            return view('produk', $data);
        } elseif ($id == 5) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Minuman Instan',
                'nama' => 'JAHE MERAH GULA AREN',
                'gambar' => 'kategori5.png',
                'deskripsi' => '100% Dijamin Asli terbuat dari bahan alami tanpa pengawet dan bahan kimia lainnya. Minuman Sebuk Jahe Merah Gula Aren Dibuat dari rempah-rempah pilihan berkualitas yang diproses secara higienis dengan mesin modern yang membuat Jahe Merah Gula Aren rasanya Harum, Nikmat, Istimewa, Dan Bermanfaat.',
                'kategori' => $kategoriModel,
                'produk' => $produk,
                'nama_menu' => 'Minuman Instan',
                'menu' => 'produk'
            ];
            return view('produk', $data);
        } elseif ($id == 6) {
            $produk = $this->produkModel->where(['id_kategori' => $id])->findAll();
            $data = [
                'title' => 'Kesehatan',
                'nama' => 'KUNYIT KERING',
                'gambar' => 'kategori6.png',
                'deskripsi' => 'Kunyit kering/Dried turmeric biasa di gunakan sebagai bumbu,pewarna alami,atau sebagai minuman tradisional.',
                'kategori' => $kategoriModel,
                'produk' => $produk,
                'nama_menu' => 'Kesehatan',
                'menu' => 'produk'
            ];
            return view('produk', $data);
        }
    }
}
