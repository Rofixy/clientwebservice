<?php

namespace App\Controllers;

use App\Models\BarangModel;

class BarangController extends BaseController
{
    public function index()
    {
        $model = new BarangModel();
        $data['barangs'] = $model->findAll();
        return view('barang_view', $data);
    }
}
