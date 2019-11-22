<?php

class Tarif_model {
	private $table = 'tb_tarif';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllTarif()
	{
		$this->db->query("SELECT * FROM tb_tarif");
		return $this->db->resultSet();
	}

	public function getTarifById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodetarif=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function newTarif($data)
	{
		$query = "INSERT INTO tb_tarif VALUES ('', :goltarif, :daya, :tarifperkwh, :beban)";
		$this->db->query($query);
		$this->db->bind('goltarif', $data['goltarif']);
		$this->db->bind('daya', $data['daya']);
		$this->db->bind('tarifperkwh', $data['tarifperkwh']);
		$this->db->bind('beban', $data['beban']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function editDataTarif($data)
	{
		echo $_POST['kodetarif'];
		$query = "UPDATE tb_tarif SET
					goltarif = :goltarif, 
					daya = :daya, 
					tarifperkwh = :tarifperkwh, 
					beban = :beban 
					WHERE kodetarif = :id";
		$this->db->query($query);
		$this->db->bind('goltarif', $data['goltarif']);
		$this->db->bind('daya', $data['daya']);
		$this->db->bind('tarifperkwh', $data['tarifperkwh']);
		$this->db->bind('beban', $data['beban']);
		$this->db->bind('id', $data['id']);

		$this->db->execute();

		return $this->db->rowCount();
	}
}