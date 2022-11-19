<?php

namespace App\Controllers;

use App\Models\Balance;
use App\Models\History;

class Dashboard extends BaseController
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
		$pemasukan = $this->history->selectSum('amount', 'pemasukan')->where('id_user', user_id())->where('jenis_transaksi', 1)->first();
		$pengeluaran = $this->history->selectSum('amount', 'pengeluaran')->where('id_user', user_id())->where('jenis_transaksi', 2)->first();
		$transactionAll = $this->history->where('id_user', user_id())->findAll();
		$transactionMasuk = $this->history->where('id_user', user_id())->where('jenis_transaksi', 1)->findAll();
		$transactionKeluar = $this->history->where('id_user', user_id())->where('jenis_transaksi', 2)->findAll();


		$data = [
			'title' => 'Dashboard',
			'balance' => $this->balance->where('id_user', user_id())->first(),
			'pemasukan' => $pemasukan,
			'pengeluaran' => $pengeluaran,
			'transactionAll' => $transactionAll,
			'transactionMasuk' => $transactionMasuk,
			'transactionKeluar' => $transactionKeluar,

		];
		return view('dashboard/dashboard', $data);
	}

	public function history()
	{
		$transaction = $this->history->where('id_user', user_id())->findAll();
		$saldo = $this->balance->where('id_user', user_id())->first();
		$data = [
			'title' => 'Transaksi',
			'transaction' => $transaction,
			'saldo'			=> $saldo,
		];
		return view('dashboard/history', $data);
	}

	public function users()
	{

		$data = [
			'title' => "Users",
			'users' => $this->user->getUserData()
		];

		return view('dashboard/users', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Add New User'
		];
		return view('dashboard/create', $data);
	}

	public function add_user()
	{
		$input = $this->request->getVar();
		$user = [
			'name' => $input['nama'],
			'email' => $input['email'],
			'slug' => url_title($input['nama'], '-', true)
		];

		$this->user->insert($user);

		$balance = [
			'id_user' => $this->user->insertID(),
			'balance' => $input['balance']
		];
		$this->balance->insert($balance);

		if ($this->user->affectedRows() > 0 && $this->balance->affectedRows() > 0) {
			session()->setFlashdata('pesan', 'User has been added successfully');
			return redirect()->to('/dashboard/users');
		}
	}

	public function edit($slug)
	{
		$users = $this->user->where('slug', $slug)->first();

		$data = [
			'title' => 'Edit User',
			'user' => $users
		];
		return view('dashboard/edit', $data);
	}

	public function update()
	{
		$input = $this->request->getVar();
		$user = [
			'name' => $input['nama'],
			'email' => $input['email'],
			'id' => $input['id']
		];

		$this->user->save($user);

		if ($this->user->affectedRows() > 0) {
			session()->setFlashdata('pesan', 'User berhasil di updates');
			return redirect()->to('/dashboard/users');
		}
	}

	public function delete($slug)
	{
		$id = $this->user->select('id')->where('slug', $slug)->first();
		$this->balance->where('id_user', $id['id'])->delete();
		$this->user->where('slug', $slug)->delete();
		if ($this->user->affectedRows() > 0) {
			session()->setFlashdata('pesan', 'User berhasil di hapus');
			return redirect()->to('/dashboard/users');
		}
	}
	public function profile()
	{

		$data = [
			'title' => 'Profile',
			'user' => $this->user->where('id', user_id())->first()
		];

		return view('dashboard/profile', $data);
	}

	public function editUser($id)
	{
		$users = $this->user->where('id', user_id())->first();

		$data = [
			'title' => 'Edit User',
			'user' => $users
		];
		return view('dashboard/profile', $data);
	}

	public function updateUser()
	{
		$input = $this->request->getVar();
		$user = [
			'id' => user_id(),
			'email' => $input['email'],
			'username' => $input['username'],
			'name' => $input['name'],
		];

		$this->user->save($user);


		if ($this->user->affectedRows() > 0) {
			session()->setFlashdata('pesan', 'User berhasil di updates');
			return redirect()->to('/dashboard/profile');
		}
	}
}
