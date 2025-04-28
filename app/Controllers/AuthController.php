<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Hardcoded user (gunakan password_hash() untuk hasilkan hash)
        $users = [
            'admin' => [
                'username' => 'admin',
                'password' => '$2y$10$rFvCCFpQZxIIS2UPKr.hEeF.wbE1ctrO5jrNisH4ZTyzJDDNGMnwG', //123
                'role'     => 'admin'
            ],
            'user' => [
                'username' => 'user',
                'password' => '$2y$10$rFvCCFpQZxIIS2UPKr.hEeF.wbE1ctrO5jrNisH4ZTyzJDDNGMnwG', // 123
                'role'     => 'user'
            ]
        ];

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            $this->session->set([
                'username' => $users[$username]['username'],
                'role'     => $users[$username]['role'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/' . $users[$username]['role']);
        }

        return redirect()->back()->with('error', 'Login gagal. Periksa kembali username dan password.');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}
