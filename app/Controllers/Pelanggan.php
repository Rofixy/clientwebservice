<?php

namespace App\Controllers;

///use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.10:8080/pelanggan/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['pelanggan'] = json_decode($response->getBody(), true);

            return view('pelanggan',$data);
        } catch (\Exception $e) {
            return view ('pelanggan', ['error' => $e->getMessage()]);
        }
    }
}
