<?php

class Tagihan extends Controller {
	public function action()
	{
		if ($this->model('Tagihan_model')->newTagihan($_POST) > 0) {
			Flasher::setFlash('Berhasil ditambahkan', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/tagihan');
			exit;
		} else {
			Flasher::setFlash('Gagal ditambahkan', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/tagihan');
			exit;
		}
	}

	public function delete($id)
	{
		if ( $this->model('Tagihan_model')->deleteTagihan($id) > 0 ) {
			Flasher::setFlash('Berhasil dihapus', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/tagihan');
			exit;
		} else {
			Flasher::setFlash('Gagal dihapus', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		}
	}

	public function getEdit()
	{
		echo json_encode($this->model('Tagihan_model')->getTagihanById($_POST['kodetagihan']));
	}

	public function edit()
	{
		if ( $this->model('Tagihan_model')->editDataTagihan($_POST) > 0 ) {
			Flasher::setFlash('Tagihan berhasil ditambahkan', 'check-circle', '');
			header('Location: ' . BASEURL . '/menu/tagihan');
			exit;
		} else {
			Flasher::setFlash('Tagihan gagal ditambahkan', 'close', '#e0404f');
			header('Location: ' . BASEURL . '/menu/tagihan');
			exit;
		}
	}
}