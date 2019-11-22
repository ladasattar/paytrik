<?php

class FlasherUser {
	public static function setFlash($msg, $icon, $color)
	{
		$_SESSION['flash'] = [
			'msg' => $msg,
			'icon' => $icon,
			'color' => $color
		];
	}

	public static function flashUser()
	{
		if (isset($_SESSION['flash'])) {
			echo '<section class="flasher d-flex flex-column align-items-center content-center">
					<div class="flasher-section d-flex flex-column align-items-center content-cente">
						<div class="times-flasher">
							<div class="line-flasher" id="one-flasher"></div>
							<div class="line-flasher" id="two-flasher"></div>
							<div class="line-flasher" id="three-flasher"></div>
						</div><!-- /times-flasher -->
						<img src="assets/img/flash.png" alt="Data tidak ditemukan">
						<p>Nomor Meteran <br> Tidak Ditemukan</p>
					</div>
				</section>';
			unset($_SESSION['flash']);
		}
	}
}