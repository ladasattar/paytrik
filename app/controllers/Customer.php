<?php

class Customer extends Controller {
	public function detail()
	{
		if ($this->model('Customer_model')->searchNometer($_POST) > 0) {
			$data['customer'] = $this->model('Customer_model')->getDataCustomer();
			$data['history'] = $this->model('Customer_model')->getHistoryCustomer();
			$data['title'] = 'Detail Pelanggan';
			$this->view('templates/header_user', $data);
			$this->view('home/detail', $data);
			$this->view('templates/footer');
			exit;
		} else {
			FlasherUser::setFlash('No meter anda tidak terdaftar', 'close', '#e0404f');
			header('Location:' . BASEURL);
			exit;
		}
	}

	public function action()
	{
		if ($this->model('Customer_model')->newCustomer($_POST) > 0) {
			Flasher::setFlash('Berhasil ditambahkan', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		} else {
			Flasher::setFlash('Gagal ditambahkan', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		}
	}

	public function delete($id)
	{
		if ( $this->model('Customer_model')->deleteCustomer($id) > 0 ) {
			Flasher::setFlash('Berhasil dihapus', 'check-circle', '');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		} else {
			Flasher::setFlash('Gagal dihapus', 'close', '#e0404f');
			header('Location:' . BASEURL . '/menu/customer');
			exit;
		}
	}

	public function getEdit()
	{
		echo json_encode($this->model('Customer_model')->getCustomerById($_POST['kodepelanggan']));
	}

	public function edit()
	{
		if ( $this->model('Customer_model')->editDataCustomer($_POST) > 0 ) {
			Flasher::setFlash('Berhasil diedit', 'check-circle', '');
			header('Location: ' . BASEURL . '/menu/customer');
			exit;
		} else {
			Flasher::setFlash('Gagal diedit', 'close', '#e0404f');
			header('Location: ' . BASEURL . '/menu/customer');
			exit;
		}
	}

	public function uploadBukti()
	{
		if ($this->model('Customer_model')->uploadBuktiPembayaran($_POST) > 0) {
			Flasher::setFlash('Berhasil submit', 'check-circle', '');
			header('Location:' . BASEURL . '/customer/detail');
			exit;
		} else {
			Flasher::setFlash('Gagal submit', 'close', '#e0404f');
			header('Location:' . BASEURL . '/customer/detail');
			exit;
		}
	}
}