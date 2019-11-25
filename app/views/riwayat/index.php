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
								</tr>
							</thead>
							<tbody>
							<?php 
								if (!empty($data['history'])) {
									foreach ($data['history'] as $history) {
										?>
											<tr>
												<td><?= $history['kodepembayaran'] ?></td>
												<td><?= $history['kodetagihan'] ?></td>
												<td><?= $history['kodepelanggan'] ?></td>
												<td><?= $history['tglbayar'] ?></td>
												<td>Rp.<?= number_format($history['totaldibayar']) ?></td>
												<td>
													<a href="../assets/images/uploaded/bukti/<?= $history['buktipembayaran'] ?>" data-lightbox="image-1" data-title="Bukti Pembayaran <?= $history['kodepembayaran'] ?>">
														<img src="../assets/images/uploaded/bukti/<?= $history['buktipembayaran'] ?>" width="100px" alt="">
													</a>
												</td>
												<td><?= ucwords($history['statuspembayaran']) ?></td>
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
						<p>Copyright © <?= date('Y') ?> Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT-->