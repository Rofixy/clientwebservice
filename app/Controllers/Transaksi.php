<?php

namespace App\Controllers;

<<<<<<< HEAD
use App\Models\TransaksiModel;

=======
>>>>>>> origin/ro
class Transaksi extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        $url = 'http://10.10.25.10:8080/transaksi/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['transaksi'] = json_decode($response->getBody(), true);

            return view('tampil-transaksi',$data);
        } catch (\Exception $e) {
            return view ('tampil-transaksi', ['error' => $e->getMessage()]);
=======
        // URL endpoint untuk mendapatkan data transaksi
        $url = 'http://10.10.25.10:8080/transaksi/data';
        $client = \Config\Services::curlrequest(); // Pastikan baris ini benar

        try {
            // Melakukan request GET ke URL
            $response = $client->request('GET', $url);

            // Mengambil data transaksi dari response JSON
            $data['transaksi'] = json_decode($response->getBody(), true);

            // Mengirim data ke view 'tampil-transaksi'
            return view('tampil-transaksi', $data);
        } catch (\Exception $e) {
            // Jika ada error, tampilkan view dengan pesan error
            return view('tampil-transaksi', ['error' => $e->getMessage()]);
>>>>>>> origin/ro
        }
    }
}
