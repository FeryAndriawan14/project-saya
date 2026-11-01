<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tes extends BaseController
{
    // Method untuk GET
    public function contohGet()
    {
        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Data berhasil diambil (GET)!'
        ]);
    }

    // Method untuk POST
    public function contohPost()
    {
        // Mendapatkan data dari request POST
        $data = $this->request->getPost();

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Data berhasil dikirim (POST)!',
            'data'    => $data
        ]);
    }
}