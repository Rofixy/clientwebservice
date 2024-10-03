<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.10:8080/transaksi/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['transaksi'] = json_decode($response->getBody(), true);

            return view('tampil-transaksi',$data);
        } catch (\Exception $e) {
            return view ('tampil-transaksi', ['error' => $e->getMessage()]);
        }
    }
}