<?php

class Login_model {
	private $table = 'tb_login';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function loginAct($data)
	{
		if (!empty(trim($data['username'])) && !empty(trim($data['password']))) {
			$username = htmlspecialchars($data['username']);
			$password = htmlspecialchars($data['password']);

			$this->db->query("SELECT * FROM " . $this->table . ' WHERE username = :username');
			$this->db->bind('username', $data['username']);
			$data = $this->db->single();
			$row = $this->db->rowCount();

			if ($row > 0) {
				if(password_verify($password, $data['password'])) {
					$_SESSION['user_online']['id'] = $data['kodelogin'];
					$_SESSION['user_online']['level'] = $data['level'];
					header('Location:' . BASEURL . '/admin');
				} else {
					Flasher::setFlash('Password salah', 'close', '#e0404f');
					header('Location:' . BASEURL . '/login');
					exit;
				}
			} else {
				Flasher::setFlash('Password atau username salah', 'close', '#e0404f');
				header('Location:' . BASEURL . '/login');
				exit;
			}
		}

		return $this->db->rowCount();
	}

	public function getData() {
		$id = $_SESSION['user_online']['id'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE kodelogin = '$id'");
		return $this->db->single();
	}
}