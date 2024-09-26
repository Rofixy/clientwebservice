<?php

namespace App\Controllers;

class Barang extends BaseController
{
    public function index()
    {
        $url = 'https://latihan-url.aksi-pinter.com/api/barang';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['barang'] = json_decode($response->getBody(), true);

            // Menampilkan view 'tampil-barang' dengan data
            return view('tampil-barang', $data);
        } catch (\Exception $e) {
            // Menampilkan view dengan pesan error jika terjadi masalah
            return view('tampil-barang', ['error' => $e->getMessage()]);
        }
    }
}
