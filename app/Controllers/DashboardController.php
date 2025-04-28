<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function adminDashboard()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'username' => $this->session->get('username'),
        ];
        return view('dashboard/admin', $data);
    }

    public function userDashboard()
    {
        $data = [
            'title' => 'User Dashboard',
            'username' => $this->session->get('username'),
        ];
        return view('dashboard/user', $data);
    }

    //monitoring user

    public function monitoring()
{
    $users = [
        ['username' => 'admin', 'role' => 'admin'],
        ['username' => 'user', 'role' => 'user']
    ];

    $data = [
        'title' => 'Monitoring User',
        'users' => $users,
        'loggedInUser' => session('username')
    ];

    return view('admin/monitoring', $data);
}

}
