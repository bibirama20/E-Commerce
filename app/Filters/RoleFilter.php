<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Belum login
        if (! $session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        // Role tidak cocok
        if ($arguments && $session->get('role') !== $arguments[0]) {
            // Redirect ke dashboard sesuai role
            return redirect()->to('/' . $session->get('role'));
        }

        // Jika cocok, biarkan lanjut
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu digunakan dalam kasus ini
    }
}
