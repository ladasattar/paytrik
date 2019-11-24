<?php

class Customer_model {
	private $table = 'tb_pelanggan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getCustomerById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodepelanggan=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function searchNometer($data)
	{
		if (!empty($data['nometer'])) {
			$nometer = $data['nometer'];
			$query = "SELECT * FROM tb_pelanggan WHERE nometer = '$nometer'";
			$this->db->query($query);
			$this->db->execute();
			$row = $this->db->rowCount();

			if ($row > 0) {
				$_SESSION['user']['nometer'] = $nometer;
			}
		} else {
			$nometer = $_SESSION['user']['nometer'];
			$query = "SELECT * FROM tb_pelanggan WHERE nometer = '$nometer'";
			$this->db->query($query);
			$this->db->execute();
			$row = $this->db->rowCount();

			if ($row > 0) {
				$_SESSION['user']['nometer'] = $nometer;
			}
		}

		return $this->db->rowCount();
	}

	// public function countCustomer()
	// {
	// 	$this->db->query("SELECT COUNT(*) FROM " . $this->table);
	// 	$this->db->execute();
	// 	return $this->db->single();
	// }

	public function getDataCustomer()
	{
		$nometer = $_SESSION['user']['nometer'];
		$this->db->query("SELECT * FROM " . $this->table . " JOIN tb_tagihan USING (kodepelanggan) JOIN tb_tarif USING (kodetarif) WHERE nometer = '$nometer'");
		return $this->db->resultSet();
	}

	public function getHistoryCustomer()
	{
		$nometer = $_SESSION['user']['nometer'];
		$this->db->query("SELECT kodetagihan FROM tb_tagihan JOIN " . $this->table . " USING (kodepelanggan) WHERE nometer = '$nometer'");
		$this->db->execute();
		$result = $this->db->resultSet();
		$row = $this->db->rowCount();

		if ($row > 0) {
			if (!empty($result)) {
				foreach ($result as $result) {
					$kodetagihan = $result['kodetagihan'];
					$this->db->query("SELECT * FROM tb_pembayaran JOIN tb_tagihan USING (kodetagihan) WHERE tb_pembayaran.statuspembayaran = 'Terkonfirmasi' AND kodetagihan = $kodetagihan ORDER BY kodepembayaran DESC");
					$this->db->execute();
					$row = $this->db->rowCount();
					if ($row > 0) {
						return $this->db->resultSet();
					}
				}
			}
		}
	}

	public function newCustomer($data)
	{
		$nometer = $data['nometer'];
		$query = "SELECT * FROM tb_pelanggan WHERE nometer = '$nometer'";
		$this->db->query($query);
		$this->db->execute();
		$row = $this->db->rowCount();

		if ($row < 1) {
			$query = "INSERT INTO tb_pelanggan VALUES ('', :nometer, :kodetarif, :nama, :tlp, :alamat)";
			$this->db->query($query);
			$this->db->bind('nama', $data['nama']);
			$this->db->bind('nometer', $data['nometer']);
			$this->db->bind('kodetarif', $data['kodetarif']);
			$this->db->bind('tlp', $data['tlp']);
			$this->db->bind('alamat', $data['alamat']);
			$this->db->execute();
			$id = $this->db->lastInsertId();
			$row = $this->db->rowCount();
			$currentYear = date("Y");
			$currentMonth = date("F");
			if ($row > 0) {
				$query = "INSERT INTO tb_tagihan VALUES ('', $id, $currentYear, '$currentMonth', 0, '', 0, '', '', '', '')";
				$this->db->query($query);
				$this->db->execute();
				return $this->db->rowCount();
			} else {
				Flasher::setFlash('Gagal tambah tagihan', 'close', '#e0404f');
				header('Location:' . BASEURL . '/menu/customer');
				exit;
			}
		} else {
			Flasher::setFlash('Nomor meter sudah ada', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		}
	}

	public function getAllCustomer()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' JOIN tb_tarif USING (kodetarif) ORDER BY kodepelanggan DESC');
		return $this->db->resultSet();
	}

	public function getAllTarif()
	{
		$this->db->query('SELECT * FROM tb_tarif');
		return $this->db->resultSet();
	}

	public function editDataCustomer($data)
	{
		$query = "UPDATE tb_pelanggan SET
					nometer = :nometer,
					kodetarif = :kodetarif,
					tlp = :tlp,
					nama = :nama, 
					alamat = :alamat 
					WHERE kodepelanggan = :id";
		$this->db->query($query);
		$this->db->bind('nometer', $data['nometer']);
		$this->db->bind('kodetarif', $data['kodetarif']);
		$this->db->bind('tlp', $data['tlp']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteCustomer($id)
	{
		$query = "DELETE FROM tb_pelanggan WHERE kodepelanggan = :kodepelanggan";
		$this->db->query($query);
		$this->db->bind('kodepelanggan',$id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function uploadBuktiPembayaran()
	{
		$id = $_POST['kodetagihan'];
		$totalbayar = $_POST['totalbayar'];
		$pemakaian = $_POST['pemakaianakhir'];
		$filename = $_FILES['buktipembayaran']['name'];
		$filename = pathinfo($filename);
		$newFilename =  $filename['filename'];
		$extension = $filename['extension'];
		$sourcePath = $_FILES['buktipembayaran']['tmp_name'];
		$newFilename = $newFilename.uniqid().'.'.$extension;
		$dir = "C:\\xampp\\htdocs\\paytrik\\assets\\images\\uploaded\\bukti\\";
		if (move_uploaded_file($sourcePath,$dir.$newFilename)) {
			$query = "INSERT INTO tb_pembayaran VALUES ('', '$id', CURRENT_TIMESTAMP, $pemakaian, $totalbayar, '$newFilename', 'Menunggu Konfirmasi', '0')";
			$this->db->query($query);
			$this->db->execute();
			$row = $this->db->rowCount();
			if ($row > 0) {
				$query = "UPDATE tb_tagihan SET status = 'Menunggu Konfirmasi' WHERE kodetagihan = $id";
				$this->db->query($query);
				$this->db->execute();
				return $this->searchNometer($data);
			}
		}
	}
}