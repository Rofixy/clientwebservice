<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    public function index()
    {
        $url = 'http://latihan-url.aksi-pintar.com/api/barang';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['barang'] = json_decode($response->getBody(), true);

            return view('tsmpil-barang',$data);
        } catch (\Exception $e) {
            return view ('tampil-barang', ['error' => $e->getMessage()]);
        }
    }
}
 