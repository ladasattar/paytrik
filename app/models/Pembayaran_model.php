<?php

class Pembayaran_model {
	private $table = 'tb_pembayaran';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPembayaran()
	{
		$this->db->query("SELECT * FROM tb_tagihan JOIN " . $this->table . " USING (kodetagihan) WHERE statuspembayaran = 'Menunggu Konfirmasi'");
		return $this->db->resultSet();
	}

	public function getHistory()
	{
		$this->db->query("SELECT * FROM " . $this->table . " JOIN tb_tagihan USING(kodetagihan) WHERE statuspembayaran = 'Terkonfirmasi' OR statuspembayaran = 'Ditolak'");
		return $this->db->resultSet();
	}

	public function getAllHistory()
	{
		$this->db->query("SELECT * FROM " . $this->table . " JOIN tb_tagihan USING(kodetagihan) WHERE statuspembayaran = 'Terkonfirmasi' OR statuspembayaran = 'Ditolak'");
		return $this->db->resultSet();
	}

	public function refuseTagihan($id)
	{
		$query = "UPDATE tb_pembayaran SET statuspembayaran = 'Ditolak' WHERE kodepembayaran = :kodepembayaran";
		$this->db->query($query);
		$this->db->bind('kodepembayaran', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function confirmTagihan($id)
	{
		$query = "UPDATE tb_pembayaran JOIN tb_tagihan USING (kodetagihan) SET statuspembayaran = 'Terkonfirmasi', status = 'lunas' WHERE kodepembayaran = :kodepembayaran";
		$this->db->query($query);
		$this->db->bind('kodepembayaran', $id);
		$this->db->execute();
		return $this->db->rowCount();
	}
}