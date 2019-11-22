<?php

class Tagihan_model {
	private $table = 'tb_tagihan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function newTagihan($data)
	{
		$query = "INSERT INTO tb_tagihan VALUES ('', :kodepelanggan, :tahuntagihan, :bulantagihan, :pemakaianakhir, CURRENT_TIMESTAMP, :totalbayar, :tglmulaibayar, :tglakhirbayar, :status, '')";
		$this->db->query($query);
		$this->db->bind('kodepelanggan', $data['kodepelanggan']);
		$this->db->bind('tahuntagihan', $data['tahuntagihan']);
		$this->db->bind('bulantagihan', $data['bulantagihan']);
		$this->db->bind('pemakaianakhir', $data['pemakaianakhir']);
		$this->db->bind('totalbayar', $data['totalbayar']);
		$this->db->bind('tglmulaibayar', $data['tglmulaibayar']);
		$this->db->bind('tglakhirbayar', $data['tglakhirbayar']);
		$this->db->bind('status', $data['status']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function getAllTagihan()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' JOIN tb_pelanggan USING (kodepelanggan) JOIN tb_tarif USING (kodetarif)');
		return $this->db->resultSet();
	}

	public function getTagihanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodetagihan=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function editDataTagihan($data)
	{
		$id = $_POST['id'];
		$this->db->query("SELECT * FROM tb_tarif JOIN tb_pelanggan USING (kodetarif) JOIN tb_tagihan USING (kodepelanggan) WHERE kodetagihan = $id");
		$this->db->execute();
		$result = $this->db->resultSet();
		$row = $this->db->rowCount();

		if ($row > 0) {
			if (!empty($result)) {
				foreach ($result as $result) {
					$tarifperkwh = $result['tarifperkwh'];
					$beban = $result['beban'];
					$tahun = date("Y");
					$bulan = date("F");
					$pemakaianakhir = $_POST['pemakaianakhir'];
					$totalbayar = ($pemakaianakhir * $tarifperkwh) + $beban;
					$query = "UPDATE tb_tagihan SET
								tahuntagihan = $tahun,
								bulantagihan = '$bulan',
								pemakaianakhir = :pemakaianakhir,
								tglmulaibayar = curdate(),
								tglakhirbayar = curdate(),
								totalbayar = $totalbayar, 
								status = 'belum lunas' 
								WHERE kodetagihan = :id";
					$this->db->query($query);
					$this->db->bind('pemakaianakhir', $data['pemakaianakhir']);
					$this->db->bind('id', $data['id']);

					$this->db->execute();
				}
			}
		}

		return $this->db->rowCount();
	}

	public function deleteTagihan($id)
	{
		$query = "DELETE FROM tb_tagihan WHERE kodetagihan = :kodetagihan";
		$this->db->query($query);
		$this->db->bind('kodetagihan', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
}