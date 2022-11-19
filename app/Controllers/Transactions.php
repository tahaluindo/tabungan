<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Balance;
use App\Models\History;
use CodeIgniter\I18n\Time;
use DateTime;

class Transactions extends BaseController
{

    protected $balance;
    protected $history;
    protected $user;

    public function __construct()
    {
        $this->balance = new Balance();
        $this->history = new History();
        $this->user = new \Myth\Auth\Models\UserModel();
    }

    public function index()
    {
        return redirect()->to(base_url('dashboard/history'));
    }

    public function setor()
    {
        $validation = [
            'nominal' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nominal harus diisi',
                    'numeric' => 'Nominal harus berupa angka'
                ]
            ]
        ];

        if (!$this->validate($validation)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('dashboard/history'));
        }

        $input = $this->request->getVar();
        $data = [
            'id_history'    => uniqid(),
            'id_user'       => user_id(),
            'amount'       => $input['nominal'],
            'jenis_transaksi'          => 1,
            'status'        => 2,
            'tanggal'       => Time::now(),
        ];
        // dd($data);

        $user = $this->balance->where('id_user', user_id())->first();
        $new_balance = $user->balance + $input['nominal'];

        $updateBalance = [
            'id'    => $user['id'],
            'balance'   => $new_balance,
        ];

        if (!$this->balance->save($updateBalance)) {
            session()->setFlashdata('error', 'Gagal Menambah Saldo!');
            return redirect()->to(base_url('dashboard/history'));
        }

        if (!$this->history->save($data)) {
            session()->setFlashdata('error', 'Gagal Membuat Transaksi!');
            return redirect()->to(base_url('dashboard/history'));
        }

        session()->setFlashdata('success', 'Setoran Berhasil Diterima!');
        return redirect()->to(base_url('dashboard/history'));
    }

    public function tarik()
    {
        $validation = [
            'nominal' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nominal harus diisi',
                    'numeric' => 'Nominal harus berupa angka'
                ]
            ]
        ];

        if (!$this->validate($validation)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to(base_url('dashboard/history'));
        }

        $input = $this->request->getVar();


        $user = $this->balance->where('id_user', user_id())->first();
        $new_balance = $user->balance - $input['nominal'];

        if ($new_balance < 0) {
            session()->setFlashdata('error', 'Saldo Tidak Mencukupi!');
            return redirect()->to(base_url('dashboard/history'));
        }

        $updateBalance = [
            'id'        => $user['id'],
            'balance'   => $new_balance,
        ];

        if (!$this->balance->save($updateBalance)) {
            session()->setFlashdata('error', 'Gagal Menambah Saldo!');
            return redirect()->to(base_url('dashboard/history'));
        }

        $data = [
            'id_history'    => uniqid(),
            'id_user'       => user_id(),
            'amount'        => $input['nominal'],
            'jenis_transaksi' => 2,
            'status'        => 2,
            'tanggal'       => Time::now(),
        ];
        // dd($data);

        if (!$this->history->save($data)) {
            session()->setFlashdata('error', 'Gagal Membuat Transaksi!');
            return redirect()->to(base_url('dashboard/history'));
        }

        session()->setFlashdata('success', 'Setoran Berhasil Diterima!');
        return redirect()->to(base_url('dashboard/history'));
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Keuangan',
            'active' => 'laporan',
            'transaction' => $this->history->where('id_user', user_id())->findAll(),
            'balance'   => $this->balance->where('id_user', user_id())->first(),
            'tanggal'   => date('d-m-Y'),
        ];

        return view('dashboard/laporan', $data);
    }
}
