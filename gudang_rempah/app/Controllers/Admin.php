<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;

class Admin extends BaseController
{
    protected $produkModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
    }
    public function index()
    {
        $produkModel = $this->produkModel->findAll();
        $data = [
            'title' => 'Kelola Produk',
            'menu' => 'dashboard',
            'produk' => $produkModel
        ];
        return view('admin/kelolaProduk', $data);
    }
    public function tambah_produk()
    {
        $kategoriModel = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Tambah Produk',
            'menu' => 'dashboard',
            'kategori'=>$kategoriModel

        ];
        return view('admin/tambahProduk', $data);
    }
    public function save_produk()
    {
        $harga = $this->request->getVar('harga');
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,3048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/jpe]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 3MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'extension gambar tidak support'
                ]
            ],
            'nama_produk' => [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong !',
                    'is_unique' => 'Nama produk sudah pernah ditambahkan !'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong !',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong !',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori tidak boleh kosong !',
                ]
            ],
        ])) {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/tambah_produk')->withInput();
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            $this->produkModel->save([
                'foto_produk' => $namaGambar,
                'nama_produk' => $this->request->getVar('nama_produk'),
                'harga' => $harga,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'id_kategori' => $this->request->getVar('kategori'),
            ]);
            session()->setFlashdata('pesan', 'berhasil menambah produk baru');
            return redirect()->to('/kelola_produk');
        }
    }
    public function edit_produk($id = false)
    {
        $produk = $this->produkModel->where(['id_produk' => $id])->first();
        $kategori = $this->kategoriModel->findAll();
        $data = [
            'title' => 'Edit Produk',
            'menu' => 'manajemen',            
            'produk' => $produk,
            'kategori' => $kategori,
        ];
        return view('admin/editProduk', $data);
    }
    public function simpan_edit()
    {
        $produkModel = new ProdukModel();
        $namaGambar = $this->request->getVar('gambarLama');
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        } else {

            $namaGambar = $namaGambar;
        }

        $dataToUpdate = array(
            'foto_produk' => $namaGambar,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('kategori'),
            'foto_produk' => $namaGambar,
        );        
        $produkModel->update($this->request->getPost('id_produk'), $dataToUpdate);
        session()->setFlashdata('pesan', 'Produk berhasil di edit');
        return redirect()->to('/kelola_produk');
    }
    public function hapus_produk($id = false)
    {        
        $produk = $this->produkModel->find($id);
        if (!$produk) {            
            return redirect()->to('/kelola_produk');
        }
        $gambarPath =  unlink('img/' . $produk['foto_produk']);
        if (file_exists($gambarPath)) {
            $gambarPath;
        }
        $this->produkModel->delete($id);
        session()->setFlashdata('pesan', 'Produk berhasil dihapus');
        return redirect()->to('/kelola_produk');
    }
}
