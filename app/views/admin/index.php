            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <a href="<?= BASEURL ?>/menu/customer">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <?php
                                                        if (!empty($data['admin'])) {
                                                            foreach ($data['admin'] as $customer) {
                                                                ?>
                                                                    <h2><?= $customer ?></h2>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                    <span>Pelanggan</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="<?= BASEURL ?>/menu/riwayat">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="text">
                                                    <?php
                                                        if (!empty($data['confirmed'])) {
                                                            foreach ($data['confirmed'] as $confirmed) {
                                                                ?>
                                                                    <h2><?= $confirmed ?></h2>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                    <span>Terkonfirmasi</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <a href="<?= BASEURL ?>/menu/pembayaran">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="text">
                                                    <?php
                                                        if (!empty($data['not-confirmed'])) {
                                                            foreach ($data['not-confirmed'] as $notConfirmed) {
                                                                ?>
                                                                    <h2><?= $notConfirmed ?></h2>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                    <span>Menunggu Konfirmasi</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    if (!empty($data['earnings'])) {
                                                        foreach ($data['earnings'] as $totalEarnings) {
                                                            ?>
                                                                <h2>Rp.<?= number_format($totalEarnings) ?></h2>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                <span>Total Pemasukan</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25"><?= $data['header'] ?></h2>
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
                            <div class="col-lg-3">
                                <h2 class="title-1 m-b-25"><?= $data['header-table'] ?></h2>
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                <?php
                                                    if (!empty($data['tarif'])) {
                                                        foreach ($data['tarif'] as $tarif) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $tarif['goltarif'] ?></td>
                                                                    <td class="text-right">Rp.<?= number_format($tarif['tarifperkwh']) ?> / kWh</td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center">Tidak ada data</td>
                                                            </tr>
                                                        <?php
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
