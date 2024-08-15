<?php

namespace App\Controllers;

use App\Models\AuthModel;



class Auth extends BaseController
{
    protected $Model_Auth;

    public function __construct()
    {
        helper('form');
        $this->Model_Auth = new AuthModel();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'name' => [
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi !'
                ]
            ],
        ])) {
            // jika valid
            $email = $this->request->getPost('name');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Auth->login($email, $password);
            if ($cek) {
                //jika cocok
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('name', $cek['username']);
                session()->set('password', $cek['password']);

                return redirect()->to(base_url('kelola_produk'));

            } else {
                //jika email dan password tidak valid
                session()->setFlashdata('pesanlogin', 'Username atau Password salah!');
                return redirect()->to(base_url('/login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errorslogin', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
