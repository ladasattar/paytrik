<?php

class Home extends Controller {
	public function index()
	{
		$this->view('home/index');
	}

	public function destroy()
	{
		session_start();
		unset($_SESSION['user']['nometer']);
		header('Location:' . BASEURL);
		return;
	}
}