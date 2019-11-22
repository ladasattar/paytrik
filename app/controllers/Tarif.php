<?php

class Tarif extends Controller {
	public function getData()
	{
		$data['tarif'] = $this->model('Tarif_model')->getAllTarif();
	}

	public function action()
	{
		if ($this->model('Tarif_model')->newTarif($_POST) > 0) {
			Flasher::setFlash('Berhasil ditambahkan', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/tarif');
			exit;
		} else {
			Flasher::setFlash('Gagal ditambahkan', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/tarif');
			exit;
		}
	}

	public function getEdit()
	{
		echo json_encode($this->model('Tarif_model')->getTarifById($_POST['kodetarif']));
	}

	public function edit()
	{
		if ( $this->model('Tarif_model')->editDataTarif($_POST) > 0 ) {
			Flasher::setFlash('Berhasil diedit', 'check-circle', '');
			header('Location: ' . BASEURL . '/menu/tarif');
			exit;
		} else {
			Flasher::setFlash('Gagal diedit', 'close', '#e0404f');
			header('Location: ' . BASEURL . '/menu/tarif');
			exit;
		}
	}
}