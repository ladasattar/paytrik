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
	$('.btnInsertTarif').on('click', function () {
		$('h5.modal-title').html('Tambah Tarif');
		$('.modal-body form').attr('action', 'http://localhost/paytrik/tarif/action');
		$('.btn-edit').html('<i class="zmdi zmdi-edit"></i>edit');

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/paytrik/tarif/getEdit',
			data: { kodetarif: id },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$("#goltarif").val("");
				$("#daya").val("");
				$("#tarifperkwh").val("");
				$("#beban").val("");
				$("#id").val("");
			}
		});
	})

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

	// Ajax Bayar Form
	function load_unseen_notification(view = '') {
		$.ajax({
			url: "http://localhost/paytrik/admin/notification",
			method: "POST",
			data: { view: view },
			dataType: "json",
			success: function (data) {
				$(".notifi-dropdown").html(data.notification);
				if (data.unseen_notification > 0) {
					$('.notificationQuantity').addClass('showNotificationQuantity');
					$(".notificationQuantity").html(data.unseen_notification);
				}
			},
			error: function (data) {
				console.log("its error man");
			}
		})
	}

	load_unseen_notification();

	$('.notifi__item').on('click', function () {
		location.href = 'sdaflsd';
	})

	$('.notificationIcon').on('click', function () {
		$('.notificationQuantity').html('0');
		setTimeout(function () {
			$('.notificationQuantity').removeClass('showNotificationQuantity');
		}, 100);
		load_unseen_notification('yes');
	})

	// load new notifications
	setInterval(function () {
		load_unseen_notification();;
	}, 3000);
})