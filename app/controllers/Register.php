<?php

class Register extends Controller {
	public function __construct()
	{
		if (isset($_SESSION['user_online']['id'])) {
			header('Location:' . BASEURL);
		}
	}
	
	public function index()
	{
		$data['title'] = 'Register - Paytrik';
		$this->view('register');
	}

	public function action()
	{
		if ($this->model('Register_model')->newUser($_POST) > 0) {
			Flasher::setFlash('Register berhasil', 'check-circle', '');
			header('Location:' . BASEURL . '/admin');
			exit;
		} else {
			Flasher::setFlash('Register gagal', 'close', '#e0404f');
			header('Location:' . BASEURL . '/register');
			exit;
		}
	}
}