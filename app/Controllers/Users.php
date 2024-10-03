<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.14:8080/users/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['users'] = json_decode($response->getBody(), true);

            return view('tampil-users',$data);
        } catch (\Exception $e) {
            return view ('tampil-users', ['error' => $e->getMessage()]);
        }
    }

    public function tambahUsers()
    {
        return view ('tambah-users');
    }

    public function sendData()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'role' => $this->request->getPost('role'),
        ];

        
        $url = 'http://10.10.25.14:8080/data/store';
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
                return redirect()->to('/users')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/users')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.25.14:8080/data/update' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['users'] = json_decode($response->getBody(), true);

            if (!$data['userss']) {
                return redirect()->to('/users')->with('error', 'User tidak ditemukan.');
            }

            return view('edit-users', $data);
        } catch (\Exception $e) {
            return view('edit-users', ['error' => $e->getMessage()]);
        }
    }

    public function editUsers()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'role' => $this->request->getPost('role'),
        ];

        $url = 'http://10.10.25.14:8080/data/update';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url);

            if ($response->getStatusCode() == 200) {
                return redirect()->to('/users')->with('success', 'User berhasil diperbarui!');
            } else {
                return redirect()->to('/users')->with('error', 'Gagal memperbarui User!');
            }
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    
    public function hapus($id)
    {
        // URL API tujuan untuk menghapus data berdasarkan ID
        $url = 'http://10.10.25.14:8080/data/delete' . $id;
        $client = \Config\Services::curlrequest();

        try {
            // Kirim request DELETE untuk menghapus barang
            $response = $client->request('DELETE', $url);

            // Cek status penghapusan
            if ($response->getStatusCode() == 200) {
                return redirect()->to('/users')->with('success', 'User berhasil dihapus!');
            } else {
                return redirect()->to('/users')->with('error', 'Gagal menghapus User!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/users')->with('error', $e->getMessage());
        }
    }
}