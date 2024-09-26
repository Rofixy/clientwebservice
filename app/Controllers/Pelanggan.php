<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll(); // Mengambil semua data pelanggan
        return view('pelanggan_view', $data); // Mengirim data ke view
    }
}
