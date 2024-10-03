<?php

namespace App\Controllers;

<<<<<<< HEAD
use App\Models\BarangModel;

=======
>>>>>>> origin/ro
class Barang extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        $url = 'http://latihan-url.aksi-pintar.com/api/barang';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['barang'] = json_decode($response->getBody(), true);

            return view('tsmpil-barang',$data);
        } catch (\Exception $e) {
            return view ('tampil-barang', ['error' => $e->getMessage()]);
=======
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
>>>>>>> origin/ro
        }
    }
}
 