<!-- MAIN CONTENT-->
<div class="main-content">

<?php Flasher::flash(); ?>

	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1"><?= $data['header'] ?></h2>
					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<div class="col-lg-12">
					<div class="table-responsive table--no-card m-b-40">
						<table class="table table-borderless table-striped table-earning">
							<thead>
								<tr>
									<th>ID Pembayaran</th>
									<th>ID Tagihan</th>
									<th>ID Pelanggan</th>
									<th>Tanggal Bayar</th>
									<th>Total</th>
									<th>Bukti</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
								if (!empty($data['pembayaran'])) {
									foreach ($data['pembayaran'] as $pembayaran) {
										?>
											<tr>
												<td><?= $pembayaran['kodepembayaran'] ?></td>
												<td><?= $pembayaran['kodetagihan'] ?></td>
												<td><?= $pembayaran['kodepelanggan'] ?></td>
												<td><?= $pembayaran['tglbayar'] ?></td>
												<td>Rp.<?= number_format($pembayaran['totalbayar']) ?></td>
												<td>
													<a href="../assets/images/uploaded/bukti/<?= $pembayaran['buktipembayaran'] ?>" data-lightbox="image-1" data-title="Bukti Pembayaran <?= $pembayaran['kodepembayaran'] ?>">
														<img src="../assets/images/uploaded/bukti/<?= $pembayaran['buktipembayaran'] ?>" alt="">
													</a>
												</td>
												<td><?= ucwords($pembayaran['statuspembayaran']) ?></td>
												<td>
													<div class="table-data-feature">
														<a href="<?= BASEURL ?>/pembayaran/confirm/<?= $pembayaran['kodepembayaran'] ?>">
															<button class="btn btn-sm btn-primary m-r-10">Konfirmasi</button>
														</a>
														<a href="<?= BASEURL ?>/pembayaran/refuse/<?= $pembayaran['kodepembayaran'] ?>">
															<button class="btn btn-sm btn-danger">Tolak</button>
														</a>
													</div>
												</td>
											</tr>
										<?php
									}
								} else {
									?>
										<tr>
											<td colspan="8" class="text-center">Tidak ada data</td>
										</tr>
									<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->


<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mediumModalLabel">Tambah Pelanggan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= BASEURL ?>/tagihan/action" method="post" novalidate="novalidate">
					<input type="hidden" name="id" id="id">
					<div class="form-group kodepelanggan">
						<div>
							<label for="kodepelanggan" class=" form-control-label">ID Pelanggan</label>
						</div>
						<div>
							<select name="kodepelanggan" id="kodepelanggan" class="form-control">
							<?php
								if (!empty($data['customer'])) {
									foreach ($data['customer'] as $customer) {
										?>
											<option value="<?= $customer['kodepelanggan'] ?>"><?= $customer['kodepelanggan'] ?></option>
										<?php
									}
								} else {
									echo "Kosong";
								}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tahuntagihan" class="control-label mb-1">Tahun Tagihan</label>
						<input id="tahuntagihan" name="tahuntagihan" type="number" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="bulantagihan" class="control-label mb-1">Bulan Tagihan</label>
						<input id="bulantagihan" name="bulantagihan" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="pemakaianakhir" class="control-label mb-1">Pemakaian Akhir</label>
						<input id="pemakaianakhir" name="pemakaianakhir" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="tglmulaibayar" class=" form-control-label">Mulai Bayar</label>
						<input type="date" name="tglmulaibayar" id="tglmulaibayar" rows="9" class="form-control">
					</div>
					<div class="form-group">
						<label for="tglakhirbayar" class=" form-control-label">Akhir Bayar</label>
						<input type="date" name="tglakhirbayar" id="tglakhirbayar" rows="9" class="form-control">
					</div>
					<div class="form-group">
						<label for="totalbayar" class=" form-control-label">Total</label>
						<input type="number" name="totalbayar" id="totalbayar" rows="9" class="form-control">
					</div>
					<div class="form-group">
						<div>
							<label for="status" class=" form-control-label">Status</label>
						</div>
						<div>
							<select name="status" id="status" class="form-control">
								<option value="lunas">Lunas</option>
								<option value="belum_lunas">Belum Lunas</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="au-btn au-btn-icon au-btn--blue btn-edit">
							<i class="zmdi zmdi-plus"></i>tambah</button>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end modal medium -->