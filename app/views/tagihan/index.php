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
									<th>ID Tagihan</th>
									<th>Nama</th>
									<th>Tagihan Per</th>
									<th>Pemakaian Akhir (Kilowatt)</th>
									<th>Tarif /kWh</th>
									<th>Beban</th>
									<th>Total Bayar</th>
									<th>Tgl Akhir Bayar</th>
									<th>Tgl Pencatatan</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
								if (!empty($data['tagihan'])) {
									foreach ($data['tagihan'] as $tagihan) {
										?>
											<tr>
												<td><?= $tagihan['kodetagihan'] ?></td>
												<td><?= $tagihan['nama'] ?></td>
												<td><?= ucwords($tagihan['bulantagihan']) ?></td>
												<td><?= $tagihan['pemakaianakhir'] ?></td>
												<td>Rp.<?= number_format($tagihan['tarifperkwh']) ?></td>
												<td>Rp.<?= number_format($tagihan['beban']) ?></td>
												<td>Rp.<?= number_format($tagihan['totalbayar']) ?></td>
												<td><?= $tagihan['tglakhirbayar'] ?></td>
												<td><?= $tagihan['tglpencatatan'] ?></td>
												<td><?= ucwords($tagihan['status']) ?></td>
												<td>
													<div class="table-data-feature">
														<button class="item showEditTagihan" data-toggle="modal" data-target="#mediumModal" data-id="<?= $tagihan['kodetagihan'] ?>">
															<i class="zmdi zmdi-edit" style="color: #4272d7"></i>
														</button>
														<a href="<?= BASEURL ?>/tagihan/delete/<?= $tagihan['kodetagihan'] ?>" class="item">
															<button class="item">
																<i class="zmdi zmdi-delete" style="color: #fa4251"></i>
															</button>
														</a>
													</div>
												</td>
											</tr>
										<?php
									}
								} else {
									?>
										<tr>
											<td colspan="9" class="text-center">Tidak ada data</td>
										</tr>
									<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


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
				<form action="<?= BASEURL ?>/tagihan/action" method="post">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="pemakaianakhir" class="control-label mb-1">Pemakaian Akhir</label>
						<input id="pemakaianakhir" name="pemakaianakhir" type="number" class="form-control" required>
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