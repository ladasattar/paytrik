<?php

class Menu extends Controller {
	public function __construct()
	{
		if (!isset($_SESSION['user_online']['id'])) {
			header('Location:' . BASEURL);
		}
	}

	public function customer()
	{
		$data['login'] = $this->model('Login_model')->getData();
		$data['customer'] = $this->model('Customer_model')->getAllCustomer();
		$data['tarif'] = $this->model('Customer_model')->getAllTarif();
		$data['title'] = 'Pelanggan - Paytrik';
		$data['header'] = 'Pelanggan';
		$this->view('templates/header', $data);
		$this->view('customer/index', $data);
		$this->view('templates/footer');
	}

	public function tarif()
	{
		$data['login'] = $this->model('Login_model')->getData();
		$data['tarif'] = $this->model('Tarif_model')->getAllTarif();
		$data['title'] = 'Tarif - Paytrik';
		$data['header'] = 'Tarif';
		$this->view('templates/header', $data);
		$this->view('tarif/index', $data);
		$this->view('templates/footer');
	}

	public function tagihan()
	{
		$data['login'] = $this->model('Login_model')->getData();
		$data['tagihan'] = $this->model('Tagihan_model')->getAllTagihan();
		$data['customer'] = $this->model('Customer_model')->getAllCustomer();
		$data['title'] = 'Tagihan - Paytrik';
		$data['header'] = 'Tagihan';
		$this->view('templates/header', $data);
		$this->view('tagihan/index', $data);
		$this->view('templates/footer');
	}

	public function pembayaran()
	{
		$data['login'] = $this->model('Login_model')->getData();
		$data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
		$data['customer'] = $this->model('Customer_model')->getAllCustomer();
		$data['title'] = 'Pembayaran - Paytrik';
		$data['header'] = 'Pembayaran';
		$this->view('templates/header', $data);
		$this->view('pembayaran/index', $data);
		$this->view('templates/footer');
	}

	public function riwayat()
	{
		$data['login'] = $this->model('Login_model')->getData();
		$data['history'] = $this->model('Pembayaran_model')->getHistory();
		$data['title'] = 'Riwayat - Paytrik';
		$data['header'] = 'Riwayat';
		$this->view('templates/header', $data);
		$this->view('riwayat/index', $data);
		$this->view('templates/footer');
	}
}