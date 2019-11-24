<?php

class Admin extends Controller {
	public function __construct()
	{
		if (!isset($_SESSION['user_online']['id'])) {
			header('Location:' . BASEURL . '/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard - Paytrik';
		$data['header'] = 'Pelanggan';
		$data['header-table'] = 'Tarif';
		$data['login'] = $this->model('Login_model')->getData();
		$data['customer'] = $this->model('Customer_model')->getAllCustomer();
		$data['tarif'] = $this->model('Tarif_model')->getAllTarif();
		$data['admin'] = $this->model('Customer_model')->countCustomer();
		$data['confirmed'] = $this->model('Customer_model')->countConfirmed();
		$data['not-confirmed'] = $this->model('Customer_model')->countNotConfirmed();
		$data['earnings'] = $this->model('Customer_model')->totalEarnings();
		$this->view('templates/header', $data);
		$this->view('admin/index', $data);
		$this->view('templates/footer');
	}

	public function notification()
	{
		echo json_encode($this->model('Fetch_model')->getNotification($_POST['view']));
	}
}