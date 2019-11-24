            <!-- MAIN CONTENT-->
            <div class="main-content">

			<?php Flasher::flash(); ?>

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="overview-wrap">
									<h2 class="title-1"><?= $data['header'] ?></h2>
									<button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#mediumModal" id="btnInsertTarif">
										<i class="zmdi zmdi-plus"></i>tarif</button>
								</div>
							</div>
						</div>
                        <div class="row m-t-25">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID Tarif</th>
												<th>Golongan Tarif</th>
                                                <th>Daya</th>
												<th>Tarif /kWh</th>
												<th>Beban</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											if (!empty($data['tarif'])) {
												foreach ($data['tarif'] as $tarif) {
													?>
														<tr>
															<td><?= $tarif['kodetarif'] ?></td>
															<td><?= $tarif['goltarif'] ?></td>
															<td><?= $tarif['daya'] ?> VA</td>
															<td>Rp.<?= number_format($tarif['tarifperkwh']) ?></td>
															<td>Rp.<?= number_format($tarif['beban']) ?></td>
															<td>
																<div class="table-data-feature">
																	<button class="item showEditTarif" data-toggle="modal" data-target="#mediumModal" data-id="<?= $tarif['kodetarif'] ?>">
																		<i class="zmdi zmdi-edit" style="color: #4272d7"></i>
																	</button>
																	<a href="<?= BASEURL ?>/tarif/delete/<?= $tarif['kodetarif'] ?>" class="item">
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
							<form action="<?= BASEURL ?>/tarif/action" method="post" novalidate="novalidate">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<label for="goltarif" class="control-label mb-1">Golongan Tarif</label>
									<input id="goltarif" name="goltarif" type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="daya" class="control-label mb-1">Daya</label>
									<input id="daya" name="daya" type="number" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="tarifperkwh" class="control-label mb-1">Tarif /kWh</label>
									<input id="tarifperkwh" name="tarifperkwh" type="number" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="beban" class="control-label mb-1">Beban</label>
									<input id="beban" name="beban" type="number" class="form-control" required>
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