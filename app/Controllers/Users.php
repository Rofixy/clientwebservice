<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.13:8080/users/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['users'] = json_decode($response->getBody(), true);

            return view('tampil-users',$data);
        } catch (\Exception $e) {
            return view ('tampil-users', ['error' => $e->getMessage()]);
        }
    }

    public function tambahusers()
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

        
        $url = 'http://10.10.25.13:8080/users/store';
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
                return redirect()->to('/users')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/users')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.25.13:8080/users/update/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['users'] = json_decode($response->getBody(), true);

            if (!$data['users']) {
                return redirect()->to('/users')->with('error', 'users tidak ditemukan.');
            }

            return view('edit-users', $data);
        } catch (\Exception $e) {
            return view('edit-users', ['error' => $e->getMessage()]);
        }
    }

    public function editusers()
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

        $url = 'http://10.10.25.13:8080/users/update/' . $this->request->getPost('id');
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
                return redirect()->to('/users')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/users')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    
    // public function hapus($id)
    // {
    //     // URL API tujuan untuk menghapus data berdasarkan ID
    //     $url = 'http://10.10.25.13:8080/users/delete/' . $id;
    //     $client = \Config\Services::curlrequest();

    //     try {
    //         // Kirim request DELETE untuk menghapus pengguna
    //         $response = $client->request('DELETE', $url);

    //         // Cek status penghapusan
    //         if ($response->getStatusCode() == 200) {
    //             return redirect()->to('/users')->with('success', 'Pelanggan berhasil dihapus!');
    //         } else {
    //             return redirect()->to('/users')->with('error', 'Gagal menghapus pengguna!');
    //         }
    //     } catch (\Exception $e) {
    //         return redirect()->to('/users')->with('error', $e->getMessage());
    //     }
    // }

    public function hapus($id)
{
    // URL API tujuan untuk menghapus data berdasarkan ID
    $url = 'http://10.10.25.13:8080/users/delete/' . $id;
    $client = \Config\Services::curlrequest();

    try {
        // Kirim request DELETE untuk menghapus pengguna
        $response = $client->delete($url);

        // Cek status penghapusan
        if ($response->getStatusCode() === 200) {
            return redirect()->to('/users')->with('success', 'Pelanggan berhasil dihapus!');
        } else {
            $errorMessage = $response->getBody() ?: 'Gagal menghapus pengguna! Silakan coba lagi.';
            return redirect()->to('/users')->with('error', $errorMessage);
        }
    } catch (\Exception $e) {
        // Tangani kesalahan ketika mengirim request ke server API
        return redirect()->to('/users')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}