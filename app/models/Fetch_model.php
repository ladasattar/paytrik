<?php

class Fetch_model {
	private $table = 'tb_pembayaran';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getNotification()
	{
		if (isset($_POST['view'])) {
			if ($_POST['view'] != '') {
				$updateQuery = "UPDATE " . $this->table . " SET notification = 1 WHERE notification = 0";
				$this->db->query($updateQuery);
				$this->db->execute();
			}

			$query = "SELECT * FROM ". $this->table ." JOIN tb_tagihan USING (kodetagihan) JOIN tb_pelanggan USING (kodepelanggan) ORDER BY tglbayar DESC LIMIT 3";
			$this->db->query($query);
			$this->db->execute();
			$result = $this->db->resultSet();
			$affectedRows = $this->db->rowCount();
			$output = '';

			if ($affectedRows > 0) {
				if (!empty($result)) {
					foreach ($result as $result) {
						if ($result['notification'] != 1) {
							$output .= '
							<a href="http://localhost/paytrik/menu/pembayaran">
								<div class="notifi__item d-flex align-items-center">
									<div class="bg-c1 img-cir img-40">
										<i class="zmdi zmdi-money"></i>
									</div>
									<div class="content" id="notificationList">
										<span class="name">'. $result['nama'] .'</span>
										<p>'. $result['statuspembayaran'] .'</p>
										<span class="date">'. $result['tglbayar'] .'</span>
									</div>
								</div>
							</a>
							';
						} else {
							$output .= '
							<a href="http://localhost/paytrik/menu/pembayaran">
								<div class="notifi__item d-flex align-items-center notifi__item-seen">
									<div class="bg-c1 img-cir img-40">
										<i class="zmdi zmdi-money"></i>
									</div>
									<div class="content" id="notificationList">
										<span class="name">'. $result['nama'] .'</span>
										<p>'. $result['statuspembayaran'] .'</p>
										<span class="date">'. $result['tglbayar'] .'</span>
									</div>
								</div>
							</a>
							';
						}
					}
				}
			} else {
				$output .= '
				<div class="notifi__item">
					<div class="bg-c1 img-cir img-40">
						<i class="zmdi zmdi-email-open"></i>
					</div>
					<div class="content" id="notificationList">
						<p>Tidak ada notifikasi</p>
					</div>
				</div>
				';
			}

			$statusQuery = "SELECT * FROM " . $this->table . " WHERE notification = 0";
			$this->db->query($statusQuery);
			$this->db->execute();
			$count = $this->db->rowCount();
			$data = array(
				'notification' => $output,
				'unseen_notification' => $count
			);

			return $data;
		}
	}
}