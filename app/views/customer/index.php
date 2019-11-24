            <!-- MAIN CONTENT-->
            <div class="main-content">

			<?php Flasher::flash(); ?>

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1"><?= $data['header'] ?></h2>
									<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal" id="btnInsertData">
										<i class="zmdi zmdi-plus"></i>pelanggan</button>
								</div>
							</div>
						</div>
                        <div class="row m-t-25">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID Pelanggan</th>
                                                <th>No Meter</th>
												<th>Golongan Tarif</th>
												<th>Nama</th>
                                                <th>Telepon</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											if (!empty($data['customer'])) {
												foreach ($data['customer'] as $customer) {
													?>
														<tr>
															<td><?= $customer['kodepelanggan'] ?></td>
															<td><?= $customer['nometer'] ?></td>
															<td><?= $customer['goltarif'] ?> - <?= $customer['daya'] ?> Watt - Rp.<?= number_format($customer['tarifperkwh']) ?>/kWh</td>
															<td><?= $customer['nama'] ?></td>
															<td><?= $customer['tlp'] ?></td>
															<td>
																<div class="table-data-feature">
																	<button class="item showEditModal" data-toggle="modal" data-target="#mediumModal" data-id="<?= $customer['kodepelanggan'] ?>">
																		<i class="zmdi zmdi-edit" style="color: #4272d7"></i>
																	</button>
																	<a href="<?= BASEURL ?>/customer/delete/<?= $customer['kodepelanggan'] ?>" class="item">
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
														<td colspan="6" class="text-center">Tidak ada data</td>
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
							<form action="<?= BASEURL ?>/customer/action" method="post">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<label for="nometer" class="control-label mb-1">No Meter</label>
									<input id="nometer" name="nometer" type="number" class="form-control" required>
								</div>
								<div class="form-group">
									<div>
										<label for="kodetarif" class=" form-control-label">Golongan Tarif</label>
									</div>
									<div>
										<select name="kodetarif" id="kodetarif" class="form-control" required>
										<?php
											if (!empty($data['tarif'])) {
												foreach ($data['tarif'] as $tarif) {
													?>
														<option value="<?= $tarif['kodetarif'] ?>"><?= $tarif['goltarif'] ?> - <?= $tarif['daya'] ?> Watt - Rp.<?= number_format($tarif['tarifperkwh']) ?>/kWh</option>
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
									<label for="nama" class="control-label mb-1">Nama</label>
									<input id="nama" name="nama" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="tlp" class="control-label mb-1">Telepon</label>
									<input id="tlp" name="tlp" type="tel" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="alamat" class=" form-control-label">Alamat</label>
									<textarea name="alamat" id="alamat" rows="9" class="form-control" required></textarea>
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