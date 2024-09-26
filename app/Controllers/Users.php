<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    public function index()
    {
        $url = 'http://10.10.25.10:8080/users/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['users'] = json_decode($response->getBody(), true);

            return view('tampil-users',$data);
        } catch (\Exception $e) {
            return view ('tampil-users', ['error' => $e->getMessage()]);
        }
    }
}
