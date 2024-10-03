<?php

namespace App\Controllers;

///use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.22:8080/pelanggan/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['pelanggan'] = json_decode($response->getBody(), true);

            return view('pelanggan',$data);
        } catch (\Exception $e) {
            return view ('pelanggan', ['error' => $e->getMessage()]);
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

        $url = 'http://10.10.25.22:8080/pelanggan/store';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        //print_r($response);

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
        $url = 'http://10.10.25.22:8080/pelanggan/show/' . $id;
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

        /* $url = 'http://10.10.25.22:8080/pelanggan/update/' . $this->request->getPost('id');
        $client = \Config\Services::curlrequest();

        $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url); */
        $url = 'http://10.10.25.22:8080/pelanggan/update/' . $this->request->getPost('id');
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        //print_r($response);

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

    public function hapus($id)
    {
        // URL API tujuan untuk menghapus data berdasarkan ID
        $url = 'http://10.10.25.22:8080/pelanggan/delete/' . $id;
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
    }

}