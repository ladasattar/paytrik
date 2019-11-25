<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Paytrik - Bayar Listrik Dengan Mudah</title>
	<link href="<?= BASEURL ?>/assets/css/style.css" rel="stylesheet" media="all">
	<link href="<?= BASEURL ?>/assets/css/style-2.css" rel="stylesheet" media="all">
	<link href="<?= BASEURL ?>/assets/css/animations.css" rel="stylesheet" media="all">
    <!--[if lte IE 9]>
        <link href='<?= BASEURL ?>/assets/css/animations-ie-fix.css' rel='stylesheet'>
    <![endif]-->
</head>

<body>

	<div class="wrapper">
	<?php FlasherUser::flashUser(); ?>
		<nav class="d-flex align-items-center">
			<div class="container">
				<div class="navbar d-flex flex-row space-between">
					<a href="<?= BASEURL ?>" class="logo-nav">Paytrik</a>
					<div class="menu-nav">
						<a href="#home">Home</a>
						<a href="#payment" id="navFeature">Payment</a>
					</div><!-- /menu-nav -->
					<div class="bars">
						<div class="line" id="one"></div>
						<div class="line" id="two"></div>
						<div class="line" id="three"></div>
					</div><!-- /bars -->
				</div><!-- /navbar -->
			</div><!-- /container -->
		</nav>
		<div class="sidenav d-flex flex-column content-center">
			<a href="#home">Home</a>
			<a href="#payment">Payment</a>
		</div><!-- /sidenav -->

		<div class="banner d-flex align-items-center animatedParent animateOnce" data-sequence="300" id="home">
			<img src="assets/img/banner/top.png" class="top-banner">
			<div class="container">
				<div class="banner-section d-flex align-items-center">
					<div class="col-lg-6 col-md-8 col-sm-12">
						<div class="text-banner">
							<p class="header-banner animated fadeInUpShort" data-id='1'>Bayar Tagihan <br /> Listrik Dengan Mudah</p>
							<p class="title-banner animated fadeInUpShort" data-id='2'>Paytrik memberikan anda kemudahan dalam <br />membayar tagihan listrik anda</p>
							<form action="<?= BASEURL ?>/customer/detail" method="post" class="animated fadeInUpShort" data-id='3'>
								<input type="number" placeholder="Masukkan No Meter Anda" name="nometer" required>
								<button class="btn btn-banner">BAYAR SEKARANG</button>
							</form>
						</div><!-- /text-banner -->
					</div><!-- /col-6 -->

					<div class="col-lg-6 col-md-8 col-sm-12">
						<div class="banner-ilt animated fadeInUpShort" data-id='3'>
							<img src="assets/img/banner/banner.png">
						</div><!-- /banner-ilt -->
					</div><!-- /col-6 -->
				</div><!-- /banner-section -->
			</div><!-- /container -->
			<img src="assets/img/banner/bottom.png" class="bottom-banner">
		</div><!-- /banner -->

		<div class="features row" id="payment">
			<div class="container d-flex flex-column align-items-center">

				<p class="content-header">Pembayaran Yang Mudah</p>
				<p class="content-title">Dengan paytrik pembayaran listrik menjadi lebih mudah dan cepat</p>

				<div class="features-section animatedParent animateOnce" data-sequence='500'>
					<div class="col-lg-4 col-md-6 col-sm-12 animated bounceInUp" data-id='1'>
						<div class="features-column">
							<img src="assets/img/payment/payment.png">
							<p class="title-feature">1. Transfer Pembayaran</p>
							<p class="desc-feature">Transfer melalui bank <br />ataupun m-Banking</p>
							<a href="javascript:void(0)" class="animatedClick" data-target='clickExample' data-sequence='500'>
								<button class="btn btn-read-more">BACA</button>
							</a>
						</div><!-- /features-column -->
					</div><!-- /col-4 -->

					<div class="col-lg-4 col-md-6 col-sm-12 animated bounceInUp" data-id='2'>
						<div class="features-column">
							<img src="assets/img/payment/payment-2.png">
							<p class="title-feature">2. Isi Formulir</p>
							<p class="desc-feature">Mengisi formulir dengan <br />lengkap dan benar beserta bukti</p>
							<a href="javascript:void(0)">
								<button class="btn btn-read-more">BACA</button>
							</a>
						</div><!-- /features-column -->
					</div><!-- /col-4 -->

					<div class="col-lg-4 col-md-12 col-sm-12 animated bounceInUp" data-id='3'>
						<div class="features-column">
							<img src="assets/img/payment/payment-3.png">
							<p class="title-feature">3. Tunggu Konfirmasi</p>
							<p class="desc-feature">Admin akan mengkonfirmasi <br />dalam jangka waktu 2 x 24 jam</p>
							<a href="javascript:void(0)">
								<button class="btn btn-read-more">BACA</button>
							</a>
						</div><!-- /features-column -->
					</div><!-- /col-4 -->
				</div><!-- /features-section -->

			</div><!-- /container -->
		</div><!-- /features -->

		<div class="container">
			<hr />

			<div class="offer row">
				<div class="offer-section d-flex flex-column">
					<p class="text-offer">Bayar tagihan anda sekarang</p>
					<form action="<?= BASEURL ?>/customer/detail" method="post">
						<input type="number" placeholder="Masukkan No Meter Anda" name="nometer" required>
						<button class="btn btn-banner">BAYAR SEKARANG</button>
					</form>
				</div><!-- /offer-section -->
			</div><!-- /offer -->

			<hr />
		</div><!-- /conatiner -->

		<footer>
			<div class="container">
				<div class="top-footer">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<p class="logo-footer">Paytrik</p>
					</div><!-- /col-3 -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<ul class="footer-menu">
							<li><a href="#home">Home</a></li>
							<li><a href="#payment">Payment</a></li>
						</ul>
					</div><!-- /col-3 -->
					<div class="col-lg-3 col-md-3 col-sm-6">
						<ul class="footer-terms">
							<li><a href="error.html">Terms & Conditions</a></li>
							<li><a href="error.html">Privacy policy</a></li>
							<li><a href="error.html">Support</a></li>
						</ul>
					</div><!-- /col-3 -->
					<div class="col-lg-3 col-md-3 col-sm-12">
						<p class="address">Jl. Tukad Yeh Panan No. 32 <br /> Sanggulan, Tabanan, Bali <br /> 82123</p>
					</div><!-- /col-4 -->
				</div><!-- /top-footer -->
			</div><!-- /container -->

			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="copy-section d-flex align-items-center content-center">
					&copy; 2019 Copyrights All right reserved
				</div><!-- /copy-section -->
			</div><!-- /col-12 -->
		</footer>

		<!-- modal-baca -->
		<div class="wrapper-modal d-flex align-items-center content-center animated fadeIn clickExample fadeOut" data-id='1'>
			<div class="modal-baca row animated bounceInUp clickExample fadeOut" data-id='2'>
				<div class="img-modal-baca">
					<img src="assets/img/payment/payment.png">
				</div>
				<h3>Transfer Pembayaran</h3>
				<p>Transfer uang tagihan ke rekening Official Paytrik</p>
				<div class="nama-bank">
					<p><span class="tf-bank">BCA</span> : 032485215</p>
					<p><span class="tf-bank">BRI</span> : 032485215</p>
					<p><span class="tf-bank">Mandiri</span> : 032485215</p>
				</div>
				<div class="footer-modal-baca">
					<a href="javascript:void(0)" class="animatedClick" data-target='clickExample' data-sequence='500'>
						<button class="btn btn-read-more">KEMBALI</button>
					</a>
				</div>
			</div>
		</div>
		<!-- /modal-baca -->

	</div><!-- /wrapper -->

	<script src="<?= BASEURL ?>/assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?= BASEURL ?>/assets/js/script-2.js"></script>
	<script src="<?= BASEURL ?>/assets/js/css3-animate-it.js"></script>
</body>

</html>