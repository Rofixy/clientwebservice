<?php

namespace App\Controllers;

<<<<<<< HEAD
///use App\Models\PelangganModel;

=======
>>>>>>> origin/ro
class Pelanggan extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $url = 'http://10.10.25.10:8080/pelanggan/data';
=======
        $url = 'http://10.10.25.14:8080/pelanggan/data';
>>>>>>> origin
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['pelanggan'] = json_decode($response->getBody(), true);

            return view('pelanggan',$data);
        } catch (\Exception $e) {
            return view ('pelanggan', ['error' => $e->getMessage()]);
=======
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
>>>>>>> origin/ro
        }
    }

    public function tambahPelanggan()
    {
        return view('input-pelanggan');
    }

    public function sendData()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $url = 'http://10.10.25.14:8080/pelanggan/data';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/pelanggan')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/pelanggan')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.25.14:8080/pelanggan/data' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['pelanggan'] = json_decode($response->getBody(), true);

            if (!$data['pelanggan']) {
                return redirect()->to('/pelanggan')->with('error', 'Pelanggan tidak ditemukan.');
            }

            return view('edit-pelanggan', $data);
        } catch (\Exception $e) {
            return view('edit-pelanggan', ['error' => $e->getMessage()]);
        }
    }

    public function editPelanggan()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $url = 'http://10.10.25.14:8080/pelanggan/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil diperbarui!');
            } else {
                return redirect()->to('/pelanggan')->with('error', 'Gagal memperbarui pelanggan!');
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function hapus($id)
    {
        // URL API tujuan untuk menghapus data berdasarkan ID
        $url = 'http://10.10.25.14:8080/pelanggan/data' . $id;
        $client = \Config\Services::curlrequest();

        try {
            // Kirim request DELETE untuk menghapus barang
            $response = $client->request('DELETE', $url);

            // Cek status penghapusan
            if ($response->getStatusCode() == 200) {
                return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil dihapus!');
            } else {
                return redirect()->to('/pelanggan')->with('error', 'Gagal menghapus pelanggan!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/pelanggan')->with('error', $e->getMessage());
        }
=======
use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    public function index()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll(); // Mengambil semua data pelanggan
        return view('pelanggan_view', $data); // Mengirim data ke view
>>>>>>> 774f263 (perubahan pada pelanggan)
    }
}
