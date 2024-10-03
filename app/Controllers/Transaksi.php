<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class TransaksiController extends BaseController
{
    public function index()
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->findAll();
        return view('transaksi_view', $data);
    }

    public function create()
    {
        return view('transaksi_create');
    }
   
    public function store()
    {
        $model = new TransaksiModel();

        $data = [
            'no_invoice'  => $this->request->getPost('no_invoice'),
            'kd_user'     => $this->request->getPost('kd_user'),
            'kd_pelanggan'=> $this->request->getPost('kd_pelanggan'),
            'tgl_mulai'   => $this->request->getPost('tgl_mulai'),
            'tgl_kembali' => $this->request->getPost('tgl_kembali'),
            'status'      => $this->request->getPost('status'),
            'keterangan'  => $this->request->getPost('keterangan'),
            'created_id'  => $this->request->getPost('created_id')
        ];

        $model->insert($data);

        return redirect()->to('/transaksi');
    }

    public function edit($id)
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->find($id);
        
        return view('transaksi_edit', $data);
    }

    public function update($id)
    {
        $model = new TransaksiModel();

        $data = [
            'no_invoice'  => $this->request->getPost('no_invoice'),
            'kd_user'     => $this->request->getPost('kd_user'),
            'kd_pelanggan'=> $this->request->getPost('kd_pelanggan'),
            'tgl_mulai'   => $this->request->getPost('tgl_mulai'),
            'tgl_kembali' => $this->request->getPost('tgl_kembali'),
            'status'      => $this->request->getPost('status'),
            'keterangan'  => $this->request->getPost('keterangan'),
            'created_id'  => $this->request->getPost('created_id')
        ];

        $model->update($id, $data);

        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $model = new TransaksiModel();
        $model->delete($id);
        
        return redirect()->to('/transaksi');
    }
}
