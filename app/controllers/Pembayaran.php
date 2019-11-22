<?php

class Pembayaran extends Controller {
	public function refuse($id)
	{
		if ($this->model('Pembayaran_model')->refuseTagihan($id) > 0) {
			Flasher::setFlash('Sukses', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/pembayaran');
			exit;
		} else {
			Flasher::setFlash('Gagal', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/pembayaran');
			exit;
		}
	}

	public function confirm($id)
	{
		if ($this->model('Pembayaran_model')->confirmTagihan($id) > 0) {
			Flasher::setFlash('Berhasil dikonfirmasi', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/pembayaran');
			exit;
		} else {
			Flasher::setFlash('Gagal dikonfirmasi', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/pembayaran');
			exit;
		}
	}
}