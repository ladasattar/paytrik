$(function () {
	// Ajax
	// Pelanggan
	$('#btnInsertData').on('click', function () {
		$('.modal-body form').attr('action', 'http://localhost/paytrik/customer/action');
		$('h5.modal-title').html('Tambah Pelanggan');

		$("#nometer").val("");
		$("#kodetarif").val("");
		$("#nama").val("");
		$("#tlp").val("");
		$("#alamat").val("");
		$("#id").val("");

		$('.btn-edit').html('<i class="zmdi zmdi-plus"></i>tambah');
	})

	$('.showEditModal').on('click', function () {
		$('h5.modal-title').html('Edit Data Pelanggan');
		$('.modal-body form').attr('action', 'http://localhost/paytrik/customer/edit');
		$('.btn-edit').html('<i class="zmdi zmdi-edit"></i>edit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/paytrik/customer/getEdit',
			data: { kodepelanggan: id },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#nometer").val(data.nometer);
				$("#kodetarif").val(data.kodetarif);
				$("#nama").val(data.nama);
				$("#tlp").val(data.tlp);
				$("#alamat").val(data.alamat);
				$("#id").val(data.kodepelanggan);
			}
		});
	})

	// Tagihan

	$('.showEditTagihan').on('click', function () {
		$('h5.modal-title').html('Edit Data Tagihan');
		$('.modal-body form').attr('action', 'http://localhost/paytrik/tagihan/edit');
		$('.btn-edit').html('<i class="zmdi zmdi-edit"></i>edit');

		const id = $(this).data('id');
		// const tarifperkwh = $(this).data('tarif');

		$.ajax({
			url: 'http://localhost/paytrik/tagihan/getEdit',
			data: { kodetagihan: id },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#pemakaianakhir").val(data.pemakaianakhir);
				$("#id").val(data.kodetagihan);
			}
		});
	})

	// Tarif

	$('.showEditTarif').on('click', function () {
		$('h5.modal-title').html('Edit Data Tarif');
		$('.modal-body form').attr('action', 'http://localhost/paytrik/tarif/edit');
		$('.btn-edit').html('<i class="zmdi zmdi-edit"></i>edit');
		$('.kodepelanggan').css('display', 'none');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/paytrik/tarif/getEdit',
			data: { kodetarif: id },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#goltarif").val(data.goltarif);
				$("#daya").val(data.daya);
				$("#tarifperkwh").val(data.tarifperkwh);
				$("#beban").val(data.beban);
				$("#id").val(data.kodetarif);
			}
		});
	})

	// Upload Bukti Pembayaran Customer

	$('#previewHolder').css('display', 'none');
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#previewHolder').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#buktipembayaran").change(function () {
		$('#previewHolder').css('display', 'block');
		readURL(this);
	});
})