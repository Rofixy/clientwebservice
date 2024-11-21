<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.15.76:8080/transaksi/view';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['transaksi'] = json_decode($response->getBody(), true);

            return view('tampil-transaksi',$data);
        } catch (\Exception $e) {
            return view ('tampil-transaksi', ['error' => $e->getMessage()]);
        }
    }

    public function tambahtransaksi()
    {
        return view('input-transaksi');
    }

    public function sendData()
    {
        $data = [
            'no_invoice'   => $this->request->getPost('no_invoice'),
            'kd_user'      => $this->request->getPost('kd_user'),
            'kd_pelanggan' => $this->request->getPost('kd_pelanggan'),
            'tgl_mulai'    => $this->request->getPost('tgl_mulai'),
            'tgl_kembali'  => $this->request->getPost('tgl_kembali'),
            'status'       => $this->request->getPost('status'),
            'keterangan'   => $this->request->getPost('keterangan'),
        ];
        

        $url = 'http://10.10.15.76:8080/transaksi/create';
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
                return redirect()->to('/transaksi')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/transaksi')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.15.76:8080/transaksi/show/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['transaksi'] = json_decode($response->getBody(), true);

            if (!$data['transaksi']) {
                return redirect()->to('/transaksi')->with('error', 'transaksi tidak ditemukan.');
            }

            return view('edit-transaksi', $data);
        } catch (\Exception $e) {
            return view('edit-transaksi', ['error' => $e->getMessage()]);
        }
    }

    public function edittransaksi()
    {
        $data = [
            'no_invoice'   => $this->request->getPost('no_invoice'),
            'kd_user'      => $this->request->getPost('kd_user'),
            'kd_pelanggan' => $this->request->getPost('kd_pelanggan'),
            'tgl_mulai'    => $this->request->getPost('tgl_mulai'),
            'tgl_kembali'  => $this->request->getPost('tgl_kembali'),
            'status'       => $this->request->getPost('status'),
            'keterangan'   => $this->request->getPost('keterangan'),
        ];
        

        /* $url = 'http://10.10.15.76:8080/transaksi/update/' . $this->request->getPost('id');
        $client = \Config\Services::curlrequest();

        $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url); */
        $url = 'http://10.10.15.76:8080/transaksi/update/' . $this->request->getPost('id');
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
                return redirect()->to('/transaksi')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/transaksi')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function hapus($id)
    {
        // URL API tujuan untuk menghapus data berdasarkan ID
        $url = 'http://10.10.15.76:8080/transaksi/delete/' . $id;
        $client = \Config\Services::curlrequest();

        try {
            // Kirim request DELETE untuk menghapus barang
            $response = $client->request('DELETE', $url);

            // Cek status penghapusan
            if ($response->getStatusCode() == 200) {
                return redirect()->to('/transaksi')->with('success', 'transaksi berhasil dihapus!');
            } else {
                return redirect()->to('/transaksi')->with('error', 'Gagal menghapus transaksi!');
            }
        } catch (\Exception $e) {
            return redirect()->to('/transaksi')->with('error', $e->getMessage());
        }
    }
}