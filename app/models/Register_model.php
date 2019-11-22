<?php

class Register_model {
	private $table = 'tb_login';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function newUser($data)
	{
		$username = $data['username'];
		$query = "SELECT * FROM tb_login WHERE username = '$username'";
		$this->db->query($query);
		$this->db->execute();
		$row = $this->db->rowCount();

		if ($row < 1) {
			if (strlen($data['password']) >= 8) {
				if ($data['password'] == $data['repassword']) {
					$encrypt_password = password_hash($data['password'], PASSWORD_BCRYPT, ['cost'=>12]);
					$query = "INSERT INTO tb_login VALUES ('', :username, :password, :namalengkap, 'member')";
					$this->db->query($query);
					$this->db->bind('username', $data['username']);
					$this->db->bind('password', $encrypt_password);
					$this->db->bind('namalengkap', $data['namalengkap']);
					$this->db->execute();
					$_SESSION['user_online']['level'] = $data['level'];
					$id = $this->db->lastInsertId();
					$_SESSION['user_online']['id'] = $id;
					return $this->db->rowCount();
				} else {
					Flasher::setFlash('Password Tidak Sama', 'close', '#e0404f');
					header('Location:' . BASEURL . '/register');
					exit;
				}
			} else {
				Flasher::setFlash('Password Kurang', 'close', '#e0404f');
				header('Location:' . BASEURL . '/register');
				exit;
			}	
		} else {
			Flasher::setFlash('Username sudah ada', 'close', '#e0404f');
			header('Location:' . BASEURL . '/register');
			exit;
		}

		return $this->db->rowCount();
	}
}