<div class="wrapper" style="width: 100%;max-width: 1920px; margin: 0 auto;">
	<?php
		if (!empty($data['customer'])) {
			foreach ($data['customer'] as $customer) {
				?>
				<section class="welcome3 p-t-40 p-b-55">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="welcome2-inner m-t-60">
									<div class="welcome2-greeting">
										<h1 class="title-6"><?= $customer['nama'] ?></h1>
										<p style="color: #FFF">No Meter : <?= $customer['nometer'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- MAIN CONTENT-->
				<div class="main-content-2 mt-5">
					<div class="section__content section__content--p30">
						<div class="container-fluid">
							<a href="<?= BASEURL ?>/home/destroy">
								<button class="btn-destroy btn-primary"><i class="zmdi zmdi-power"></i> Keluar</button>
							</a>
							<div class="row">
								<div class="container">
									<?php Flasher::flash(); ?>
									<div class="nav-detil d-flex align-items-center justify-content-center py-3 mb-3">
										<a class="nav-detil-menu active-detil-menu" data-tab="tab-1" href="#profil">Profil</a>
										<a class="nav-detil-menu" data-tab="tab-2" href="#tagihan">Tagihan</a>
										<a class="nav-detil-menu" data-tab="tab-3" href="#riwayat">Riwayat</a>
									</div>

									<div class="tab-tagihan tab-current au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border" id="tab-1">
										<div class="au-card-title">
											<h3><i class="zmdi zmdi-account-calendar"></i>Profil</h3>
										</div>
										<div class="au-task js-list-load au-task--border">
											<div class="au-task-list-2 js-scrollbar3">
												<div class="au-task__item">
													<div class="au-task__item-inner">
														<p><span class="time">Nama</span></p>
														<h5 class="task">
															<p><?= $customer['nama'] ?></p>
														</h5>
													</div>
												</div>
												<div class="au-task__item">
													<div class="au-task__item-inner">
														<p><span class="time">No Meter</span></p>
														<h5 class="task">
															<p><?= $customer['nometer'] ?></p>
														</h5>
													</div>
												</div>
												<div class="au-task__item">
													<div class="au-task__item-inner">
														<p><span class="time">Golongan Tarif</span></p>
														<h5 class="task">
															<p><?= $customer['goltarif'] ?></p>
														</h5>
													</div>
												</div>
												<div class="au-task__item">
													<div class="au-task__item-inner">
														<p><span class="time">Telepon</span></p>
														<h5 class="task">
															<p><?= $customer['tlp'] ?></p>
														</h5>
													</div>
												</div>
												<div class="au-task__item">
													<div class="au-task__item-inner">
														<p><span class="time">Alamat</span></p>
														<h5 class="task">
															<p><?= $customer['alamat'] ?></p>
														</h5>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-tagihan au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border" id="tab-2">
										<div class="au-card-title">
											<h3><i class="zmdi zmdi-receipt"></i>Tagihan</h3>
										</div>
										<div class="au-task js-list-load au-task--border">
											<div class="au-task-list-2 js-scrollbar3">
												<div class="au-task__item">
													<div class="au-task__item-inner d-flex align-items-center" style="justify-content: space-between">
														<div>
															<h2>Rp.<?= number_format($customer['totalbayar']) ?> <span class="time"> / <?= $customer['bulantagihan'] . ' ' . $customer['tahuntagihan'] ?></span></h2>
															<p class="mt-3"><span class="time">pemakaian</span> : <span class="time pemakaianakhir"><?= $customer['pemakaianakhir'] ?> Kilowatt</span></p>
														</div>
														<div>
															<p><span class="time status"><?= ucwords($customer['status']) ?></span></p>
														</div>
													</div>
												</div>
											</div>
											<?php
												if ($customer['status'] == 'belum lunas') {
													?>
												<div class="au-task__footer-2">
													<button class="btn-bayar-tagihan" data-toggle="modal" data-target="#mediumModal" data-id="<?= $customer['kodetagihan'] ?>">
														BAYAR
													</button>
												</div>
												<?php
												}
											?>
										</div>
									</div>

									<div class="tab-tagihan au-card au-card--no-shadow au-card--no-pad m-b-40 au-card--border" id="tab-3">
										<div class="au-card-title">
											<h3><i class="zmdi zmdi-refresh-alt"></i>Riwayat</h3>
										</div>
										<div class="au-task js-list-load au-task--border">
											<div class="au-task-list-2 js-scrollbar3">
											<?php
												if (!empty($data['history'])) {
													foreach ($data['history'] as $history) {
														?>
															<div class="au-task__item">
																<div class="au-task__item-inner d-flex align-items-center" style="justify-content: space-between">
																	<div>
																		<h2>Rp.<?= number_format($history['totaldibayar']) ?> <span class="time"> / <?= $history['bulantagihan'] . ' ' . $history['tahuntagihan'] ?></span></h2>
																		<p class="mt-3"><span class="time">pemakaian</span> : <span class="time pemakaianakhir"><?= $history['pemakaian'] ?> Kilowatt</span></p>
																	</div>
																	<div>
																		<?php
																			if ($history['statuspembayaran'] == 'Terkonfirmasi') {
																				?>
																					<p><span class="time status">lunas</span></p>
																				<?php
																			} else {
																				?>
																					<p><span class="time status"><?= ucwords($history['statuspembayaran']) ?></span></p>
																				<?php
																			}
																		?>
																	</div>
																</div>
															</div>
														<?php
													}
												} else {
													?>
														<div class="au-task__item">
															<div class="au-task__item-inner">
																<h3 class="text-center" style="color: #555">Tidak ada riwayat</h3>
															</div>
														</div>
													<?php
												}
											?>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END MAIN CONTENT-->
				<?php
			}
		}
	?>

	<!-- modal medium -->
	<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mediumModalLabel">Upload Bukti Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= BASEURL ?>/customer/uploadBukti" method="post" enctype="multipart/form-data">
						<h4>Pembayaran dapat melalui :</h4>
						<h5 class="mt-3">Transfer </h5>
						<p class="mt-2">BRI : 0358375349</p>
						<p class="mt-2">BCA : 9235832957</p>
						<p class="my-5">**Lalu Upload bukti pembayaran</p>
						<?php
							if (!empty($data['customer'])) {
								foreach ($data['customer'] as $customer) {
									?>
										<input type="hidden" name="kodetagihan" value="<?= $customer['kodetagihan'] ?>" id="id">
										<input type="hidden" name="nometer" value="<?= $customer['nometer'] ?>">
										<input type="hidden" name="totalbayar" value="<?= $customer['totalbayar'] ?>">
										<input type="hidden" name="pemakaianakhir" value="<?= $customer['pemakaianakhir'] ?>">
									<?php
								}
							}
						?>
						<div class="form-group">
							<label for="buktipembayaran" class="control-label mb-1">Bukti Pembayaran</label>
							<input type="file" name="buktipembayaran" id="buktipembayaran" class="form-control" accept="image/*" required>
							<img id="previewHolder" alt="Bukti Pembayaran" width="250px" class="mt-3" />
						</div>
						<div class="modal-footer">
							<button type="submit" class="au-btn au-btn-icon au-btn--blue btn-edit btn-upload-bukti">
								Kirim
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end modal medium -->
</div>