<?php
namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->users = new AuthModel();
    }
    public function index()
    {
        if (!empty(session()->get('username'))) {
            return redirect()->to('dashboard');
        }
        $data = [
            'title' => 'Login',
            'validation' => $this->validation,
        ];
        return view('login/v_login_form', $data);
    }
    public function login()
    {
        if (
            !$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi!',
                    ]
                ],
            ])
        ) {
            return redirect()->to('auth')->withInput()->with('validation', $this->validation);
        }
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $users = $this->users->where('username', $username)->first();
        // jika usernya ada
        if ($users) {
            // cek password
            if (password_verify($password, $users['password'])) {
                session()->set([
                    'username' => $users['username'],
                    'name' => $users['name'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('home');
            } else {

                session()->setFlashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Salah!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username tidak terdaftar!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->back();
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}