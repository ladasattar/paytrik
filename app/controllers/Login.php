<?php

class Login extends Controller {
	public function __construct()
	{
		if (isset($_SESSION['user_online']['id'])) {
			header('Location:' . BASEURL . '/admin');
		}
	}

	public function index()
	{
		$data['title'] = 'Login - Paytrik';
		$this->view('login');
	}

	public function action()
	{
		if ($this->model('Login_model')->loginAct($_POST) > 0) {
			header('Location:' . BASEURL . '/admin');
			exit;
		} else {
			Flasher::setFlash('Login gagal', 'close', '#e0404f');
			header('Location:' . BASEURL . '/login');
			exit;
		}
	}
}