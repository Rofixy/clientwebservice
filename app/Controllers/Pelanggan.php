<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
<<<<<<< HEAD
        $data['pelanggan'] = $model->findAll();
        return view('pelanggan_view', $data); 
=======
        $data['pelanggan'] = $model->findAll(); // Mengambil semua data pelanggan
        return view('pelanggan_view', $data); // Mengirim data ke view
>>>>>>> 774f263c2a98565bfdc2ef9ccaa403771712d4df
    }
}
