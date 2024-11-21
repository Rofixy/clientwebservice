<?php

namespace App\Controllers;

use CodeIgniter\HTTP\CURLRequest;

class ContohCurl extends BaseController
{
    public function index()
    {
        // URL API untuk mengambil semua data barang
        $url = 'https://latihan-url.aksi-pintar.com/api/barang';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['barang'] = json_decode($response->getBody(), true);

            return view('tampil-barang', $data);
        } catch (\Exception $e) {
            return view('tampil-barang', ['error' => $e->getMessage()]);
        }
    }

    public function tambahBarang()
    {
        return view('input-barang');
    }

    public function sendData()
    {
        $data = [
            'image' => 'no-image.jpg',
            'kd_barang' => $this->request->getPost('kd_barang'),
            'nama' => $this->request->getPost('nama'),
            'merek' => $this->request->getPost('merek'),
            'kd_user' => 1,
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $url = 'https://latihan-url.aksi-pintar.com/api/tambah-barang';
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
                return redirect()->to('/barang')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/barang')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'https://latihan-url.aksi-pintar.com/api/edit-barang/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['barang'] = json_decode($response->getBody(), true);

            if (!$data['barang']) {
                return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan.');
            }

            return view('edit-barang', $data);
        } catch (\Exception $e) {
            return view('edit-barang', ['error' => $e->getMessage()]);
        }
    }

    public function editBarang()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'kd_barang' => $this->request->getPost('kd_barang'),
            'image' => $this->request->getPost('image'),
            'nama' => $this->request->getPost('nama'),
            'merek' => $this->request->getPost('merek'),
            'kd_user' => $this->request->getPost('kd_user'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
        ];

        $url = 'https://latihan-url.aksi-pintar.com/api/update-barang';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/barang')->with('success', 'Barang berhasil diperbarui!');
            } else {
                return redirect()->to('/barang')->with('error', 'Gagal memperbarui barang!');
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function hapus($id)
    {
        // URL API tujuan untuk menghapus data berdasarkan ID
        $url = 'https://latihan-url.aksi-pintar.com/api/hapus-barang/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            // Kirim request DELETE untuk menghapus barang
            $response = $client->request('DELETE', $url);

            // Cek status penghapusan
            if ($response->getStatusCode() == 200) {
                return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus!');
            } else {
                return redirect()->to('/barang')->with('error', 'Gagal menghapus barang!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/barang')->with('error', $e->getMessage());
        }
    }
}