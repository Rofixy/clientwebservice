<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        // URL endpoint untuk mendapatkan data transaksi
        $url = 'http://10.10.25.10:8080/pelanggan/data';
        $client = \Config\Services::curlrequest(); // Pastikan baris ini benar

        try {
            // Melakukan request GET ke URL
            $response = $client->request('GET', $url);

            // Mengambil data transaksi dari response JSON
            $data['pelanggan'] = json_decode($response->getBody(), true);

            // Mengirim data ke view 'tampil-transaksi'
            return view('tampil-pelanggan', $data);
        } catch (\Exception $e) {
            // Jika ada error, tampilkan view dengan pesan error
            return view('tampil-pelanggan', ['error' => $e->getMessage()]);
        }
    }
}
